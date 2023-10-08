<?php
require 'includes\Exception.php';
require 'includes\PHPMailer.php';
require 'includes\SMTP.php';

use Exception as GlobalException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Books controller
class Books extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }



        $book = new Book();
        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book";
        $totalRows = $book->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 7;
        $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;
        $offset = ($page_number - 1) * $rows_per_page;

        //Finding page numbers
        $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

        //Search page

        if (isset($_POST['page_search_button'])) {

            //Eg: (Location: http://localhost/pothpiyasa/public/home)
            header("Location: " . ROOT . "/books/viewbooks?page=" . $_POST['go_to_page']);
            die;
        }

        // print_r($page_numbers);


        $query = "SELECT * FROM book ORDER BY Title ASC LIMIT $rows_per_page OFFSET $offset";


        if (isset($_POST['filter_typo_search'])) {

            if ($_POST['book_filter_typo'] == 'Title') {
                $data = $book->where('Title', $_POST['book_filter_typo_input']);
            } else if ($_POST['book_filter_typo'] == 'ISBN') {
                $data = $book->where('ISBN', $_POST['book_filter_typo_input']);
            } else if ($_POST['book_filter_typo'] == 'AuthorName') {
                $data = $book->where('AuthorName',  $_POST['book_filter_typo_input']);
            } else if ($_POST['book_filter_typo'] == 'CategoryName') {
                $data = $book->where('Category', get_CategoryID('Name', $_POST['book_filter_typo_input']));
            } else {
                $data = $book->query($query);
            }
        } else {
            $data = $book->query($query);
        }

        record_Events(Auth::profileID(), "VIEW_BOOKS");


        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/book.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/book.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view('libraryStaff/book.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
        }
    }

    public function add()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $errors = array();
            $flag = array(0);
            $vendorArray = array();
            $donorArrary = array();

            $vendorArray2 = array();
            $donorArrary2 = array();

            $vendor = new Vendor();
            $donor = new Donor();

            $vendorFlag = 0;
            $donorFlag = 0;





            if (count($_POST) > 0) {
                $imgName = $_FILES['Image']['name'];
                $imgSize = $_FILES['Image']['size'];
                $tempName = $_FILES['Image']['tmp_name'];
                $error = $_FILES['Image']['error'];


                $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                $imgExLc = strtolower($imgEx);
                $allowedExs = array("jpg", "jpeg", "png");
                $book = new Book();


                if ($book->validate($_POST, $imgSize, $imgExLc)) {
                    if ($error == 0) {
                        if ($imgSize > 125000) {
                            $em = "Sorry your file is too large!";
                        } else {
                            if (in_array($imgExLc, $allowedExs)) {
                                $newImgName = uniqid("IMG-", true) . '.' . $imgExLc;
                                $imgUploadPath = 'uploads/' . $newImgName;
                                move_uploaded_file($tempName, $imgUploadPath);
                                $bookData['Image'] = $newImgName;
                            }
                        }
                    }


                    $bookData['ISBN'] = $_POST['ISBN'];
                    $bookData['Title'] = $_POST['Title'];
                    $bookData['Edition'] = $_POST['Edition'];
                    $bookData['NoPages'] = $_POST['NoPages'];
                    $bookData['Language'] = $_POST['Languages'];
                    $bookData['PublishedYear'] = $_POST['PublishedYear'];
                    $bookData['Publisher'] = $_POST['Publisher'];
                    $bookData['Price'] = $_POST['price'];
                    $bookData['ReceivedDate'] = $_POST['ReceivedDate'];

                    //add data vendor
                    if (!empty($_POST['VendorID'])) {
                        $bookData['VendorID'] = $_POST['VendorID'];
                        $vendorFlag = $_POST['VendorID'];
                    } else {
                        if (!empty($_POST['vendorName'])) {
                            try{
                                $randomNo = rand(100000, 999999);
                                $salt = rand(1, 100);
                                $Vid = $randomNo + $salt;
                                $bookData['VendorID'] = $Vid;
                                print_r($bookData['VendorID']);
                                $vendorArray['VendorID'] = $Vid;
                                $vendorArray['Name'] = $_POST['vendorName'];
                                $vendorArray['TeleNo'] = $_POST['vendorTel'];
                                $vendorArray['Address'] = $_POST['vendorAddress'];
                                $vendorArray['Email'] = $_POST['vendorEmail'];

                                $vendorFlag = $Vid;
                                $vendor->insert($vendorArray);
                            }
                            catch(Exception $e){
                                return $errors['errors']="Something went wrong!";
                            }
                            
                        } else {
                            $bookData['VendorID'] = NULL;
                        }
                    }

                    //add data donor
                    if (!empty($_POST['DonorID'])) {
                        $bookData['DonorID'] = $_POST['DonorID'];
                        $donorFlag = $_POST['DonorID'];
                    } else {
                        if (!empty($_POST['DonorName']) ) {
                            try{
                                $randomNo = rand(100000, 999999);
                                $salt = rand(1, 100);
                                $Vid = $randomNo + $salt;
                                $bookData['DonorID'] = $Vid;
                                $donorArray['Name'] = $_POST['DonorName'];
                                $donorArray['DonorID'] = $Vid;
                                $donorArray['TeleNo'] = $_POST['DonorTel'];
                                $donorArray['Address'] = $_POST['DonorAddress'];
                                $donorArray['Email'] = $_POST['DonorEmail'];

                                $donorFlag = $Vid;
                                $donor->insert($donorArray);
                            }
                            catch(Exception $e){
                                return $errors['errors']="Something went wrong!";
                            }
                            
                        } else {
                            $bookData['DonorID'] = NULL;
                        }
                    }
                    $bookData['BookCondition'] = $_POST['Condition'];
                    $bookData['Category'] = $_POST['Category'];
                    $bookData['Class'] = $_POST['classinput'];
                    $bookData['Location'] = $_POST['location'];
                    $bookData['LendingCategory'] = $_POST['LendingCategory'];

                    // add staff id 
                    $bookData['AddStaffID'] = get_userID("UserID", Auth::profileID());

                    // add author ID
                    $bookData['AuthorName'] =  $_POST["AuthorName"];
                    print_r($bookData);
                    $book->insert($bookData);

                    $query = "SELECT BookID FROM book ORDER BY AddDate DESC LIMIT 1";
                    $newBookID = $book->query($query);

                    if ($vendorFlag != 0) {
                        $vendorBook = new VendorBook();
                        $vendorArray2['Code'] = "B";
                        $vendorArray2['BookID'] = $newBookID[0]->BookID;
                        $vendorArray2['VendorID'] = $vendorFlag;
                        $vendorArray2['PurchasePrice'] = $_POST['price'];

                        $vendorBook->insert($vendorArray2);
                    } else {
                        $donorBook = new DonorBook();
                        $donorArray2['Code'] = "B";
                        $donorArray2['BookID'] = $newBookID[0]->BookID;
                        $donorArray2['DonorID'] = $donorFlag;

                        $donorBook->insert($donorArray2);
                    }

                    $flag[0] = 1;

                    record_Events(Auth::profileID(), "ADD_BOOKS");
                } else {
                    $errors = $book->errors;
                    record_Events(Auth::profileID(), "ADD_BOOKS_UNSUCCESSFUL");
                }
            }

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view('librarian/book.add', ['errors' => $errors, 'flag' => $flag]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                $this->view('admin/book.add', ['errors' => $errors, 'flag' => $flag]);
            } else {
                $this->view('libraryStaff/book.add', ['errors' => $errors, 'flag' => $flag]);
            }
        } else {
            $this->redirect('Login');
        }
    }
    //edit book
    public function edit($id = Null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $book = new Book();
            $row = $book->where("BookID", $id);
            $errors = array();
            $flag = array(0);
            $imgErrors = array();



            if (count($_POST) > 0) {
                $book = new Book();

                if ($book->EditBookValidation($_POST)) {
                    $imgName = $_FILES['Image']['name'];
                    $imgSize = $_FILES['Image']['size'];
                    $tempName = $_FILES['Image']['tmp_name'];
                    $error = $_FILES['Image']['error'];

                    if ($error == 0) {
                        if ($imgSize > 125000) {
                            $imgErrors['Image'] = "Sorry your file is too large";
                        } else {
                            $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
                            $imgExLc = strtolower($imgEx);
                            $allowedExs = array("jpg", "jpeg", "png");

                            if (in_array($imgExLc, $allowedExs)) {
                                $newImgName = uniqid("IMG-", true) . '.' . $imgExLc;
                                $imgUploadPath = 'uploads/' . $newImgName;
                                move_uploaded_file($tempName, $imgUploadPath);
                                $bookData['Image'] = $newImgName;
                            }
                        }
                    }


                    $bookData['ISBN'] = $_POST['ISBN'];
                    $bookData['Title'] = $_POST['Title'];
                    $bookData['Edition'] = $_POST['Edition'];
                    $bookData['NoPages'] = $_POST['NoPages'];
                    $bookData['Language'] = $_POST['Languages'];
                    $bookData['PublishedYear'] = $_POST['PublishedYear'];
                    $bookData['Publisher'] = $_POST['Publisher'];
                    $bookData['ReceivedDate'] = $_POST['ReceivedDate'];
                    $bookData['Class'] = $_POST['class'];
                    $bookData['LendingCategory'] = $_POST['LendingCategory'];
                    $bookData['Location'] = $_POST['location'];

                    //add data vendor
                    if ($_POST['vendorDonor'] == "Vendor") {

                        if (!empty($_POST['Person'])) {
                            $bookData['VendorID'] = $_POST['Person'];
                        } else {
                            $bookData['VendorID'] = $_POST['VendorID'];
                        }
                    } else {
                        $bookData['VendorID'] = NULL;
                    }

                    //add data donor
                    if ($_POST['vendorDonor'] == "Donor") {

                        if (!empty($_POST['Person'])) {
                            $bookData['DonorID'] = $_POST['Person'];
                        } else {
                            $bookData['DonorID'] = $_POST['DonorID'];
                        }
                    } else {
                        $bookData['DonorID'] = NULL;
                    }
                    $bookData['BookCondition'] = $_POST['Condition'];

                    $bookData['Category'] = get_categoryID("Name", $_POST["Category"]);


                    // add staff id 
                    $bookData['AddStaffID'] = get_userID("UserID", Auth::profileID());

                    // add author ID
                    $bookData['AuthorName'] =  $_POST["AuthorName"];

                    $book->update("BookID", $id, $bookData);



                    $flag[0] = 1;
                    record_Events(Auth::profileID(), "EDIT_BOOK");
                } else {
                    $errors = $book->errors;
                    print_r($errors);
                }
            }

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view("librarian/book.edit", ['row' => $row, 'errors' => $errors, 'flag' => $flag]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                $this->view("admin/book.edit", ['row' => $row, 'errors' => $errors, 'flag' => $flag]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                $this->view("libraryStaff/book.edit", ['row' => $row, 'errors' => $errors, 'flag' => $flag]);
            } else {
                $this->redirect('Login');
            }
        } else {
            $this->redirect('Login');
        }
    }

    //delete book
    public function delete($id = Null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $book = new Book();
            $vendorBook = new VendorBook();
            $donorBook = new DonorBook();
            $bookCopy = new BookCopy();

            $flag = array(0);
            $rows = $bookCopy->where("BookID", $id);
            $row = $book->delete("BookID", $id);

            if (empty($row)) {
               
                foreach($rows as $r){
                    $vendorBook->delete('BookID',$r->CopyID);
                    $donorBook->delete('BookID',$r->CopyID);
                }
                $flag[0] = 1;
                record_Events(Auth::profileID(), "DELETE_BOOK");
            }

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view("librarian/book.delete", ['row' => $row, 'flag' => $flag]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                $this->view("admin/book.delete", ['row' => $row, 'flag' => $flag]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                $this->view("libraryStaff/book.delete", ['row' => $row, 'flag' => $flag]);
            } else {
                $this->redirect('Login');
            }
        } else {
            $this->redirect('Login');
        }
    }

    //delete preview book
    public function deletePreview($id = Null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $book = new Book();
            $row = $book->where("BookID", $id);
            record_Events(Auth::profileID(), "VIEW_DELETE_PREVIEW_BOOK");

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view("librarian/book.deletePreview", ['row' => $row]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                $this->view("admin/book.deletePreview", ['row' => $row]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                $this->view("libraryStaff/book.deletePreview", ['row' => $row]);
            } else {
                $this->redirect('Login');
            }
        } else {
            $this->redirect('Login');
        }
    }

    //view specific book
    public function viewSpecific($id = Null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Borrower')) {

            $book = new Book();
            $row = $book->where("BookID", $id);
            record_Events(Auth::profileID(), "VIEW_SPECIFIC_BOOK");

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view("librarian/book.view.view", ['row' => $row]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                $this->view("admin/book.view.view", ['row' => $row]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                $this->view("libraryStaff/book.view.view", ['row' => $row]);
            } else {
                $this->view("user/book.view", ['row' => $row]);
            }
        } else {
            $this->redirect('Login');
        }
    }

    //view specific newarrival
    public function viewSpecificnewarrival($id = Null)
    {
        $book = new Book();
        $row = $book->where("BookID", $id);


        $this->view("includes/searchbook.view", ['row' => $row]);
    }

    public function searchbookResult($bookid)
    {
        $book = new IssueBook();

        //Pagination 

        // $page_numbers = array();
        // $value = strval($bookid);

        // //Getting total number of records
        // $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM issuebook WHERE BookID = :value";
        // $queryRecords = sprintf("SELECT COUNT(BookID) AS total_rows FROM issuebook WHERE BookID = $bookid");
        // $totalRows = $book->query($queryRecords);
        // $totalRows = $totalRows[0]->total_rows;

        // $rows_per_page = 10;
        // $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        // $page_number = $page_number < 1 ? 1 : $page_number;
        // $offset = ($page_number - 1) * $rows_per_page;

        // //Finding page numbers
        // $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

        // //Search page

        // if (isset($_POST['page_search_button'])) {

        //     //Eg: (Location: http://localhost/pothpiyasa/public/home)
        //     header("Location: " . ROOT . "/books/searchbookResult/$bookid?page=" . $_POST['go_to_page']);
        //     die;
        // }

        // // print_r($page_numbers);
       
       
       // $query = "SELECT * FROM issuebook WHERE BookID = $newbookid AND Code = $code ORDER BY IssuedDate";

        //Pagination end
        
        
       // $data = $book->query($query);

       $newbookid=substr($bookid,1,);// get id without first letter
       $code=substr($bookid,0,1); //get first letter

        $data=$book->whereColTwo("BookID",$newbookid,"Code",$code);

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view("librarian/searchbook.result", ['rows' => $data,  'bookid' => $bookid]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view("admin/searchbook.result", ['rows' => $data,  'bookid' => $bookid]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view("libraryStaff/searchbook.result", ['rows' => $data,  'bookid' => $bookid]);
        } else {
            $this->redirect('Login');
        }
    }



    public function circulation($user = Null)
    {

        if (Auth::access('Library-Staff')) {

            $errors = array();
            $data = array();
            //print_r($_POST);
            if (count($_POST) > 0) {
                $book = new Book();
                if ($book->searchBookValidation($_POST)) {
                    if (isset($_POST['submit'])) {
                        //$column = $_POST['bookSearch'];

                        $value = $_POST['searchValue'];


                        

                            $bookid = $value;
                       

                        $this->redirect("books/searchbookResult/" . $bookid);
                    }
                } else {
                    $errors = $book->errors;
                }
            }

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/circulation", ['rows' => $data, 'errors' => $errors]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                return $this->view("admin/circulation", ['rows' => $data, 'errors' => $errors]);
            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                $this->view("libraryStaff/circulation", ['rows' => $data, 'errors' => $errors]);
            } else {
                $this->redirect('Login');
            }
        } else {
            $this->redirect('Login');
        }
    }

    //     public function searchbookOPAC()
    //     {
    //        // print_r("hi");
    //         $errors = array();

    //         if(count($_POST) > 0)
    //         {

    //     }
    //     $this->view("user/searchbook");
    // }

    public function bookOverView($id = Null)
    {
        // print_r("hi");
        $errors = array();
        $users = array();
        $book = new Book();
        $reservedBook = new ReserveBook();
        $user = new User();
        $rows = $book->where('BookID', $id);
        $rowReservedBook = $reservedBook->where('BookID', $id);
        if (!empty($rowReservedBook)) {
            $users = $user->where('UserID', $rowReservedBook[0]->UserID);
        }


        $this->view("librarian/overViewBook", ['rows' => $rows, 'rowReservedBook' => $rowReservedBook, 'users' => $users]);
    }
    //kasun
    public function issueBook()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $totalFine = 0;
            $j = 0;
            $data = array();
            $errors = array();
            $fineDetils = array();
            $book = new Book();
            $user = new User();
            $issueBook = new IssueBook();

            // locate using reg no
            if (count($_POST) > 0) {
                if (isset($_POST['locateByID'])) {
                    if ($book->UserValidation($_POST)) {

                        $userID = get_patronID("RegistrationNo", $_POST['userID']);
                        $fineStatus = $issueBook->where('UserID', $userID);

                        if ($fineStatus) {
                            for ($i = 0; $i < sizeof($fineStatus); $i++) {
                                if ($fineStatus[$i]->FineStatus == 1) {
                                    $fineDetils[$j]['userName'] = get_user_name('UserID', $fineStatus[0]->UserID);
                                    $fineDetils[$j]['RegistrationNo'] = get_registrationNo('UserID', $fineStatus[0]->UserID);
                                    $fineDetils[$j]['Title'] = get_BookTitle('BookID', $fineStatus[$i]->BookID);
                                    $fineDetils[$j]['Image'] = get_BookImage('BookID', $fineStatus[$i]->BookID);
                                    $fineDetils[$j]['DueDate'] = $fineStatus[$i]->DueDate;
                                    $fineDetils[$j]['Fine'] = $fineStatus[$i]->FineAmount;
                                    $totalFine = $totalFine + $fineStatus[$i]->FineAmount;
                                    $fineDetils[$j]['UserID'] = $fineStatus[$i]->UserID;
                                    $j++;
                                }
                            }

                            $fineDetils['totalFine'] = $totalFine;

                            if (sizeof($fineDetils) > 1) {
                                //set the privillages
                                if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                                    return $this->view("librarian/issueBook", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '']);
                                } else {
                                    return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '']);
                                }
                            } else {
                                return $this->redirect("books/bookLocate/$userID");
                            }
                        }
                        record_Events(Auth::profileID(), "CHECK_PATRON");

                        return $this->redirect("books/bookLocate/$userID");
                    } else {
                        $errors = $book->errors;
                        record_Events(Auth::profileID(), "CHECK_PATRON_UNSUCCESSFULL");
                    }
                }

                // locate using name

                if (isset($_POST['locateByName'])) {
                    if (!empty($_POST['lastName']) && empty($_POST['firstName']) && empty($_POST['type'])) {
                        $data = $user->where("LastName", $_POST['lastName']);

                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (empty($_POST['lastName']) && !empty($_POST['firstName']) && empty($_POST['type'])) {
                        $data = $user->where("FirstName", $_POST['firstName']);

                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (empty($_POST['lastName']) && empty($_POST['firstName']) && !empty($_POST['type'])) {
                        if ($_POST['type'] == "Lecturer" || $_POST['type'] == "Student") {
                            $data = $user->where("Type", $_POST['type']);
                        } else {
                            $data = $user->where("JobType", $_POST['type']);
                        }
                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['type'])) {
                        if ($_POST['type'] == "Lecturer" || $_POST['type'] == "Student") {
                            $data = $user->whereTreeOption("LastName", $_POST['lastName'], "FirstName", $_POST['firstName'], "Type", $_POST['type']);
                        } else {
                            $data = $user->whereTreeOption("LastName", $_POST['lastName'], "FirstName", $_POST['firstName'], "JobType", $_POST['type']);
                        }
                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['type'])) {
                        if ($_POST['type'] == "Lecturer" || $_POST['type'] == "Student") {
                            $data = $user->whereTwoOption("FirstName", $_POST['firstName'], "Type", $_POST['type']);
                        } else {
                            $data = $user->whereTwoOption("FirstName", $_POST['firstName'], "JobType", $_POST['type']);
                        }

                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (!empty($_POST['lastName']) && empty($_POST['firstName']) && !empty($_POST['type'])) {
                        if ($_POST['type'] == "Lecturer" || $_POST['type'] == "Student") {
                            $data = $user->whereTwoOption("LastName", $_POST['lastName'], "Type", $_POST['type']);
                        } else {
                            $data = $user->whereTwoOption("LastName", $_POST['lastName'], "JobType", $_POST['type']);
                        }

                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    } else if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && empty($_POST['type'])) {

                        $data = $user->whereTwoOption("FirstName", $_POST['firstName'], "LastName", $_POST['lastName']);
                        //set the privillages
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            return $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        } else {
                            return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
                        }
                    }
                }
            }

            //set the privillages
            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                $this->view("librarian/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
            } else {
                $this->view("libraryStaff/issueBook", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
            }
        } else {
            $this->redirect('Login');
        }
    }
    //kasun
    public function bookLocate($id = NULL)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $data = array();
            $errors = array();
            $user = new User();
            $book = new Book();
            $flag = array();
            $flag[0] = 0;
            $issueBook = new IssueBook();
            $configuration = new Configuration();
            $data = $user->where('UserID', $id);


            if (count($_POST) > 0) {
                for ($i = 0; $i < sizeof($_POST); $i++) {
                    $index = "text" . $i;
                    if ($book->LocateBookValidation($_POST[$index], $id, sizeof($_POST))) {

                        //get the first charactor
                        $accessNo = $_POST[$index];
                        $code = $accessNo[0];

                        // check the given access no is main book or copy
                        if($code == "B"){
                            $bookInfo['Code'] = $code;
                        }
                        else{
                            $bookInfo['Code'] = $code;
                        }

                        // trim the first charactor
                        $bID = substr($accessNo,1);

                        $bookInfo['BookID'] = $bID;
                        $bookInfo['UserID'] = $id;
                        $bookInfo['AddStaffID'] = get_userID("UserID", Auth::profileID());

                        // select correct due date according to the user
                        $query1 = "SELECT * FROM `configuration` WHERE ID=1 ";
                        $con = $configuration->query($query1);

                        date_default_timezone_set('Asia/Colombo');
                        $current_date = date('Y-m-d');
                        $date = new DateTime($current_date);

                        if (empty($_POST['DueDate'])) {
                            if (get_PatronType('UserID', $id) == 'Student') {
                                $day = "+" . $con[0]->NoOfDaysAC . "days";
                                $day = $date->modify($day);
                                $day = $day->format('Y-m-d');
                                $bookInfo['DueDate'] = $day;
                            } else if (get_PatronType('UserID', $id) == 'Lecturer') {
                                $lecture = new Lecturer();
                                $row = $lecture->where('UserID', $id);
                                if ($row[0]->LecType == 'Permanent Lecture') {
                                    $day = "+" . $con[0]->NoOfDayPL . "days";
                                    $day = $date->modify($day);
                                    $day = $day->format('Y-m-d');
                                    $bookInfo['DueDate'] = $day;
                                } else {
                                    $day = "+" . $con[0]->NoOfDaysAC . "days";
                                    $day = $date->modify($day);
                                    $day = $day->format('Y-m-d');
                                    $bookInfo['DueDate'] = $day;
                                }
                            } else {
                                $day = "+" . $con[0]->NoOfDaysNONAC . "days";
                                $day = $date->modify($day);
                                $day = $day->format('Y-m-d');
                                $bookInfo['DueDate'] = $day;
                            }
                        } else {
                            $bookInfo['DueDate'] = $_POST['DueDate'];
                        }
                        $flag[0] = 1;
                        $issueBook->insert($bookInfo);
                        record_Events(Auth::profileID(), "BOOK_ISSUE_SUCCESSFUL");
                    } else {

                        $errors = $book->errors;
                        record_Events(Auth::profileID(), "BOOK_ISSUE_UNSUCCESSFUL");
                    }
                }
            }

            //set the privillages
            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookLocate", ['errors' => $errors, 'rows' => $data, 'flag' => $flag]);
            } else {
                return $this->view("libraryStaff/bookLocate", ['errors' => $errors, 'rows' => $data, 'flag' => $flag]);
            }
        } else {
            $this->redirect('Login');
        }
    }

    //kasun
    //locate book using userName
    public function bookLocateUsingUserName($id = NULL)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $data = array();
            $errors = array();
            $bookInfo = array();
            $totalFine = 0;
            $fineDetils = array();
            $flag = array();
            $flag[0] = 0;

            $book = new Book();
            $books = new Books();
            $user = new User();
            $configuration = new Configuration();

            $issueBook = new IssueBook();
            $fineStatus = $issueBook->where('UserID', $id);
            $data = $user->where('UserID', $id);

            // find the fine 
            if ($fineStatus) {
                for ($i = 0; $i < sizeof($fineStatus); $i++) {
                    if ($fineStatus[$i]->FineStatus == -1) {
                        $fineDetils[$i]['userName'] = get_user_name('UserID', $fineStatus[0]->UserID);
                        $fineDetils[$i]['NIC'] = get_NIC('UserID', $fineStatus[0]->UserID);
                        $fineDetils[$i]['Title'] = get_BookTitle('BookID', $fineStatus[$i]->BookID);
                        $fineDetils[$i]['Image'] = get_BookImage('BookID', $fineStatus[$i]->BookID);
                        $fineDetils[$i]['DueDate'] = $fineStatus[$i]->DueDate;
                        $fineDetils[$i]['Fine'] = $fineStatus[$i]->FineAmount;
                        $totalFine = $totalFine + $fineStatus[$i]->FineAmount;
                        $fineDetils[$i]['UserID'] = $fineStatus[$i]->UserID;
                    }
                }

                $fineDetils['totalFine'] = $totalFine;
                if (sizeof($fineDetils) > 1) {
                    //set the privillages
                    if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                        return $this->view("librarian/issueBook", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '']);
                    } else {
                        return $this->view("libraryStaff/issueBook", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '']);
                    }
                }
                // else{
                //    //set the privillages
                //    if(get_JobType("UserID",Auth::profileID())=='Librarian'){
                //     return $this->view("librarian/bookLocate",['errors'=>$errors,'fine'=>$fineDetils,'rows'=>'']);
                //     }
                //     else{
                //         return $this->view("libraryStaff/bookLocate",['errors'=>$errors,'fine'=>$fineDetils,'rows'=>'']);
                //     }
                // }


            }

            if (count($_POST) > 0) {
                for ($i = 0; $i < sizeof($_POST); $i++) {
                    $index = "text" . $i;
                    if ($book->LocateBookValidation($_POST[$index], $id, sizeof($_POST))) {
                        $bookInfo['BookID'] = get_bookID("ISBN", $_POST[$index]);
                        $bookInfo['UserID'] = $id;
                        $bookInfo['AddStaffID'] = get_userID("UserID", Auth::profileID());

                        // select correct due date according to the user
                        $query1 = "SELECT * FROM `configuration` WHERE ID=1 ";
                        $con = $configuration->query($query1);

                        date_default_timezone_set('Asia/Colombo');
                        $current_date = date('Y-m-d');
                        $date = new DateTime($current_date);

                        if (empty($_POST['DueDate'])) {
                            if (get_PatronType('UserID', $id) == 'Student') {
                                $day = "+" . $con[0]->NoOfDaysAC . "days";
                                $day = $date->modify($day);
                                $day = $day->format('Y-m-d');
                                $bookInfo['DueDate'] = $day;
                            } else if (get_PatronType('UserID', $id) == 'Lecturer') {
                                $lecture = new Lecturer();
                                $row = $lecture->where('UserID', $id);
                                if ($row[0]->LecType == 'Permanent Lecture') {
                                    $day = "+" . $con[0]->NoOfDayPL . "days";
                                    $day = $date->modify($day);
                                    $day = $day->format('Y-m-d');
                                    $bookInfo['DueDate'] = $day;
                                } else {
                                    $day = "+" . $con[0]->NoOfDaysAC . "days";
                                    $day = $date->modify($day);
                                    $day = $day->format('Y-m-d');
                                    $bookInfo['DueDate'] = $day;
                                }
                            } else {
                                $day = "+" . $con[0]->NoOfDaysNONAC . "days";
                                $day = $date->modify($day);
                                $day = $day->format('Y-m-d');
                                $bookInfo['DueDate'] = $day;
                            }
                        } else {
                            $bookInfo['DueDate'] = $_POST['DueDate'];
                        }
                        $flag[0] = 1;

                        $issueBook->insert($bookInfo);
                        record_Events(Auth::profileID(), "BOOK_ISSUE_SUCCESSFUL");
                    } else {
                        $errors = $book->errors;
                        record_Events(Auth::profileID(), "BOOK_ISSUE_UNSUCCESSFUL");
                    }
                }
            }

            //set the privillages
            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookLocate", ['errors' => $errors, 'rows' => $data, 'flag' => $flag]);
            } else {
                return $this->view("libraryStaff/bookLocate", ['errors' => $errors, 'rows' => $data, 'flag' => $flag]);
            }
        } else {
            $this->redirect('Login');
        }
    }


    //kasun
    //change fine status
    public function changeFineStatus($id = NULL)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {
            $data = array();
            $data['FineStatus'] = 0;
            $issueBook = new IssueBook();
            $issueBook->update('UserID', $id, $data);
            record_Events(Auth::profileID(), "CHANGE_FINE_STATUS");
        } else {
            $this->redirect('Login');
        }
    }


    //check the book already in the db 
    public function reset()
    {    
         $data1 = new Inventory;
        $row1 = $data1->where("No", 1);

        $inventoryData=array();


        if ($row1) {
            foreach ($row1 as $check) :
                $databaseDate = $check->Date; // date from the database
                $currentDate = date('Y-m-d H:i:s'); // current date

                $databaseDateTime = new DateTime($databaseDate);
                $currentDateTime = new DateTime($currentDate);

                $yearDifference = $currentDateTime->diff($databaseDateTime)->y;
                if ($yearDifference > 0) {
                    lost();

                    $book1 = new Book();
                    $data = $book1->findAll();
                    if ($data) {
                        foreach ($data as $row1) :

                            $bookData['InventoryStatus'] = 0;
                            $book1->update('BookID', $row1->BookID, $bookData);

                        endforeach;
                    }

                    $copy = new BookCopy();
                    $data2 = $copy->findAll();
                    if ($data2) {
                        foreach ($data2 as $row1) :

                            $bookData['InventoryStatus'] = 0;
                            $copy->update('CopyID', $row1->CopyID, $bookData);

                        endforeach;
                    }
                }


            endforeach;

            $id=1;
            $inventoryData["No"]=$id;
            $data1->update("No",$id,$inventoryData);
        }
        else{
            lost();

                    $book1 = new Book();
                    $data = $book1->findAll();
                    if ($data) {
                        foreach ($data as $row1) :

                            $bookData['InventoryStatus'] = 0;
                            $book1->update('BookID', $row1->BookID, $bookData);

                        endforeach;
                    }





                    $copy = new BookCopy();
                    $data2 = $copy->findAll();
                    if ($data2) {
                        foreach ($data2 as $row1) :
            
                            $bookData['InventoryStatus'] = 0;
                            $copy->update('CopyID', $row1->CopyID, $bookData);
            
                        endforeach;
                    }


            
                    $inventoryData["No"]=1;
                    $data1->insert($inventoryData);
                    // 

           

        }

      



    }

    public function checkBook($id = "null")
    {
        $_SESSION['id'] = $id;

        $data = array();
        $errors = array();
        $book = new Book();

        if (count($_POST) > 0) {
            if ($book->checkbookValidation($_POST)) {

                $id = $_POST['Title'];
                $this->redirect('books/inventory/' . $id);
            } else {

                $errors = $book->errors;
            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view("librarian/inventory.book.check", ['rows' => $data, 'errors' => $errors]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view("admin/inventory.book.check", ['rows' => $data, 'errors' => $errors]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view("libraryStaff/inventory.book.check", ['rows' => $data, 'errors' => $errors]);
        } else {
            $this->redirect('Login');
        }
    }


    public function inventory($id = "null")
    {
        $data = array();
        $errors = array();
        $flags=array();


        $_SESSION['id'] = substr($id,1,);
        if(substr($id,0,1)=="B"){
            $flags[0] = "B";
        }
        elseif(substr($id,0,1)=="C"){
            $flags[0] = "C";

        }

        $book = new Book();
        $copy= new BookCopy();
        
        if (count($_POST) > 0) {


            // $id = $_POST['Title'];

            $bookData['InventoryStatus'] = 1;
            $bookData['InventoryCondition'] = $_POST['condition'];
            $bookData['Comments'] = $_POST['comment'];

            //get staffid from userid
            $value = Auth::profileID();
            $bookData['InventoryStaffID'] = get_staffid('UserID', $value);

           if(substr($id,0,1)=="B"){

            $book->update('BookID', $_SESSION['id'], $bookData);
            $this->redirect('books/checkBook');
           }
           else if(substr($id,0,1)=="C"){

            $copy->update('CopyID', $_SESSION['id'], $bookData);
            $this->redirect('books/checkBook');
           }
          
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/book.inventory", ['rows' => $data, 'errors' => $errors, 'flags'=>$flags]);


        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view("admin/book.inventory", ['rows' => $data, 'errors' => $errors, 'flags'=>$flags]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view("libraryStaff/book.inventory", ['rows' => $data, 'errors' => $errors, 'flags'=>$flags]);
        } else {
            $this->redirect('Login');
        }
    }
    //kasun
    //view the return book front page
    public function viewReturnFrontPage()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {

            $data = array();
            $errors = array();

            record_Events(Auth::profileID(), "VIEW_RETURN_FRONT_PAGE");

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookReturnFront", ['errors' => $errors, 'rows' => $data]);
            } else if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                return $this->view("admin/bookReturnFront", ['errors' => $errors, 'rows' => $data]);
            } else {
                return $this->view("libraryStaff/bookReturnFront", ['errors' => $errors, 'rows' => $data]);
            }
        } else {
            $this->redirect('Login');
        }
    }

    //kasun
    //view the return book front page
    public function returnBook()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {
            $data = array();
            $j = 0;
            $errors = array();
            $flag = array();
            $bookInfo = array();
            $totalFine = 0;
            $fineDetils = array();
            $flag[0] = 0;

            $book = new Book();
            $issueBook = new IssueBook();

        
            if (isset($_POST['returnBookbtn'])) {
                if ($book->returnBookUserValidation($_POST['nic'])) {
                    if (!empty($_POST['nic'])) {
                        $fineStatus = $issueBook->where('UserID', get_patronID('RegistrationNo', $_POST['nic']));

                        if ($fineStatus) {

                            for ($i = 0; $i < sizeof($fineStatus); $i++) {
                                if ($fineStatus[$i]->FineStatus == 1) {
                                    $fineDetils[$j]['userName'] = get_user_name('UserID', $fineStatus[0]->UserID);
                                    $fineDetils[$j]['RegistrationNo'] = get_registrationNo('UserID', $fineStatus[0]->UserID);

                                    // check book or book copy
                                    if($fineStatus[$i]->Code == "B"){
                                        $fineDetils[$j]['Title'] = get_BookTitle('BookID', $fineStatus[$i]->BookID);
                                        $fineDetils[$j]['Image'] = get_BookImage('BookID', $fineStatus[$i]->BookID);
                                    }
                                    else{
                                        $fineDetils[$j]['Title'] = get_BookTitle('BookID', get_originalBookID('CopyID',$fineStatus[$i]->BookID));
                                        $fineDetils[$j]['Image'] = get_BookImage('BookID', get_originalBookID('CopyID',$fineStatus[$i]->BookID));
                                    }
                                    
                                    $fineDetils[$j]['DueDate'] = $fineStatus[$i]->DueDate;
                                    $fineDetils[$j]['Fine'] = $fineStatus[$i]->FineAmount;
                                    $totalFine = $totalFine + $fineStatus[$i]->FineAmount;
                                    $fineDetils[$j]['UserID'] = $fineStatus[$i]->UserID;
                                    $j++;
                                }
                            }

                            $fineDetils['totalFine'] = $totalFine;

                            if (sizeof($fineDetils) > 1) {
                                //set the privillages
                                if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                                    return $this->view("librarian/bookReturn", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '', 'flag' => '']);
                                } else {
                                    return $this->view("libraryStaff/bookReturn", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '', 'flag' => '']);
                                }
                            }
                        }

                        if (count($_POST) > 0) {

                            for ($i = 0; $i < sizeof($_POST) - 2; $i++) {
                                $index = "text" . $i;
                                
                                if ($book->returnBookValidation($_POST[$index], get_patronID('RegistrationNo', $_POST['nic']))) {
                                    
                                    // get first charactor of access no
                                    $accessNo = $_POST[$index];
                                    $code = $accessNo[0];
                                    
                                    // check copy or main book
                                    if($code == "B"){
                                        $bookID = substr($accessNo,1);
                                        $id = get_IssueID('UserID', get_patronID('RegistrationNo', $_POST['nic']), 'BookID',$bookID);
                                    }

                                    else{
                                        $copyID = substr($accessNo,1);
                                        $id = get_IssueID('UserID', get_patronID('RegistrationNo', $_POST['nic']), 'BookID', $copyID);
                                        
                                    }

                                    $bookInfo['ReturnDate'] = date("Y-m-d H:i:s");
                                    $bookInfo['ReturnStaffID'] = get_userID("UserID", Auth::profileID());
                                    $bookInfo['ReturnStatus'] = 1;
                                    $issueBook->update('IssueKey', $id, $bookInfo);
                                    $flag[0] = 1;
                                    record_Events(Auth::profileID(), "BOOK_RETURN_SUCCESSFUL");
                                } else {
                                    $errors = $book->errors;
                                    record_Events(Auth::profileID(), "BOOK_RETURN_UNSUCCESSFUL");
                                }
                            }
                        }
                    }
                } else {
                    $errors = $book->errors;
                    record_Events(Auth::profileID(), "BOOK_RETURN_UNSUCCESSFUL");
                }
            }
        


            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookReturn", ['errors' => $errors, 'rows' => $data, 'fine' => '', 'flag' => $flag]);
            } else {
                return $this->view("libraryStaff/bookReturn", ['errors' => $errors, 'rows' => $data, 'fine' => '', 'flag' => $flag]);
            }
        } else {
            $this->redirect('Login');
        }
    }
    public function changeReturnedStatus($id = Null)
    {
        return 1;
    }

    //kasun
    //view the return book front page
    public function renewBook()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {
            $data = array();
            $errors = array();
            $bookInfo = array();
            $totalFine = 0;
            $j = 0;
            $fineDetils = array();
            $flag = array();

            $book = new Book();
            $flag[0] = 0;
            $issueBook = new IssueBook();
            $configuration = new Configuration();



            if (isset($_POST['renew'])) {
                if (!empty($_POST['nic'])) {
                    $fineStatus = $issueBook->where('UserID', get_patronID('RegistrationNo', $_POST['nic']));

                    if ($fineStatus) {

                        for ($i = 0; $i < sizeof($fineStatus); $i++) {
                            if ($fineStatus[$i]->FineStatus == 1) {
                                $fineDetils[$j]['userName'] = get_user_name('UserID', $fineStatus[0]->UserID);
                                $fineDetils[$j]['RegistrationNo'] = get_registrationNo('UserID', $fineStatus[0]->UserID);
                                // check book or book copy
                                if($fineStatus[$i]->Code == "B"){
                                    $fineDetils[$j]['Title'] = get_BookTitle('BookID', $fineStatus[$i]->BookID);
                                    $fineDetils[$j]['Image'] = get_BookImage('BookID', $fineStatus[$i]->BookID);
                                }
                                else{
                                    $fineDetils[$j]['Title'] = get_BookTitle('BookID', get_originalBookID('CopyID',$fineStatus[$i]->BookID));
                                    $fineDetils[$j]['Image'] = get_BookImage('BookID', get_originalBookID('CopyID',$fineStatus[$i]->BookID));
                                }
                                
                                $fineDetils[$j]['DueDate'] = $fineStatus[$i]->DueDate;
                                $fineDetils[$j]['Fine'] = $fineStatus[$i]->FineAmount;
                                $totalFine = $totalFine + $fineStatus[$i]->FineAmount;
                                $fineDetils[$j]['UserID'] = $fineStatus[$i]->UserID;
                                $j++;
                            }
                        }
                        $flag[0] = 0;
                        $fineDetils['totalFine'] = $totalFine;
                        if (sizeof($fineDetils) > 1) {
                            //set the privillages
                            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                                return $this->view("librarian/bookRenew", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '', 'flag' => '']);
                            } else {
                                return $this->view("libraryStaff/bookRenew", ['errors' => $errors, 'fine' => $fineDetils, 'rows' => '', 'flag' => '']);
                            }
                        }
                    }

                    if (count($_POST) > 0) {

                        for ($i = 0; $i < sizeof($_POST) - 3; $i++) {
                            $index = "text" . $i;
                            if ($book->renewBookValidation($_POST[$index], $_POST['nic'])) {

                                $accessNo = $_POST[$index];
                                $code = $accessNo[0];
                                    
                                    // check copy or main book
                                if($code == "B"){
                                    $bookID = substr($accessNo,1);
                                    $id = get_IssueID('UserID', get_patronID('RegistrationNo', $_POST['nic']), 'BookID',$bookID);
                                }

                                else{
                                    $copyID = substr($accessNo,1);
                                    $id = get_IssueID('UserID', get_patronID('RegistrationNo', $_POST['nic']), 'BookID', $copyID);
                                }

                                // $bookInfo['ReturnStaffID'] = get_userID("UserID", Auth::profileID());
                                $query1 = "SELECT * FROM `configuration` WHERE ID=1 ";
                                $con = $configuration->query($query1);

                                date_default_timezone_set('Asia/Colombo');
                                $current_date = date('Y-m-d');
                                $date = new DateTime($current_date);


                                // select correct due date according to the user
                                if (empty($_POST['DueDate'])) {
                                    if (get_PatronType('RegistrationNo', $_POST['nic']) == 'Student') {
                                        $day = "+" . $con[0]->NoOfDaysAC . "days";
                                        $day = $date->modify($day);
                                        $day = $day->format('Y-m-d');
                                        $bookInfo['DueDate'] = $day;
                                    } else if (get_PatronType('RegistrationNo', $_POST['nic']) == 'Lecturer') {
                                        $lecture = new Lecturer();
                                        $row = $lecture->where('UserID', get_patronID('RegistrationNo', $_POST['nic']));
                                        if ($row[0]->LecType == 'Permanent Lecture') {
                                            $day = "+" . $con[0]->NoOfDayPL . "days";
                                            $day = $date->modify($day);
                                            $day = $day->format('Y-m-d');
                                            $bookInfo['DueDate'] = $day;
                                        } else {
                                            $day = "+" . $con[0]->NoOfDaysAC . "days";
                                            $day = $date->modify($day);
                                            $day = $day->format('Y-m-d');
                                            $bookInfo['DueDate'] = $day;
                                        }
                                    } else {
                                        $day = "+" . $con[0]->NoOfDaysNONAC . "days";
                                        $day = $date->modify($day);
                                        $day = $day->format('Y-m-d');
                                        $bookInfo['DueDate'] = $day;
                                    }
                                } else {
                                    $bookInfo['DueDate'] = $_POST['DueDate'];
                                }


                                $issueBook->update('IssueKey', $id, $bookInfo);
                                $flag[0] = 1;
                                record_Events(Auth::profileID(), "BOOK_RENEW_SUCCESSFUL");
                            } else {
                                $errors = $book->errors;
                                record_Events(Auth::profileID(), "BOOK_RENEW_SUCCESSFUL");
                            }
                        }
                    }
                }
            }

            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookRenew", ['errors' => $errors, 'rows' => $data, 'fine' => '', 'flag' => $flag]);
            } else {
                return $this->view("libraryStaff/bookRenew", ['errors' => $errors, 'rows' => $data, 'fine' => '', 'flag' => $flag]);
            }
        } else {
            $this->redirect('Login');
        }
    }

    public function sendBookList()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {
            $rows = array();
            $errors = array();
            $uids = array();
            $flag = array();
            $flag[0] = 0;
            $i = 0;
            $str = "Dear Sir/Madam,<br><br>I am writing to request your assistance in obtaining several books that are not available in our branch library. Please see the attached list of titles and authors. We kindly request that you check your library's inventory and send us the books that are available for loan.Thank you for your time and cooperation in fulfilling our patrons' reading needs.<br><br><table><tr><th style='padding: 5px;'>User Name</th><th style='padding: 5px;'>Book Title</th><th style='padding: 5px;'>Author</th><th style='padding: 5px;'>Published Year</th><th style='padding: 5px;'>Edition</th></tr>";
            // $str = 'a';
            // get current sending books requests
            $book = new Book();
            $date = date("Y-m-d");

            $quary = "SELECT * FROM `requestbooks` WHERE mailStatus=0;";
            $rows = $book->query($quary);

            // get all requested books
            $rqbook = new RequestBooks();
            $req = $rqbook->findAll();
            if ($rows) {
                foreach ($rows as $r) {
                    $str = $str . '<tr><td style="padding: 5px;">' . get_user_name('UserID', $r->UserID) . '</td><td style="padding: 5px;"> ' . $r->BookTitle . '</td><td style="padding: 5px;"> ' . $r->Author . '</td><td style="padding: 5px;"> ' . $r->PublishedYear . '</td><td style="padding: 5px;"> ' . $r->Edition . '</td></tr>';
                    $uids[$i] = $r->UserID;
                    $uids[$i + 1] = $r->BookTitle;
                    $i += 2;
                }
            }

            $str .= '</table><br><br>Best regards,<br>W.R.A.S.Kavishka <br> (Assistant Librarian)';
            $bookval = new Book();
            if ($bookval->sendMailValidation()) {
                if (isset($_POST['sendBtn'])) {
                    try {
                        $query ="DELETE FROM `requestbooks` WHERE mailStatus =1";
                        $rqbook->query($query);

                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'kasungayashan396@gmail.com';
                        $mail->Password = 'xoxzchllposqtqal';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->setFrom('kasungayashan396@gmail.com');
                        $mail->addAddress('kasungayashan789@gmail.com');

                        $mail->isHTML(true);
                        $mail->Subject = 'book list';
                        $mail->Body = $str;



                        $mail->send();
                        for ($j = 0; $j < sizeof($uids); $j += 2) {
                            $quary = " UPDATE `requestbooks` SET `mailStatus`=1 WHERE UserID=$uids[$j] AND BookTitle='" . "{$uids[$j + 1]}" . "'";
                            $book->query($quary);
                        }
                        $flag[0] = 1;
                        
                        record_Events(Auth::profileID(), "BOOK_LIST_SEND_SUCCESSFUL");
                    } catch (Exception $e) {
                        record_Events(Auth::profileID(), "BOOK_LIST_SEND_UNSUCCESSFUL");
                        $errors['email'] = 'Something went wrong!. Check the network connection.';
                    }
                }
            }





            return $this->view("librarian/send.booklist", ['errors' => $errors, 'rows' => $rows, 'req' => $req, 'flag' => $flag]);
        } else {
            $this->redirect('Login');
        }
    }

    public function AddbookCopy($id = NULL, $dvArray = array())
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        if (Auth::access('Library-Staff')) {
            $rows = array();
            $errors = array();
            $bookCopyDetails = array();
            $flag = array();
            $noOfBooks = array();
            $vendorArray = array();
            $donorArrary = array();

            $vendorArray2 = array();
            $donorArrary2 = array();

            $vendor = new Vendor();
            $donor = new Donor();

            $vendorFlag = 0;
            $donorFlag = 0;
            $flag[0] = 0;

            $book = new Book();
            $rows = $book->where('ISBN', $id);

            $bookCopy = new BookCopy();

            // find last book copy id
            
            
            

            if (count($_POST) > 0) {
                if (isset($_POST['bookCopyAdd'])) {
                    $noOfBooks['nobooks']=$_POST['noOfCopies'];
                    if ($bookCopy->bookCopyValidation($_POST)) {
                        $flag[0] = 0;
                        for ($i = 0; $i < $_POST['noOfCopies']; $i++) {
                            $r = $bookCopy->last('CopyID', 1);
                            
                            $vendorFlag = 0;
                            $donorFlag = 0;

                            $bookCopyDetails['BookID'] = $rows[0]->BookID;
                            $bookCopyDetails['CopyID'] = $r[0]->CopyID + 1;
                            $bookCopyDetails['LendingCategory'] = $_POST['LendingCategorybookCopy2'];
                            $bookCopyDetails['CurrencyType'] = $_POST['currencybookCopy'];
                            $bookCopyDetails['CurrencyAmount'] = $_POST['priceBookCopy'];

                            $bookCopy->insert($bookCopyDetails);



                            if (!empty($_POST['VendorID'])) {
                                $bookData['VendorID'] = $_POST['VendorID'];
                                $vendorFlag = $_POST['VendorID'];
                            } else {
                                if (!empty($_POST['vendorName'])) {
                                    try {
                                        $randomNo = rand(100000, 999999);
                                        $salt = rand(1, 100);
                                        $Vid = $randomNo + $salt;
                                        $bookData['VendorID'] = $Vid;
                                        $vendorArray['VendorID'] = $Vid;
                                        $vendorArray['Name'] = $_POST['vendorName'];
                                        $vendorArray['TeleNo'] = $_POST['vendorTel'];
                                        $vendorArray['Address'] = $_POST['vendorAddress'];
                                        $vendorArray['Email'] = $_POST['vendorEmail'];
                                        
                                        $vendorFlag = $Vid;

                                        $vendor->insert($vendorArray);
                                    } catch (Exception $e) {
                                        return $errors['errors'] = "Something went wrong!";
                                    }
                                } else {
                                    $bookData['DonorID'] = NULL;
                                }
                            }

                            //add data donor
                            if (!empty($_POST['DonorID'])) {
                                $bookData['DonorID'] = $_POST['DonorID'];
                                $donorFlag = $_POST['DonorID'];
                            } else {
                                if (!empty($_POST['DonorName']) ) {
                                    try {
                                        $randomNo = rand(100000, 999999);
                                        $salt = rand(1, 100);
                                        $Vid = $randomNo + $salt;
                                        $bookData['DonorID'] = $Vid;
                                        $donorArray['Name'] = $_POST['DonorName'];
                                        $donorArray['DonorID'] = $Vid;
                                        $donorArray['TeleNo'] = $_POST['DonorTel'];
                                        $donorArray['Address'] = $_POST['DonorAddress'];
                                        $donorArray['Email'] = $_POST['DonorEmail'];

                                        $donorFlag = $Vid;
                                        $donor->insert($donorArray);
                                    } catch (Exception $e) {
                                        return $errors['errors'] = "Something went wrong!";
                                    }
                                } else {
                                    $bookData['VendorID'] = NULL;
                                }
                            }
                            

                            $query = "SELECT CopyID FROM bookcopy ORDER BY CopyID DESC LIMIT 1";
                            $newBookID = $bookCopy->query($query);

                            if ($vendorFlag != 0) {
                                $vendorBook = new VendorBook();
                                $vendorArray2['Code'] = "C";
                                $vendorArray2['BookID'] = $newBookID[0]->CopyID;
                                $vendorArray2['VendorID'] = $vendorFlag;
                                $vendorArray2['PurchasePrice'] = $_POST['priceBookCopy'];

                                $vendorBook->insert($vendorArray2);
                            }
                            else {
                                
                                $donorBook = new DonorBook();
                                $donorArray2['Code'] = "C";
                                $donorArray2['BookID'] = $newBookID[0]->CopyID;
                                $donorArray2['DonorID'] = $donorFlag;
                                $donorBook->insert($donorArray2);
                            }
                            $flag[0] = 1;
                            
                            record_Events(Auth::profileID(), "ADD_BOOK_COPY_SUCCESSFUL");
                        }
                    } else {
                        $errors = $bookCopy->errors;
                        record_Events(Auth::profileID(), "ADD_BOOK_COPY_UNSUCCESSFUL");
                    }
                    foreach ($_POST as $key => $value) {
                        unset($_POST[$key]);
                        // print_r($_POST);
                    }
                }
                
            }



            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view("librarian/bookCopy.add", ['errors' => $errors, 'rows' => $rows, 'fine' => '', 'flag' => $flag,'noOfBooks'=>$noOfBooks]);
            } else {
                return $this->view("libraryStaff/bookCopy.add", ['errors' => $errors, 'rows' => $rows, 'fine' => '', 'flag' => $flag,'noOfBooks'=>$noOfBooks]);
            }
        } else {
            $this->redirect('Login');
        }
    }



    //sandali ..............search book for all users..............


    public function viewSearchBookList()
    {
        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/searchbook.view');
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/searchbook.view');
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view('libraryStaff/searchbook.view');
        } else {
            $this->view('user/searchbook.view');
        }
    }


    public function searchbookUsers()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        // print_r("hi");
        $errors = array();
        $data = array();
        if (count($_POST) > 0) {
            $book = new Book();



            ///for search details


            if (!empty($_POST['Title']) && empty($_POST['Author']) && empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $data = $book->where('Title', $_POST['Title']);
            } else if (empty($_POST['Title']) && !empty($_POST['Author']) && empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $data = $book->where('AuthorName', $_POST['Author']);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->where('Category', $categoryid);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && empty($_POST['Subject']) && !empty($_POST['ISBN1'])) {

                $data = $book->where('ISBN', $_POST['ISBN1']);
            } else if (!empty($_POST['Title']) && !empty($_POST['Author'])) {

                $data = $book->whereColTwo('Title', $_POST['Title'], 'AuthorName', $_POST['Author']);
            } else if (!empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['Title'], 'Category', $categoryid);
            } else if (!empty($_POST['Title']) && !empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['Title'], 'ISBN', $_POST['ISBN1']);
            } else if (empty($_POST['Title']) && !empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'AuthorName', $_POST['Author']);
            } else if (!empty($_POST['Author']) && !empty($_POST['ISBN1'])) {

                $data = $book->whereColTwo('ISBN', $_POST['ISBN1'], 'AuthorName', $_POST['Author']);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && !empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'ISBN', $_POST['ISBN1']);
            }


            // else if(!empty($_POST['Title']) && !empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1']) ) {

            //     $authorid = get_authorID('Name',$_POST['Author']);
            //     $categoryid = get_categoryID('Name',$_POST['Subject']);

            //     $data = $book->whereColThree('Title', $_POST['Title'],'AuthorID', $authorid,'Category', $categoryid);

            // }


            //..........................................................................................................................................................


            /// for sort details
            else if (!empty($_POST['title']) && empty($_POST['author']) && empty($_POST['subject']) && empty($_POST['isbn'])) {

                $data = $book->where('Title', $_POST['title']);
            } else if (empty($_POST['title']) && !empty($_POST['author']) && empty($_POST['subject']) && empty($_POST['isbn'])) {

                $authorid = get_authorID('Name', $_POST['author']);
                $data = $book->where('AuthorID', $authorid);
            } else if (empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->where('Category', $categoryid);
            } else if (empty($_POST['title']) && empty($_POST['author']) && empty($_POST['subject']) && !empty($_POST['isbn'])) {

                $data = $book->where('ISBN', $_POST['isbn']);
            } else if (!empty($_POST['title']) && !empty($_POST['author'])) {

                $authorid = get_authorID('Name', $_POST['author']);
                $data = $book->whereColTwo('Title', $_POST['title'], 'AuthorID', $authorid);
            } else if (!empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['title'], 'Category', $categoryid);
            } else if (!empty($_POST['title']) && !empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['title'], 'ISBN', $_POST['isbn']);
            } else if (empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $authorid = get_authorID('Name', $_POST['author']);
                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'AuthorID', $authorid);
            } else if (!empty($_POST['author']) && !empty($_POST['isbn'])) {

                $authorid = get_authorID('Name', $_POST['author']);
                $data = $book->whereColTwo('ISBN', $_POST['isbn'], 'AuthorID', $authorid);
            } else if (empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && !empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'ISBN', $_POST['isbn']);
            }

            // print_r(($data));
            SESSION_start();

            $_SESSION["details"] = $data;

            $this->redirect("books/viewSearchBookList");
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view("admin/bookSearch", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view("librarian/bookSearch", ['errors' => $errors, 'rows' => $data]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view("libraryStaff/bookSearch", ['errors' => $errors, 'rows' => $data, 'fine' => '']);
        } else {
            return $this->view("user/searchbook", ['errors' => $errors, 'rows' => $data]);
        }
    }


    public function viewSearchBookListOPAC()
    {

        $this->view('includes/searchbookOPAC.view');
    }


    public function searchbookOPAC()
    {
        // print_r("hi");
        $errors = array();

        if (count($_POST) > 0) {
            $book = new Book();



            if (!empty($_POST['Title']) && empty($_POST['Author']) && empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $data = $book->where('Title', $_POST['Title']);
            } else if (empty($_POST['Title']) && !empty($_POST['Author']) && empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $data = $book->where('AuthorName', $_POST['Author']);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->where('Category', $categoryid);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && empty($_POST['Subject']) && !empty($_POST['ISBN1'])) {

                $data = $book->where('ISBN', $_POST['ISBN1']);
            } else if (!empty($_POST['Title']) && !empty($_POST['Author'])) {

                $data = $book->whereColTwo('Title', $_POST['Title'], 'AuthorName', $_POST['Author']);
            } else if (!empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['Title'], 'Category', $categoryid);
            } else if (!empty($_POST['Title']) && !empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['Title'], 'ISBN', $_POST['ISBN1']);
            } else if (empty($_POST['Title']) && !empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'AuthorName', $_POST['Author']);
            } else if (!empty($_POST['Author']) && !empty($_POST['ISBN1'])) {

                $data = $book->whereColTwo('ISBN', $_POST['ISBN1'], 'AuthorName',  $_POST['Author']);
            } else if (empty($_POST['Title']) && empty($_POST['Author']) && !empty($_POST['Subject']) && !empty($_POST['ISBN1'])) {

                $categoryid = get_categoryID('Name', $_POST['Subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'ISBN', $_POST['ISBN1']);
            }


            // else if(!empty($_POST['Title']) && !empty($_POST['Author']) && !empty($_POST['Subject']) && empty($_POST['ISBN1']) ) {

            //     $authorid = get_authorID('Name',$_POST['Author']);
            //     $categoryid = get_categoryID('Name',$_POST['Subject']);

            //     $data = $book->whereColThree('Title', $_POST['Title'],'AuthorID', $authorid,'Category', $categoryid);

            // }


            //..........................................................................................................................................................


            /// for sort details
            else if (!empty($_POST['title']) && empty($_POST['author']) && empty($_POST['subject']) && empty($_POST['isbn'])) {

                $data = $book->where('Title', $_POST['title']);
            } else if (empty($_POST['title']) && !empty($_POST['author']) && empty($_POST['subject']) && empty($_POST['isbn'])) {

                $data = $book->where('AuthorName', $_POST['author']);
            } else if (empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->where('Category', $categoryid);
            } else if (empty($_POST['title']) && empty($_POST['author']) && empty($_POST['subject']) && !empty($_POST['isbn'])) {

                $data = $book->where('ISBN', $_POST['isbn']);
            } else if (!empty($_POST['title']) && !empty($_POST['author'])) {

                $data = $book->whereColTwo('Title', $_POST['title'], 'AuthorName', $_POST['author']);
            } else if (!empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['title'], 'Category', $categoryid);
            } else if (!empty($_POST['title']) && !empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                //$data = $book->where('Category', $categoryid);
                $data = $book->whereColTwo('Title', $_POST['title'], 'ISBN', $_POST['isbn']);
            } else if (empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['subject']) && empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'AuthorName',  $_POST['author']);
            } else if (!empty($_POST['author']) && !empty($_POST['isbn'])) {

                $authorid = get_authorID('Name', $_POST['author']);
                $data = $book->whereColTwo('ISBN', $_POST['isbn'], 'AuthorName',  $_POST['author']);
            } else if (empty($_POST['title']) && empty($_POST['author']) && !empty($_POST['subject']) && !empty($_POST['isbn'])) {

                $categoryid = get_categoryID('Name', $_POST['subject']);
                $data = $book->whereColTwo('Category', $categoryid, 'ISBN', $_POST['isbn']);
            }

            // print_r(($data));
            SESSION_start();

            $_SESSION["details"] = $data;

            $this->redirect("books/viewSearchBookListOPAC");
        }


        $this->view("includes/searchbook");
    }

    public function newarrivals()
    {
        // print_r("hi");
        $errors = array();

        if (count($_POST) > 0) {
            $book = new Book();
        }

        $this->view("includes/newarrivals");
    }
}

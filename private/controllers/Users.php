<?php

//Users controller
class Users extends Controller
{

    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }


        $user = new User();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(UserID) AS total_rows FROM user";
        $totalRows = $user->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 20;
        $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;
        $offset = ($page_number - 1) * $rows_per_page;

        //Finding page numbers
        $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

        //Search page

        if (isset($_POST['page_search_button'])) {

            //Eg: (Location: http://localhost/pothpiyasa/public/home)
            header("Location: " . ROOT . "/users/viewusers?page=" . $_POST['go_to_page']);
            die;
        }

        // print_r($page_numbers);


        $query = "SELECT * FROM user ORDER BY LastName ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end

        if (isset($_POST['filter_typo_search'])) {

            $column = $_POST['user_filter_typo'];
            $value = $_POST['user_filter_typo_input'];

            if ($column == 'FirstName') {
                $data = $user->where($column, $value);

            } elseif ($column == 'LastName') {
                $data = $user->where($column, $value);

            } elseif ($column == 'Sex') {
                $data = $user->where($column, $value);

            } elseif ($column == 'Email') {
                $data = $user->where($column, $value);

            } else {
                $data = $user->query($query);

            }

        } else {

            $data = $user->query($query);


        }

        record_Events(Auth::profileID(), "VIEW_PATRONS");

        //$data comes as array of items (Array ( [0] => stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212....)

        //In view method, it extract the data (['rows'] => $data; --> $rows = $data;)
        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/users.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
            ;
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/user.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
            ;
        } else {
            return $this->view('libraryStaff/users.view', ['rows' => $data, 'page_numbers' => $page_numbers]);
            ;
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

            if (count($_POST) > 0) {

                $user = new User();

                if ($user->validate($_POST)) {


                    $userData['RegistrationNo'] = $_POST['RegistrationNo'];
                    $userData['Title'] = $_POST['Title'];
                    $userData['FirstName'] = $_POST['FirstName'];
                    $userData['PhoneNo'] = $_POST['PhoneNo'];
                    $userData['LastName'] = $_POST['LastName'];
                    $userData['Sex'] = $_POST['Sex'];
                    $userData['Birthday'] = $_POST['Birthday'];
                    $userData['Address'] = $_POST['Address'];
                    $userData['Email'] = $_POST['Email'];
                    $userData['NIC'] = $_POST['NIC'];
                    //Password
                    $userData['Password'] = password_hash($_POST['RegistrationNo'], PASSWORD_DEFAULT);
                    //UserName
                    $userData['UserName'] = $_POST['RegistrationNo'];
                    //UserID
                    $userData['UserID'] = random_string(9);
                    //AddStaffID
                    $userData['AddStaffID'] = get_staffid('UserID', $_SESSION['USER']->UserID);
                    //AddDate
                    $userData['AddDate'] = date("Y-m-d H:i:s");
                   


                    //Checking member type

                    if (
                        $_POST['MemberType'] == 'Librarian'
                        || $_POST['MemberType'] == 'Library-Staff'
                        || $_POST['MemberType'] == 'Administrator'
                    ) {

                        $userData['MemberType'] = 'Library-StaffMember';

                    } else {

                        $userData['MemberType'] = 'Other-Member';
                    }


                    if ($_POST['MemberType'] == 'Library-Staff') {
                        $userData['JobType'] = 'Library-Staff';

                    }

                    if ($_POST['MemberType'] == 'Administrator') {

                        $userData['JobType'] = 'Administrator';

                    }

                    if ($_POST['MemberType'] == 'Librarian') {

                        $userData['JobType'] = 'Librarian';

                    }

                    if ($_POST['MemberType'] == 'Lecturer') {

                        $userData['JobType'] = 'Borrower';

                    }

                    if ($_POST['MemberType'] == 'Student') {

                        $userData['JobType'] = 'Borrower';

                    }

                    if ($_POST['MemberType'] == 'Non-Academic') {

                        $userData['JobType'] = 'Borrower';

                    }


                    if ($_POST['MemberType'] == 'Lecturer' || $_POST['MemberType'] == 'Student') {

                        $userData['AcademicType'] = 'Academic';

                    }

                    if ($_POST['MemberType'] == 'Non-Academic') {
                        $userData['AcademicType'] = 'Non-Academic';

                    }

                    if ($_POST['MemberType'] == 'Lecturer') {
                        $userData['Type'] = 'Lecturer';

                    }

                    if ($_POST['MemberType'] == 'Student') {
                        $userData['Type'] = 'Student';

                    }

                    //Insert data to user table
                    $user->insert($userData);

                    //Insert data to librarystaff table
                    if ($userData['MemberType'] == 'Library-StaffMember') {
                        $libStaff = new LibraryStaff();

                        //For LibraryStaff table
                        $libStaffData['UserID'] = $userData['UserID'];
                        $libStaff->insert($libStaffData);
                    }

                    //Insert data to student table
                    if ($_POST['MemberType'] == 'Student') {

                        $student = new Student();

                        $studentData['UserID'] = $userData['UserID'];
                        $studentData['StudentType'] = $_POST['StudentType'];
                        $studentData['Degree'] = $_POST['Degree'];
                        $studentData['Batch'] = $_POST['Batch'];

                        $student->insert($studentData);

                    }

                    //Insert data to lecturer table
                    if ($_POST['MemberType'] == 'Lecturer') {

                        $lecturer = new Lecturer();

                        $lecturerData['UserID'] = $userData['UserID'];
                        $lecturerData['LecType'] = $_POST['LecType'];
                        $lecturerData['Subject'] = $_POST['Subject'];
                        $lecturerData['Department'] = $_POST['Department'];

                        $lecturer->insert($lecturerData);
                    }

                    //Insert data to nonAcademic staff table
                    if ($_POST['MemberType'] == 'Non-Academic') {
                        $nonAcademicStaff = new NonAcademicStaff();

                        //For LibraryStaff table
                        $nonAcademicStaffData['UserID'] = $userData['UserID'];
                        $nonAcademicStaff->insert($nonAcademicStaffData);
                    }

                    $flag[0] = 1;
                    //$this->redirect('AdminDashboard');

                    record_Events(Auth::profileID(), "ADD_PATRONS");


                } else {
                    $errors = $user->errors;
                    record_Events(Auth::profileID(), "ADD_PATRONS_UNSUCCESSFUL");

                }
            }
            if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                return $this->view('admin/users.add', ['errors' => $errors, 'flag' => $flag]);
            } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                return $this->view('librarian/users.add', ['errors' => $errors, 'flag' => $flag]);
            } else {
                return $this->view('libraryStaff/users.add', ['errors' => $errors, 'flag' => $flag]);
            }

        } else {
            $this->redirect('Login');

        }

    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);


        $user = new User();
        $lecturer = new Lecturer();
        $student = new Student();

        //Getting existing data from database
        $rowUser = $user->where('UserID', $id);
        $rowLecturer = $lecturer->where('UserID', $id);
        $rowStudent = $student->where('UserID', $id);


        //Validating newly inserting data
        if (count($_POST) > 0) {

            if ($user->validateEditProfile($_POST)) {
                
                $userData['RegistrationNo'] = $_POST['RegistrationNo'];
                $userData['Title'] = $_POST['Title'];
                $userData['FirstName'] = $_POST['FirstName'];
                $userData['PhoneNo'] = $_POST['PhoneNo'];
                $userData['LastName'] = $_POST['LastName'];
                $userData['Sex'] = $_POST['Sex'];
                $userData['Birthday'] = $_POST['Birthday'];
                $userData['Address'] = $_POST['Address'];
                $userData['Email'] = $_POST['Email'];
                $userData['NIC'] = $_POST['NIC'];

                //Checking member type

                if (
                    $_POST['MemberType'] == 'Librarian'
                    || $_POST['MemberType'] == 'Library-Staff'
                    || $_POST['MemberType'] == 'Administrator'
                ) {

                    $userData['MemberType'] = 'Library-StaffMember';

                } else {

                    $userData['MemberType'] = 'Other-Member';
                }


                if ($_POST['MemberType'] == 'Library-Staff') {

                    $userData['JobType'] = 'Library-Staff';

                }

                if ($_POST['MemberType'] == 'Administrator') {

                    $userData['JobType'] = 'Administrator';

                }

                if ($_POST['MemberType'] == 'Librarian') {

                    $userData['JobType'] = 'Librarian';

                }

                if ($_POST['MemberType'] == 'Lecturer') {

                    $userData['JobType'] = 'Borrower';

                }

                if ($_POST['MemberType'] == 'Student') {

                    $userData['JobType'] = 'Borrower';

                }

                if ($_POST['MemberType'] == 'Non-Academic') {

                    $userData['JobType'] = 'Borrower';

                }


                if ($_POST['MemberType'] == 'Lecturer' || $_POST['MemberType'] == 'Student') {

                    $userData['AcademicType'] = 'Academic';

                }

                if ($_POST['MemberType'] == 'Non-Academic') {
                    $userData['AcademicType'] = 'Non-Academic';

                }

                if ($_POST['MemberType'] == 'Lecturer') {
                    $userData['Type'] = 'Lecturer';

                }

                if ($_POST['MemberType'] == 'Student') {
                    $userData['Type'] = 'Student';

                }

                //Insert data to user table
                $user->update('UserID', $id, $userData);


                //Insert data to student table
                if ($_POST['MemberType'] == 'Student') {
                    $student = new Student();

                    $studentData['StudentType'] = $_POST['StudentType'];
                    $studentData['Degree'] = $_POST['Degree'];
                    $studentData['Batch'] = $_POST['Batch'];

                    $student->update('UserID', $id, $studentData);

                }

                //Insert data to lecturer table
                if ($_POST['MemberType'] == 'Lecturer') {
                    $lecturer = new Lecturer();

                    $lecturerData['LecType'] = $_POST['LecType'];
                    $lecturerData['Subject'] = $_POST['Subject'];
                    $lecturerData['Department'] = $_POST['Department'];

                    $lecturer->update('UserID', $id, $lecturerData);
                }

                $flag[0] = 1;
                //$this->redirect('users');

            } else {
                $errors = $user->errors;

            }
        }
        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/users.edit', ['rowUser' => $rowUser,'rowLecturer' => $rowLecturer,'rowStudent' => $rowStudent,'errors' => $errors,'flag' => $flag]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/users.edit', ['rowUser' => $rowUser,'rowLecturer' => $rowLecturer,'rowStudent' => $rowStudent,'errors' => $errors,'flag' => $flag]);
        } else {
            return $this->view('libraryStaff/users.edit', ['rowUser' => $rowUser,'rowLecturer' => $rowLecturer,'rowStudent' => $rowStudent,'errors' => $errors,'flag' => $flag]);
        }

        
    }

    public function delete($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $user = new User();
        $lecturer = new Lecturer();
        $student = new Student();
        $libStaff = new LibraryStaff();


        //Delete data from user table
        $user->delete('UserID', $id);


        //Delete data from librarystaff table
        $libStaff->delete('UserID', $id);

        //Delete data from student table
        $student->delete('UserID', $id);


        //Delete data from lecturer table
        $lecturer->delete('UserID', $id);


        $this->redirect('users');


    }

    public function editProfile($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);


        $user = new User();

        //Getting existing data from database
        $row = $user->where('UserID', $id);


        if (count($_POST) > 0) {

            $img_name = $_FILES['fileToUpload']['name'];
            $img_size = $_FILES['fileToUpload']['size'];
            $tmp_name = $_FILES['fileToUpload']['tmp_name'];
            $error = $_FILES['fileToUpload']['error'];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if ($user->validateEditProfile($_POST)) {

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    //$_POST['imagefile']=$img_upload_path;
                    $userData['Image'] = $new_img_name;
                    //print_r($authorData['ImgUrl']);
                }

                $userData['Title'] = $_POST['Title'];
                $userData['FirstName'] = $_POST['FirstName'];
                $userData['PhoneNo'] = $_POST['PhoneNo'];
                $userData['LastName'] = $_POST['LastName'];
                $userData['Sex'] = $_POST['Sex'];
                $userData['Birthday'] = $_POST['Birthday'];
                $userData['Address'] = $_POST['Address'];
                $userData['Email'] = $_POST['Email'];
                $userData['NIC'] = $_POST['NIC'];


                // $userData['Image'] = $_POST['Image'];

                //Update data to user table
                $user->update('UserID', $id, $userData);

                $flag[0] = 1;

            } else {
                $errors = $user->errors;

            }

        }


        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/users.editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view('libraryStaff/editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);
        } else {

            $this->view('user/users.editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);
        }

    }

    public function changePassword($id = null)
    {

        $errors = array();
        $flag = array(0);


        $user = new User();

        //Getting existing data from database
        $row = $user->where('UserID', $id);

        // print_r($_POST);

        if (isset($_POST['passwordSave'])) {
            if ($user->passwordValidate($_POST, $row)) {
            
                $userData['Password'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

                $user->update('UserID', $id, $userData);

                $flag[0] = 1;

            } else {

                $errors = $user->errors;

            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/users.editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);
        } else {

            $this->view('user/users.editProfile', [
                'row' => $row,
                'errors' => $errors,
                'flag' => $flag
            ]);

        }

    }

    public function deletePreview($id = Null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $user = new User();
        $lecturer = new Lecturer();
        $student = new Student();

        $rowUser = $user->where('UserID', $id);
        $rowLecturer = $lecturer->where('UserID', $id);
        $rowStudent = $student->where('UserID', $id);

        $flag = array(0);

        $flag[0] = 1;

        // echo $flag[0];
        // $this->redirect('users');


        

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/users.deletePreview', [
                'rowUser' => $rowUser,
                'rowLecturer' => $rowLecturer,
                'rowStudent' => $rowStudent,
                'flag' => $flag
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/users.deletePreview', [
                'rowUser' => $rowUser,
                'rowLecturer' => $rowLecturer,
                'rowStudent' => $rowStudent,
                'flag' => $flag
            ]);
        } 

    }


    //Sandali
    public function myhistory($id = "null")
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }


        $loan = new IssueBook();
        $row = $loan->where("UserID", $id);

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(UserID) AS total_rows FROM issuebook where UserID=$id";
        $totalRows = $loan->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 10;
        $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;
        $offset = ($page_number - 1) * $rows_per_page;

        //Finding page numbers
        $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

        //Search page

        if (isset($_POST['page_search_button'])) {

            //Eg: (Location: http://localhost/pothpiyasa/public/home)
            header("Location: " . ROOT . "/users/myhistory/" . $id . "?page=" . $_POST['go_to_page']);
            die;
        }

        // print_r($page_numbers);


        $query = "SELECT * FROM issuebook where UserID=$id ORDER BY BookID ASC LIMIT $rows_per_page OFFSET $offset ";

        $data = $loan->query($query);

        


        record_Events(Auth::profileID(), "VIEW_MY_HISTORY");

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/history', [
                'rows' => $data,
                'page_numbers' => $page_numbers , 'userid' => $id

            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/history', [
                'rows' => $data,
                'page_numbers' => $page_numbers , 'userid' => $id
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/history', [
                'rows' => $data,
                'page_numbers' => $page_numbers , 'userid' => $id
            ]);
        } else {

            return $this->view("user/history", ['rows' => $data, 'page_numbers' => $page_numbers , 'userid' => $id]);
        }


    }


    public function reservebook($bookid = "null", $id = "null")
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }


        $reserve = new ReserveBook();
        $row = $reserve->where("UserID", $id);
       

        $row1 = $reserve->where("BookID", $bookid);


        $book = new Book();
        $row2 = $book->where("BookID", $bookid);
        //print($row2[0]->AvailableCopies);

        $flag = 0;
        $fine=0;


        //check fine
        $fineamount=new IssueBook();
        $getfines = $fineamount->where("UserID", $id);
        if($getfines){

            foreach($getfines as $r){
                if($r->FineStatus==1){
                   $fine=1;
                }
              }

        }
       

        
        if ($row1 && $row) {

            for ($i = 0; $i < count($row1); $i++) {
                if ($row1[$i]->UserID == $id) {
                    $flag = 1;

                }

            }
 
            if (count($row) < 3 && count($row1) < 3 && $flag == 0 && ($row2[0]->AvailableCopies) >0 && $fine==0) {
                print("both have");

                if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                    $this->view("librarian/booksucess", ['row' => $row2]);

    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                    $this->view("admin/booksucess", ['row' => $row2]);
    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                    $this->view("libraryStaff/booksucess", ['row' => $row2]);
                }else {
                    $this->view("user/booksucess", ['row' => $row2]);
    
                }

            } else {

                if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                    $this->view("librarian/bookunsucess", ['row' => $row2]);

    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                    $this->view("admin/bookunsucess", ['row' => $row2]);
    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                    $this->view("libraryStaff/bookunsucess", ['row' => $row2]);
                }else {
                    $this->view("user/bookunsucess", ['row' => $row2]);
    
                }

            }

        } else {

            if(empty($row) && empty($row1) && ($row2[0]->AvailableCopies) >0 && $fine==0){

                print("Nothing");
                if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                    $this->view("librarian/booksucess", ['row' => $row2]);
    
    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                    $this->view("admin/booksucess", ['row' => $row2]);
    
                } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                    $this->view("libraryStaff/booksucess", ['row' => $row2]);
                }else {
                    $this->view("user/booksucess", ['row' => $row2]);
    
                }

            }else{
                if(empty($row) && !empty($row1) && ($row2[0]->AvailableCopies) >0 && $fine==0){
                   
                      if(count($row1) < 3) {
                        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                            $this->view("librarian/booksucess", ['row' => $row2]);
            
            
                        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                            $this->view("admin/booksucess", ['row' => $row2]);
            
                        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                            $this->view("libraryStaff/booksucess", ['row' => $row2]);
                        }else {
                            $this->view("user/booksucess", ['row' => $row2]);
            
                        }
                      }
                    
                }
                elseif(empty($row1) && !empty($row)  && ($row2[0]->AvailableCopies) >0 && $fine==0){
                        
                        if(count($row) < 3) {
                            if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                                $this->view("librarian/booksucess", ['row' => $row2]);
                
                
                            } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                                $this->view("admin/booksucess", ['row' => $row2]);
                
                            } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                                $this->view("libraryStaff/booksucess", ['row' => $row2]);
                            }else {
                                $this->view("user/booksucess", ['row' => $row2]);
                
                            }
        
                        }    

                    
                }
                else{
                    if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
                        $this->view("librarian/bookunsucess", ['row' => $row2]);
    
        
                    } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
                        $this->view("admin/bookunsucess", ['row' => $row2]);
        
                    } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
                        $this->view("libraryStaff/bookunsucess", ['row' => $row2]);
                    }else {
                        $this->view("user/bookunsucess", ['row' => $row2]);
        
                    }

                }
                   

               

            }
           

        }



    }

    public function addreservation($bookid = "null", $id = "null")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }


        $reserve = new ReserveBook();

        $reservaData['UserID'] = $id;
        $reservaData['BookID'] = $bookid;

        $reserve->insert($reservaData);

        $book = new Book();
        $row2 = $book->where("BookID", $bookid);

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view("librarian/book.view.view", ['row' => $row2]);

        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view("admin/book.view.view", ['row' => $row2]);

        } elseif (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            $this->view("libraryStaff/book.view.view", ['row' => $row2]);
        }else {
            $this->view("user/book.view", ['row' => $row2]);

        }



    }

    public function myreservations($id = "null")
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $reserve = new ReserveBook();
        $row = $reserve->where("UserID", $id);


        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/reservations', [
                'rows' => $row

            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/reservations', [
                'rows' => $row
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/reservations', [
                'rows' => $row
            ]);
        } else {

            return $this->view("user/reservations", ['rows' => $row]);
        }

    }

    public function removeReservations($userID = "null", $id = "null")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }


        $reserve = new ReserveBook();

        $reserve->deleteRow("UserID", "BookID", $userID, $id);

        $row1 = $reserve->where("UserID", $userID);
        //return $this->view("user/reservations", ['rows' => $row1]);

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/reservations', [
                'rows' => $row1

            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/reservations', [
                'rows' => $row1
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/reservations', [
                'rows' => $row1
            ]);
        } else {

            return $this->view("user/reservations", ['rows' => $row1]);
        }


    }

    public function myloans($id = "null")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $loan = new IssueBook();
        $row = $loan->where("UserID", $id);

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/loans', [
                'rows' => $row

            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/loans', [
                'rows' => $row
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/loans', [
                'rows' => $row
            ]);
        } else {

            return $this->view("user/loans", ['rows' => $row]);
        }


    }

    public function requestbooks()
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);


        if (count($_POST) > 0) {
            $requestbook = new RequestBooks();


            //get staffid from userid
            $value = Auth::profileID();

            if ($requestbook->validateRequestBooks($_POST, $value)) {


                try{
                    $requestbookData['BookTitle'] = $_POST['bookTitle'];
                    $requestbookData['Author'] = $_POST['bookAuthor'];
                    $requestbookData['PublishedYear'] = $_POST['bookPublishedYear'];
                    $requestbookData['Edition'] = $_POST['bookEdition'];



                    $requestbookData['UserID'] = $value;

                    //print_r($requestbookData);
                    $requestbook->insert($requestbookData);



                    $flag[0] = 1;
                }
                catch(Exception $e){
                    $errors['error'] = "Something went to wrong!";
                }
                

            } else {

                $errors = $requestbook->errors;


            }


        }


        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/requestBooks', ['errors' => $errors, 'flag' => $flag]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/requestBooks', ['errors' => $errors, 'flag' => $flag]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/requestBooks', ['errors' => $errors, 'flag' => $flag]);
        } else {

            return $this->view('user/requestBooks', ['errors' => $errors, 'flag' => $flag]);
        }


    }



    public function receivedBookList(){
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $booklist = new ReceivedBookList();
        $rows = $booklist->findall();

        if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            return $this->view('admin/receivedBooklist', [
                'rows' => $rows

            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            return $this->view('librarian/receivedBooklist', [
                'rows' => $rows
            ]);
        } else if (get_JobType("UserID", Auth::profileID()) == 'Library-Staff') {
            return $this->view('libraryStaff/receivedBooklist', [
                'rows' => $rows
            ]);
        } else {
            return $this->view("user/receivedBooklist", ['rows' => $rows]);
        }

    }


}
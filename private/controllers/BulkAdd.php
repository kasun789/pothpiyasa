<?php

require_once __DIR__ . '/../models/phpspreadsheet/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class BulkAdd extends controller
{
    public function index()
    {

    }


    public function student_add()
    {
        $errors = array();
        $flag = array(0);
        //Checking if the button is pressed
        if (isset($_POST['save_excel_data'])) {
            //Getting import file
            $fileName = $_FILES['import_file']['name'];
            //Getting file extension
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            //Validation part
            $allowed_ext = ['xls', 'csv', 'xlsx'];

            //If the file extension matches with given allowed file extension
            if (in_array($file_ext, $allowed_ext)) {

                //This is that file
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();


                $user = new User();

                $count = "0";
                foreach ($data as $row) {
                    if ($count > 0) {

                        if ($user->validateBulkAdd($row)) {

                            //UserID
                            $userData['UserID'] = random_string(9);
                            $userData['RegistrationNo'] = $row['0'];
                            $userData['NIC'] = $row['1'];
                            $userData['Title'] = $row['2'];
                            $userData['FirstName'] = $row['3'];
                            $userData['LastName'] = $row['4'];
                            $userData['PhoneNo'] = $row['5'];
                            $userData['Sex'] = $row['6'];
                            $userData['Birthday'] = $row['7'];
                            $userData['Address'] = $row['8'];
                            $userData['Email'] = $row['9'];
                            //UserName
                            $userData['UserName'] = $row['0'];
                            //Password
                            $userData['Password'] = password_hash($row['0'], PASSWORD_DEFAULT);
                            //AddStaffID
                            $userData['AddStaffID'] = get_staffid('UserID', $_SESSION['USER']->UserID);
                            //AddDate
                            $userData['AddDate'] = date("Y-m-d H:i:s");
                            $userData['MemberType'] = "Other-Member";
                            $userData['AcademicType'] = "Academic";
                            $userData['Type'] = "Student";


                            //Insert data to user table
                            $user->insert($userData);


                            $student = new Student();

                            $studentData['UserID'] = $userData['UserID'];
                            $studentData['StudentType'] = $row['10'];
                            $studentData['Degree'] = $row['11'];
                            $studentData['Batch'] = $row['12'];

                            //Insert data to student table
                            $student->insert($studentData);

                            $flag[0] = 1;
                            record_Events(Auth::profileID(), "BULK_ADD_SUCCESSFUL");


                        } else {
                            $errors = $user->errors;
                            record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
                        }

                    } else {
                        $errors['EmptyFile'] = "The file is currently empty. I kindly request you to thoroughly examine its contents.";

                        $count = "1";
                    }
                }

            } else {
                $errors['File'] = "The file specified does not meet the required file type criteria. I kindly request you to verify the file type for accuracy.";

                record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");

            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/bulkAddStudent', ['errors' => $errors, 'flag' => $flag]);

        } else if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bulkAddStudent', ['errors' => $errors, 'flag' => $flag]);

        } else{
            $this->redirect('login');
        }



    }

    public function lecturer_add()
    {
        $errors = array();
        $flag = array(0);

        //Checking if the button is pressed
        if (isset($_POST['save_excel_data'])) {
            //Getting import file
            $fileName = $_FILES['import_file']['name'];
            //Getting file extension
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            //Validation part
            $allowed_ext = ['xls', 'csv', 'xlsx'];

            //If the file extension matches with given allowed file extension
            if (in_array($file_ext, $allowed_ext)) {

                $user = new User();

                //This is that file
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $count = "0";
                foreach ($data as $row) {
                    if ($count > 0) {

                        if ($user->validateBulkAdd($row)) {

                            //UserID
                            $userData['UserID'] = random_string(9);
                            $userData['RegistrationNo'] = $row['0'];
                            $userData['NIC'] = $row['1'];
                            $userData['Title'] = $row['2'];
                            $userData['FirstName'] = $row['3'];
                            $userData['LastName'] = $row['4'];
                            $userData['PhoneNo'] = $row['5'];
                            $userData['Sex'] = $row['6'];
                            $userData['Birthday'] = $row['7'];
                            $userData['Address'] = $row['8'];
                            $userData['Email'] = $row['9'];
                            //UserName
                            $userData['UserName'] = $row['0'];
                            //Password
                            $userData['Password'] = password_hash($row['0'], PASSWORD_DEFAULT);
                            //AddStaffID
                            $userData['AddStaffID'] = get_staffid('UserID', $_SESSION['USER']->UserID);
                            //AddDate
                            $userData['AddDate'] = date("Y-m-d H:i:s");
                            $userData['MemberType'] = "Other-Member";
                            $userData['AcademicType'] = "Academic";
                            $userData['Type'] = "Lecturer";


                            //Insert data to user table
                            $user->insert($userData);


                            $lecturer = new Lecturer();

                            $lecturerData['UserID'] = $userData['UserID'];
                            $lecturerData['LecType'] = $row['10'];
                            $lecturerData['Subject'] = $row['11'];
                            $lecturerData['Department'] = $row['12'];

                            //Insert data to student table
                            $lecturer->insert($lecturerData);

                            $flag[0] = 1;
                            record_Events(Auth::profileID(), "BULK_ADD_SUCCESSFUL");


                        } else {
                            $errors = $user->errors;
                            record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
                        }


                    } else {
                        $errors['EmptyFile'] = "The file is currently empty. I kindly request you to thoroughly examine its contents.";

                        $count = "1";
                    }
                }

            } else {
                $errors['File'] = "The file specified does not meet the required file type criteria. I kindly request you to verify the file type for accuracy.";

                record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
            }
        }


        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/bulkAddLecturer', ['errors' => $errors, 'flag' => $flag]);

        } else if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bulkAddLecturer', ['errors' => $errors, 'flag' => $flag]);

        } else{
            $this->redirect('login');
        }


    }

    public function nonacademic_add()
    {
        $errors = array();
        $flag = array(0);

        //Checking if the button is pressed
        if (isset($_POST['save_excel_data'])) {
            //Getting import file
            $fileName = $_FILES['import_file']['name'];
            //Getting file extension
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            //Validation part
            $allowed_ext = ['xls', 'csv', 'xlsx'];

            //If the file extension matches with given allowed file extension
            if (in_array($file_ext, $allowed_ext)) {

                $user = new User();

                //This is that file
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $count = "0";
                foreach ($data as $row) {
                    if ($count > 0) {

                        if ($user->validateBulkAdd($row)) {



                            //UserID
                            $userData['UserID'] = random_string(9);
                            $userData['RegistrationNo'] = $row['0'];
                            $userData['NIC'] = $row['1'];
                            $userData['Title'] = $row['2'];
                            $userData['FirstName'] = $row['3'];
                            $userData['LastName'] = $row['4'];
                            $userData['PhoneNo'] = $row['5'];
                            $userData['Sex'] = $row['6'];
                            $userData['Birthday'] = $row['7'];
                            $userData['Address'] = $row['8'];
                            $userData['Email'] = $row['9'];
                            //UserName
                            $userData['UserName'] = $row['0'];
                            //Password
                            $userData['Password'] = password_hash($row['0'], PASSWORD_DEFAULT);
                            //AddStaffID
                            $userData['AddStaffID'] = get_staffid('UserID', $_SESSION['USER']->UserID);
                            //AddDate
                            $userData['AddDate'] = date("Y-m-d H:i:s");
                            $userData['MemberType'] = "Other-Member";
                            $userData['AcademicType'] = "Academic";
                            $userData['Type'] = "Student";


                            //Insert data to user table
                            $user->insert($userData);

                            $flag[0] = 1;
                            record_Events(Auth::profileID(), "BULK_ADD_SUCCESSFUL");


                        } else {
                            $errors = $user->errors;
                            record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
                        }

                    } else {
                        $errors['EmptyFile'] = "The file is currently empty. I kindly request you to thoroughly examine its contents.";

                        $count = "1";
                    }
                }


            } else {
                $errors['File'] = "The file specified does not meet the required file type criteria. I kindly request you to verify the file type for accuracy.";

                record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            $this->view('librarian/bulkAddNonAcademic', ['errors' => $errors, 'flag' => $flag]);

        } else if (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bulkAddNonAcademic', ['errors' => $errors, 'flag' => $flag]);

        } else{
            $this->redirect('login');
        }


    }

    public function holiday_add()
    {
        $errors = array();
        $flag = array(0);

        //Checking if the button is pressed
        if (isset($_POST['save_excel_data'])) {
            //Getting import file
            $fileName = $_FILES['import_file']['name'];
            //Getting file extension
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            //Validation part
            $allowed_ext = ['xls', 'csv', 'xlsx'];

            //If the file extension matches with given allowed file extension
            if (in_array($file_ext, $allowed_ext)) {

                $holiday = new Holiday();

                //This is that file
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $count = "0";
                foreach ($data as $row) {
                    if ($count > 0) {


                        if ($holiday->validateHolidayBulkAdd($row)) {

                            $holidayData['Holiday_title'] = $row['0'];

                            if (empty(trim($row[1]))) {
                                echo "here";
                                $holidayData['Holiday_description'] = "None";
                            } else {
                                $holidayData['Holiday_description'] = $row['1'];

                            }

                            $holidayData['Holiday_start'] = $row['2'];

                            if (empty(trim($row[3]))) {
                                $holidayData['Holiday_end'] = 0000 - 00 - 00;
                            } else {
                                $holidayData['Holiday_end'] = $row['3'];

                            }



                            //Insert data to user table
                            $holiday->insert($holidayData);

                            $flag[0] = 1;
                            record_Events(Auth::profileID(), "BULK_ADD_SUCCESSFUL");


                        } else {
                            $errors = $holiday->errors;
                            record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
                        }

                    } else {
                        $errors['EmptyFile'] = "The file is currently empty. I kindly request you to thoroughly examine its contents.";

                        $count = "1";
                    }
                }


            } else {
                $errors['File'] = "The file specified does not meet the required file type criteria. I kindly request you to verify the file type for accuracy.";

                record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
            }
        }

        $this->view('admin/bulkAddHoliday', ['errors' => $errors, 'flag' => $flag]);

    }

    public function reservation_booklist_add()
    {
        $errors = array();
        $flag = array(0);

        //Checking if the button is pressed
        if (isset($_POST['save_excel_data'])) {
            //Getting import file
            $fileName = $_FILES['import_file']['name'];
            //Getting file extension
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            //Validation part
            $allowed_ext = ['xls', 'csv', 'xlsx'];

            //If the file extension matches with given allowed file extension
            if (in_array($file_ext, $allowed_ext)) {

                $receivedbooklist = new ReceivedBookList();

                //This is that file
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $count = "0";
                foreach ($data as $row) {
                    if ($count > 0) {

                        

                        if ($receivedbooklist->validateReceivedBookListBulkAdd($row)) {

                            $receivedbooklistData['BookTitle'] = $row['0'];

                            $receivedbooklistData['AuthorName'] = $row['1'];

                            $receivedbooklistData['Edition'] = $row['2'];

                            $receivedbooklistData['PublishedYear'] = $row['3'];


                            //Insert data to receivedbooklist table
                            $receivedbooklist->insert($receivedbooklistData);

                            $flag[0] = 1;
                            record_Events(Auth::profileID(), "BULK_ADD_SUCCESSFUL");


                        } else {
                            $errors = $receivedbooklist->errors;
                            record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
                        }

                    } else {
                        $errors['EmptyFile'] = "The file is currently empty. I kindly request you to thoroughly examine its contents.";

                        $count = "1";
                    }
                }


            } else {
                $errors['File'] = "The file specified does not meet the required file type criteria. I kindly request you to verify the file type for accuracy.";
                record_Events(Auth::profileID(), "BULK_ADD_UNSUCCESSFUL");
            }
        }

        $this->view('librarian/bulkAddRecievedBookList', ['errors' => $errors, 'flag' => $flag]);

    }

}
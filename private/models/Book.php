<?php

class Book extends Model
{
     public function validate($DATA, $imgSize, $imgExLc)
     {
          // print_r($DATA);
          $this->errors = array();

          // Check for title
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Title'])) {
               $this->errors['Title'] = "Title can not correct";
          }

          //Check for ISBN
          if (!is_numeric($DATA['ISBN']) || strlen((string)$DATA['ISBN']) != 13) {
               echo strlen((string)$DATA['ISBN']);
               $this->errors['ISBN'] = "ISBN can not correct";
          }

          $book = new Book();
          $data = $book->findAll();



          for ($i = 0; $i < count($data); $i++) {
               if ($data[$i]->ISBN == $DATA['ISBN']) {
                    $this->errors['ISBN'] = "ISBN already exists";
                    $this->errors['ISBNo'] = $DATA['ISBN'];
               }
          }



          //Check for edition
          if (!preg_match('/^[0-9]+$/', $DATA['Edition'])) {
               $this->errors['Edition'] = "Only numbers allowed";
          }

          //Check for author
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['AuthorName'])) {
               $this->errors['Author'] = "Author name is not correct";
          }



          //check for publisher
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Publisher'])) {
               $this->errors['Publisher'] = "Publisher name is not correct";
          }

          //publish year
          if (!(preg_match('/^[0-9]*$/', $DATA['PublishedYear'])) || strlen(strval($DATA['PublishedYear'])) != 4) {
               $this->errors['PublishedYear'] = "Published year is not correct";
          }

          //check for number of pages
          if (!preg_match('/^[0-9]*$/', $DATA['NoPages'])) {
               $this->errors['NoPages'] = "No Pages Should be numbers";
          }
          if ($DATA['NoPages'] < 1) {
               $this->errors['NoPages'] = "No Pages can not be negative";
          }

          //check the image
          if ($imgSize > 125000) {
               $this->errors['Image'] = "Sorry your file is too large!";
          }

          $allowedExs = array("jpg", "jpeg", "png");

          if (!in_array($imgExLc, $allowedExs)) {
               $this->errors['Image'] = "Only allowed jpg,jpeg,png format!";
          }

          //check for number of pages
          if (!preg_match('/^[0-9,.]*$/', $DATA['price'])) {
               $this->errors['price'] = "Price Should be numbers";
          }
          if ($DATA['price'] < 0) {
               $this->errors['price'] = "Price Should be positive";
          }
          if (!preg_match('/^\d+(\.\d{2})?$|^(\d+)$/', $DATA['price'])) {
               $this->errors['price'] = "Price should be in two decimal places";
          }

          if ($DATA['NoPages'] < 1) {
               $this->errors['price'] = "No pages can not be negative";
          }

          //Check the vendor Name
          if (isset($DATA['vendorName'])) {
               if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['vendorName'])) {
                    $this->errors['vendorName'] = "Vendor name is not correct";
               }
          }

          // Check the vendor email
          if (isset($DATA['vendorEmail'])) {
               $email = filter_var($DATA['vendorEmail'], FILTER_SANITIZE_EMAIL);

               // Validate email address
               if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $this->errors['vendorEmail'] = "Email not correct";
               }
          }

          //Check the phone no
          if (isset($DATA['vendorTel'])) {
               if (!preg_match('/^[0-9,]*$/', $DATA['vendorTel'])) {
                    $this->errors['vendorTel'] = "Phone No is not correct";
               } else if (strlen($DATA['vendorTel']) != 10) {
                    $this->errors['vendorTel'] = "Phone No is not correct";
               }
          }

          //Check the donor Name
          if (isset($DATA['DonorName'])) {
               if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['DonorName'])) {
                    $this->errors['DonorName'] = "Vendor name is not correct";
               }
          }

          //Check the phone no
          if (isset($DATA['DonorTel'])) {
               if (!preg_match('/^[0-9,]*$/', $DATA['DonorTel'])) {
                    $this->errors['DonorTel'] = "Phone No is not correct";
               } else if (strlen($DATA['DonorTel']) != 10) {
                    $this->errors['DonorTel'] = "Phone No is not correct";
               }
          }

          // Check the donor email
          if (isset($DATA['DonorEmail'])) {
               $email = filter_var($DATA['DonorEmail'], FILTER_SANITIZE_EMAIL);

               // Validate email address
               if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $this->errors['DonorEmail'] = "Email is not correct";
               }
          }




          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }


     public function EditBookValidation($DATA)
     {

          $this->errors = array();

          // Check for title
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Title'])) {
               $this->errors['Title'] = "Title is not correct";
          }

          //Check for ISBN
          if (!is_numeric($DATA['ISBN']) || strlen((string)$DATA['ISBN']) != 13) {

               $this->errors['ISBN'] = "ISBN is not correct";
          }

          //Check for author
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['AuthorName'])) {
               $this->errors['AuthorName'] = "Author name is not correct";
          }



          //Check for edition
          if (!preg_match('/^[0-9]+$/', $DATA['Edition'])) {
               $this->errors['Edition'] = "Only numbers allowed";
          }

          //check for publisher
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Publisher'])) {
               $this->errors['Publisher'] = "Publisher name is not correct";
          }

          //publish year
          if (!(preg_match('/^[0-9]*$/', $DATA['PublishedYear'])) || strlen(strval($DATA['PublishedYear'])) != 4) {
               $this->errors['PublishedYear'] = "Published year is not correct";
          }

          //check for number of pages
          if (!preg_match('/^[0-9]*$/', $DATA['NoPages'])) {
               $this->errors['NoPages'] = "No Pages Should be numbers";
          }
          if ($DATA['NoPages'] < 1) {
               $this->errors['NoPages'] = "No Pages can not be negative";
          }

          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }

     public function opacvalidate($DATA)
     {

          $this->errors = array();

          // Check for title
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Title'])) {
               $this->errors['Title'] = "Only letters and white space are allowed";
          }


          //author
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Author'])) {
               $this->errors['Author'] = "Only letters and white space are allowed";
          }

          //subject
          if (!preg_match('/^[a-zA-Z-, ]*$/', $DATA['Subject'])) {
               $this->errors['Subject'] = "Only letters and white space are allowed";
          }


          //Check for ISBN1

          if (!empty($DATA['ISBN1'])) {

               $book = new Book();
               $data = $book->findAll();
               $flag = 0;
               for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]->ISBN == $DATA['ISBN1']) {
                         $flag = 1;
                    }
               }
               if ($flag == 0) {
                    $this->errors['ISBN1'] = "Incorrect ISBN.";
               }
          }




          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }

     //kasun
     public function searchBookValidation($DATA)
     {

          $this->errors = array();




          //Check for ISBN
          if ($DATA['bookSearch'] == 'ISBN') {
               if (!is_numeric($DATA['searchValue']) || strlen((string)$DATA['searchValue']) != 13) {
                    $this->errors['searchValue'] = "ISBN is not correct";
               }
          }




          // Check bookid is correct
          $book = new Book();
          $copy = new BookCopy();

          if (substr($DATA['searchValue'], 0, 1) == "B") {

               if (!$book->where('BookID', substr($DATA['searchValue'], 1,))) {

                    $this->errors['searchValue'] = "This book does not exists.";
               }
          } else if ((substr($DATA['searchValue'], 0, 1) == "C")) {
               if (!$copy->where('CopyID', substr($DATA['searchValue'], 1,))) {

                    $this->errors['searchValue'] = "This book does not exists.";
               }
          } else {
               $this->errors['searchValue'] = "This book does not exists.";
          }








          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }

     //kasun
     public function UserValidation($DATA)
     {

          $this->errors = array();

          // Check for registration No
          $user = new User();

          if (!$user->where('RegistrationNo', $DATA['userID'])) {
               $this->errors['userID'] = "Registration Number does not exists.";
          }

          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }
     //validate the locatebook
     public function LocateBookValidation($DATA, $id, $size)
     {

          $this->errors = array();

          // Check isbn is correct
          $book = new Book();
          $copyBook = new BookCopy();
          $issueBook = new IssueBook();
          $reserve = new ReserveBook();
          $configuration = new Configuration();

          $accessNo = $DATA;
          $code = $accessNo[0];

          // check given access no is belong to the main book
          if ($code == 'B') {
               $bookID = substr($accessNo, 1);

               if (!$book->where('BookID', $bookID)) {

                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               }
          }

          if ($code == 'C') {
               // get the first charactor
               $copyID = substr($accessNo, 1);

               if (is_numeric($copyID)) {
                    $query = "SELECT  `BookID` FROM `bookcopy` WHERE CopyID = $copyID";
                    $bID = $copyBook->query($query);
                    $bookID = $bID[0]->BookID;
               } else {
                    $bookID = Null;
                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists ! ";
               }
               if (!$copyBook->where('CopyID', $copyID)) {

                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               }
          }

          if ($code != 'C' && $code != "B") {
               $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
          }

          // check given access no is belong to the copy of book


          // check given book have reservation
          if ($reserve->where('BookID', $bookID)) {
               $row = $book->query("SELECT `AvailableCopies` FROM `book` WHERE BookID = $bookID");
               if ($row[0]->AvailableCopies == 0) {
                    $bookName = $book->query("SELECT `Title` FROM `book` WHERE BookID = $bookID");
                    $this->errors['Reserve'] = "Sorry, you cannot issue <span style='font-weight: 700;'> " . $bookName[0]->Title . "</span> because it has been reserved by another user!";
               }
          }

          // check how many books get the previously.
          $query1 = "SELECT * FROM `configuration` WHERE ID=1 ";
          $con = $configuration->query($query1);
          $query = "SELECT COUNT(*) AS nobooks FROM `issuebook` WHERE UserID=" . $id." AND ReturnStatus=0 ";
          $no = $issueBook->query($query);

          if (get_PatronType('UserID', $id) == 'Student') {
               if ($no[0]->nobooks == $con[0]->NoOfBooksAC) {
                    $this->errors['ISBN'] = "Already got maximum no of books! ";
               } else {
                    if (($no[0]->nobooks + $size) > $con[0]->NoOfBooksAC) {
                         $this->errors['ISBN'] = "Only can get" . $con[0]->NoOfBooksAC - $no[0]->nobooks . " book/s! ";
                    }
               }
          } else if (get_PatronType('UserID', $id) == 'Lecturer') {
               $lecture = new Lecturer();
               $row = $lecture->where('UserID', $id);
               if ($row[0]->LecType == 'Permanent Lecture') {
                    if ($no[0]->nobooks  == $con[0]->NoOfBooksPL) {
                         $this->errors['ISBN'] = "Already got maximum no of books! ";
                    } else {
                         if (($no[0]->nobooks + $size) > $con[0]->NoOfBooksPL) {
                              $this->errors['ISBN'] = "Only can get " . $con[0]->NoOfBooksPL - $no[0]->nobooks . " book/s! ";
                         }
                    }
               } else {
                    if ($no[0]->nobooks == $con[0]->NoOfBooksAC) {
                         $this->errors['ISBN'] = "Already got maximum no of books! ";
                    } else {
                         if (($no[0]->nobooks + $size) > $con[0]->NoOfBooksAC) {
                              $this->errors['ISBN'] = "Only can get" . $con[0]->NoOfBooksAC - $no[0]->nobooks . " book/s! ";
                         }
                    }
               }
          } else {
               if ($no[0]->nobooks  == $con[0]->NoOfBooksNONAC) {
                    $this->errors['ISBN'] = "Already got maximum no of books! ";
               } else {
                    if (($no[0]->nobooks + $size) > $con[0]->NoOfBooksNONAC) {
                         $this->errors['ISBN'] = "Only can get" . $con[0]->NoOfBooksNONAC - $no[0]->nobooks . " book/s! ";
                    }
               }
          }

          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }

     //validate the locatebook
     public function renewBookValidation($DATA, $id)
     {

          $this->errors = array();

          // Check isbn is correct
          $book = new Book();
          $reserve = new ReserveBook();
          $issueBook = new IssueBook();
          $copyBook = new BookCopy();
          $user = new User();
          $BID = 0;


          // $bookID = get_bookid('ISBN',$DATA);
          $userID = get_patronID('RegistrationNo', $id);

          $accessNo = $DATA;
          $code = $accessNo[0];


          if ($code == 'B') {
               $bookID = substr($accessNo, 1);

               if (!$book->where('BookID', $bookID)) {

                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               } else {
                    $BID = $bookID;
               }
          }

          if ($code == 'C') {
               // get the first charactor
               $copyID = substr($accessNo, 1);


               if (!$issueBook->whereColTwo('BookID', $copyID, 'UserID', $userID)) {
                    $this->errors['ISBN'] = "Book is not issued! ";
               }



               if (!$copyBook->where('CopyID', $copyID)) {

                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               } else {
                    $query = "SELECT  `BookID` FROM `bookcopy` WHERE CopyID = $copyID";
                    $bID = $copyBook->query($query);
                    $bookID = $bID[0]->BookID;
               }
          }
          if ($code != 'C' && $code != "B") {
               $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
          }




          if ($bookID != 'None' && $userID != 'None' && is_numeric($bookID)) {
               $query = "SELECT `ReturnStatus` FROM `issuebook` WHERE BookID = $bookID AND UserID=$id GROUP BY IssueKey;";
               $rows = $issueBook->query($query);
               if (!empty($rows)) {
                    if ($rows[0]->ReturnStatus == 1) {

                         $this->errors['ISBN'] = "Book is already returned! ";
                    }
               }
          }




          if (!$user->where('RegistrationNo', $id)) {
               $this->errors['ISBN'] = "User is not legitimate user! ";
          }

          if ($reserve->where('BookID', get_bookid('ISBN', $DATA))) {
               $row = $book->query("SELECT `AvailableCopies` FROM `book` WHERE ISBN = $DATA");
               if ($row[0]->AvailableCopies == 0) {
                    $bookName = $book->query("SELECT `Title` FROM `book` WHERE ISBN = $DATA");
                    $this->errors['Reserve'] = "Sorry, you cannot renew <span style='font-weight: 700;'>" . $bookName[0]->Title . "</span> because it has been reserved by another user.";
               }
          }


          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }
     //validate the return book validation
     public function returnBookValidation($DATA, $id)
     {

          $this->errors = array();

          // Check isbn is correct
          $issueBook = new IssueBook();
          $copyBook = new BookCopy();
          $book = new Book();

          // helllo


          // $bookID = get_bookid('ISBN',$DATA);

          // get first charactor of access no
          $accessNo = $DATA;
          $code = $accessNo[0];

          


          if ($code == 'B') {
               $bookID = substr($accessNo, 1);

               if (!$book->where('BookID', $bookID)) {
                    
                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               }
          }


               if ($code == 'C') {
                    // get the first charactor
                    $copyID = substr($accessNo, 1);

                    
                    if (!$issueBook->whereColTwo('BookID', $copyID, 'UserID', $id)) {
                         $this->errors['ISBN'] = "Book is not issued! ";
                    }


                    if (!$copyBook->where('CopyID', $copyID)) {

                         $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
                    } else {
                         $bookID = $copyID;
                    }
               }

               if ($code != 'C' && $code != "B") {
                    $this->errors['ISBN'] = 'Access No, ' . $DATA . " does not exists! ";
               }


               if ($bookID != 'None' && $id != 'None' && is_numeric($bookID)) {

                    $query = "SELECT `ReturnStatus` FROM `issuebook` WHERE BookID = $bookID AND UserID=$id GROUP BY IssueKey; ";
                    $rows = $issueBook->query($query);
                    if (!empty($rows)) {
                         if ($rows[0]->ReturnStatus == 1) {

                              $this->errors['ISBN'] = "Book is already returned! ";
                              
                         }
                    }
               }


               if (count($this->errors) == 0) {
                    return true;
               }

               return false;
          
     }

     // return book user validation
     //validate the return book validation
     public function returnBookUserValidation($id)
     {

          $this->errors = array();

          // Check isbn is correct
          $user = new User();


          if (!$user->where('RegistrationNo', $id)) {
               $this->errors['ISBN'] = "User is not legitimate user! ";
          }


          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }

     public function checkbookValidation($DATA)
     {

          $this->errors = array();

          // Check bookid is correct
          $book = new Book();
          $copy = new BookCopy();

          if (substr($DATA['Title'], 0, 1) == "B") {

               if (!$book->where('BookID', substr($DATA['Title'], 1,))) {

                    $this->errors['Title'] = "This book does not exists.";
               }
          } else if ((substr($DATA['Title'], 0, 1) == "C")) {
               if (!$copy->where('CopyID', substr($DATA['Title'], 1,))) {

                    $this->errors['Title'] = "This book does not exists.";
               }
          } else {
               $this->errors['Title'] = "This book does not exists.";
          }


          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }
     public function sendMailValidation()
     {

          $this->errors = array();
          $book = new Book();
          $quary = "SELECT * FROM `requestbooks` WHERE mailStatus=0;";
          $rows = $book->query($quary);
          // Check bookid is correct

          if (!$rows) {

               $this->errors['empty'] = "List is Empty";
          }

          if (count($this->errors) == 0) {
               return true;
          }

          return false;
     }
}

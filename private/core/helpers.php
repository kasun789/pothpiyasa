<?php

//Return user fill and submitted values
//$default is used for getting values form database
function get_var($key, $default = "")
{

    if (isset($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;

}

//For selecting input fields
function get_select($key, $value, $default = "")
{
    if (isset($_POST[$key])) {
        if ($_POST[$key] == $value) {
            return "selected";
        }
    }

    if ($default == $value) {
        return "selected";

    }

    return "";

}

//Escape harmful code
function esc($var)
{
    return htmlspecialchars($var);

}

function random_string($length)
{
    $number = "";

    for ($x = 0; $x < $length; $x++) {

        $random = rand(0, 9);
        $number .= $random;
    }

    return $number;
}

function min_year()
{
    $currentDate = date("Y-m-d");


    return date("Y-m-d", strtotime("-75 years", strtotime($currentDate)));



}

function max_year()
{
    $currentDate = date("Y-m-d");


    return date("Y-m-d", strtotime("-20 years", strtotime($currentDate)));


}

//This function return the date like, 15th Aug, 2022
function get_date($date)
{
    return date("jS M, Y", strtotime($date));
}

//When give the 
function get_user_name($key, $value)
{
    $user = new User();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        return $row->FirstName . " " . $row->LastName;
    } else {
        return "None";
    }
}

function get_userImage($key,$value)
{
    $user = new User();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        return $row->Image;
    }else{
        return "None";
    }
}

//Sandali
function get_staff_name($key, $value)
{
    $user = new LibraryStaff();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        $value1 = $row->UserID;
        //return $value1;

        $member = new User();
        if ($row1 = $member->where('UserID', $value1)) {
            $row1 = $row1[0];
            return $row1->FirstName . " " . $row1->LastName;

        }

    } else {
        return "None";
    }
}

function get_staffid($key, $value)
{
    $user = new LibraryStaff();

    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        return $row->StaffID;

    } else {
        return "None";
    }
}


function get_bookid($key, $value)
{
    $book = new Book();
    if ($row = $book->where($key, $value)) {
        $row = $row[0];
        return $row->BookID;

    } else {
        return "None";
    }
}

function get_originalBookID($key, $value)
{
    $bookcopy = new BookCopy();
    if ($row = $bookcopy->where($key, $value)) {
        $row = $row[0];
        return $row->BookID;

    } else {
        return "None";
    }
}


function viewbooksforauthor($authorID)
{

    $book = new Book();
    $data = $book->where("AuthorID", $authorID);
    return $data;
}

//get category name
function get_BookCategory($key, $data)
{

    $category = new BookCategory();
    $data = $category->where($key, $data);
    //print_r($data);
    return $data[0]->Name;


}

//pattron attribute name
function get_PatronCategory($key, $data)
{

    $category = new PatronCategory();
    $data = $category->where($key, $data);
    //print_r($data);
    return $data[0]->Name;


}


//get rack id

// //get category id

// function get_categoryID($key,$data){
//     $category = new BookCategory();
//     if($row = $category->where($key,$data)){
//         return $row[0]->CategoryID;
//     }
//     else{
//         return "None";
//     }
// }


function lost(){
    $book1 = new Book();
    $data = $book1->findAll();

   // print_r($data);
    if($data){
        foreach ($data as $row):

          if($row->InventoryStatus==0){
            $bookData['InventoryCondition']="Lost";
            $book1->update('BookID',$row->BookID, $bookData);

          }
        endforeach;

        
    }


    $copy = new BookCopy();
    $data2 = $copy->findAll();

   // print_r($data);
    if($data2){
        foreach ($data2 as $row):

          if($row->InventoryStatus==0){
            $bookData['InventoryCondition']="Lost";
            $copy->update('CopyID',$row->CopyID, $bookData);

          }
        endforeach;

        
    }
}

function returnedOrNot($id="null",$bookID="null",$code){

    $book=new IssueBook();
    $data = $book->whereColTwo('UserID', $id, 'BookID',$bookID);
   foreach($data as $row){
    if($row->Code==$code){
        if ($data[0]->ReturnStatus==0) {
    
            return "Not Returned";
        } else {
            return $data[0]->ReturnDate;
        }
    }

   }
    
    

}

function display_categories()
{
    $category = new BookCategory();
    $data = $category->findAll();

    return $data;

}

function get_bookname($key, $data, $data1)
{
  if($data1=='B'){
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->Title;
    } else {
        return "None";
    }
  }elseif($data1=='C'){
    $book = new BookCopy();
    if ($row = $book->where('CopyID', $data)) {
        $key1= $row[0]->BookID;

        $book = new Book();
        if ($row1 = $book->where($key, $key1)) {
            return $row1[0]->Title;
        } else {
            return "None";
        }

    } else {
        return "None";
    }

  }

    
}

function get_booknameReport($key, $data)
{
  
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->Title;
    } else {
        return "None";
    }
  
  

}

//get ISBN of a book
function get_ISBN($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->ISBN;
    } else {
        return "None";
    }

}


function BookIDISBN($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->BookID;
    } else {
        return "None";
    }

}
//CAST( GETDATE() AS Date )

//get date
function get_rdate($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->ISBN;
    } else {
        return "None";
    }

}

//get book image
function get_bookImg($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->Image;
    } else {
        return "None";
    }

}

//get fine amount for an user
//get fine amount for an user
function get_returnDate($key1, $data1, $data2, $data3)
{
    $book = new IssueBook();
    if ($rows = $book->whereColTwo($key1, $data1,'Code',$data3)) {
        $flag = 0;

        foreach ($rows as $row) {

            if ($row->ReturnStatus==1 && $row->BookID==$data2)  {
               
                $flag = 1;
                return $row->ReturnDate;
            }


        }
        if ($flag == 0) {
            return "Not Returned";
        }

    } else {
        return "None";
    }

}

function get_fine($key1, $data1, $data2,$data3)
{
    $book = new IssueBook();
    if ($rows = $book->whereColTwo($key1, $data1,'Code',$data3)) {
        $flag = 0;


        foreach ($rows as $row) {

            if (($row->BookID == $data2) && ($row->FineStatus == 1)) {
                $flag = 1;
                return $row->FineAmount;
            }
            else if (($row->BookID == $data2) && ($row->FineStatus == 0)) {
                if($row->FineAmount!=0.00){
                    $flag = 1;
                    return $row->FineAmount;
                }
                else{
                    return "No Fine";

                }
            //    
                
             }



        }
       
       

    } else {
        return "None";
    }




}


//fine for a book
function get_fine_for_book($key1, $data1,$code)
{
    $book = new IssueBook();
    if ($rows = $book->whereColTwo($key1, $data1,'Code',$code)) {
        $flag = 0;

        foreach ($rows as $row) {
            if  ($row->FineStatus == 1) {
                $flag = 1;
                return $row->FineAmount;
            }


        }
        if ($flag == 0) {
            return "No Fine";
        }

    } else {
        return "None";
    }




}
// kasun
// get new added book
function New_book_added(){

    $book = new Book();
    $query = "SELECT `Code`, `BookID` FROM `book` GROUP BY BookID DESC LIMIT 1; ";
    $rows =$book->query($query);
    $accessNo=$rows[0]->Code.$rows[0]->BookID;

    return $accessNo;
}

// kasun
// get new added book copy
function New_copy_book_added($no){
    
    $bookcopy = new BookCopy();
    $accessNo = array();

    $query = "SELECT `Code`, `CopyID` FROM `bookcopy` GROUP BY CopyID DESC Limit 1 ";

    $rows =$bookcopy->query($query);
    $row=$rows[0];
    
    $r1 =$row->CopyID - ($no-1);
    $accessNo=$row->Code.$r1.' - '.$row->Code.$row->CopyID;
    return $accessNo;
}


function get_newarrivals()
{
    $book = new Book();
    if ($rows = $book->last("BookID", 8)) {
        return $rows;
    } else {
        return "None";
    }
}


function get_FineDetails($key,$data){
    $category = new IssueBook();
    if($rows = $category->whereColTwo($key,$data,'ReturnStatus',0)){
        return $rows;
        // print_r($rows);
    }
    else{
        return "None";
    }
}



//kasun



//get userID
function get_userID($key, $data)
{
    $staff = new LibraryStaff();
    if ($row = $staff->where($key, $data)) {
        return $row[0]->StaffID;
    } else {
        return "None";
    }
}



//get authorID
function get_authorID($key, $data)
{
    $author = new Author();
    if ($row = $author->where($key, $data)) {
        return $row[0]->AuthorID;
    } else {
        return "None";
    }
}

//get authorName
function get_authorName($key, $data)
{
    $author = new Author();
    if ($row = $author->where($key, $data)) {
        return $row[0]->Name;
    } else {
        return "None";
    }
}

//get Vendor Name
function get_VendorName($key, $data)
{
    $vendor = new Vendor();
    if ($row = $vendor->where($key, $data)) {
        return $row[0]->Name;
    } else {
        return "None";
    }
}

//get donor Name
function get_DonorName($key, $data)
{
    $donor = new Donor();
    if ($row = $donor->where($key, $data)) {
        return $row[0]->Name;
    } else {
        return "None";
    }
}

//get staff Name
function get_StaffName($key, $data)
{
    $staff = new LibraryStaff();
    if ($row = $staff->where($key, $data)) {
        $userID = $row[0]->UserID;
    }
    $user = new User();
    if ($row2 = $user->where("UserID", $userID)) {
        return $row2[0]->FirstName . " " . $row2[0]->LastName;
    } else {
        return "None";
    }
}

//get category name
function get_CategoryName($key, $data)
{
    $category = new BookCategory();
    if ($row = $category->where($key, $data)) {
        return $row[0]->Name;
    } else {
        return "None";
    }
}


//get patron category name
function get_PatronCategoryName($key, $data)
{
    $category = new PatronCategory();
    if ($row = $category->where($key, $data)) {
        return $row[0]->Name;
    } else {
        return "None";
    }
}


//get category id
function get_categoryID($key, $data)
{
    $category = new BookCategory();
    if ($row = $category->where($key, $data)) {
        return $row[0]->CategoryID;
    } else {
        return "None";
    }
}

// get delete url
// function set_DeleteUrl($link){
//     $GLOBALS['deleteLink'] = $link;
// }

// function get_DeleteUrl(){
//     return $GLOBALS['deleteLink'];
// }


function get_selectedVendorDonorName($vendorID, $donorID)
{
    if (!empty($vendorID)) {
        $vendor = new Vendor();
        if ($row = $vendor->where("VendorID", $vendorID)) {
            return $row[0]->Name;
        } else {
            return "None";
        }
    } else if (!empty($donorID)) {
        $donor = new Donor();
        if ($row = $donor->where("DonorID", $donorID)) {
            return $row[0]->Name;
        } else {
            return "None";
        }
    }
}

//select default button clicked
function select_redioButton($value)
{

    if (!empty($value)) {
        return "checked";
    }
    return "";

}
//get donor ID
function get_DonorID($key, $data)
{
    $donor = new Donor();
    if ($row = $donor->where($key, $data)) {
        return $row[0]->DonorID;
    } else {
        return "None";
    }
}

//get Vendor ID
function get_VendorID($key, $data)
{
    $vendor = new Vendor();
    if ($row = $vendor->where($key, $data)) {
        return $row[0]->VendorID;
    } else {
        return "None";
    }
}

//kasun
function get_patronID($key, $data)
{
    $user = new User();
    if ($row = $user->where($key, $data)) {
        return $row[0]->UserID;
    } else {
        return "None";
    }
}

//kasun
function get_NIC($key, $data)
{
    $user = new User();
    if ($row = $user->where($key, $data)) {
        return $row[0]->NIC;
    } else {
        return "None";
    }
}
function get_registrationNo($key, $data)
{
    $user = new User();
    if ($row = $user->where($key, $data)) {
        return $row[0]->RegistrationNo;
    } else {
        return "None";
    }
}
//kasun
function get_BookTitle($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->Title;
    } else {
        return "None";
    }
}
//kasun
function get_BookImage($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return $row[0]->Image;
    } else {
        return "None";
    }
}
//
//kasun
function get_bookCount($key, $data)
{
    $book = new Book();
    if ($row = $book->where($key, $data)) {
        return sizeof($row);
    } else {
        return 0;
    }
}

//kasun
function get_book_copy_Count($key, $data)
{
    $bookcopy = new BookCopy();
    if ($row = $bookcopy->where($key, $data)) {
        return sizeof($row);
    } else {
        return 0;
    }
}

//kasun
// set the count of issue books
function get_issueBookStatus($key, $data)
{
    $book = new Book();
    $issue = new IssueBook();
    $count = 0;

    if ($row = $book->where($key, $data)) {
        for ($i = 0; $i < sizeof($row); $i++) {
            if ($r = $issue->where('BookID', $row[$i]->BookID)) {
                for ($i = 0; $i < sizeof($r); $i++) {
                    if ($r[$i]->ReturnStatus == 0) {
                        $count = $count + 1;
                    }
                }

            }

        }
        return $count;
    } else {
        return $count;
    }


}

//kasun
// set the count of issue books
function get_TWBooks($key, $data)
{
    $book = new Book();
    $count = 0;

    if ($row = $book->where($key, $data)) {
        for ($i = 0; $i < sizeof($row); $i++) {
            if ($row[$i]->InventoryCondition == 'T-Withdrawn') {
                $count = $count + 1;
            }
        }
    }

    return $count;

}


//kasun
// set the count of issue books
function get_CountTWBooks($key, $data)
{
    $book = new Book();


    if ($row = $book->where($key, $data)) {
        return sizeof($row);
    }

    return 0;

}

//kasun
// set the count of issue books
function get_JobType($key, $data)
{
    $user = new User();
    if ($row = $user->where($key, $data)) {
        return $row[0]->JobType;

    }

    return 'none';

}

//kasun
// get issue id
function get_IssueID($key1, $data1, $key2, $data2)
{
    $issueBook = new IssueBook();
    if ($row = $issueBook->whereTwoOption($key1, $data1, $key2, $data2)) {
        return $row[0]->IssueKey;

    }

    return 'none';

}

//kasun
// get who the user
function get_PatronType($key, $data)
{
    $user = new User();
    $row = $user->where($key,$data);

    return $row[0]->Type;

}

//get users adding date individual
function get_userAddingDates()
{
    $users = new User();
    $query = "SELECT `UserID`, `AddDate` FROM `user` GROUP BY AddDate";
    $row = $users->query($query);
    $addingDate = array();
    $count = 0;
    $temp = array();
    $m = 0;
    
    
    for ($i = 0; $i < sizeof($row); $i++) {
        $date = new DateTime($row[$i]->AddDate);
        $formattedDate = $date->format("Y-m-d");
        if (!in_array($formattedDate, $temp)) {
            $temp[$m] = $formattedDate;
            $m = $m + 1;
        }
    }

    for ($j = 0; $j < sizeof($temp); $j++) {
        $count = 0;
        for ($x = 0; $x < sizeof($row); $x++) {
            $date2 = new DateTime($row[$x]->AddDate);
            $formattedDate2 = $date2->format("Y-m-d");
            if ($temp[$j] == $formattedDate2) {

                $count = $count + 1;

            }


        }
        $addingDate[$temp[$j]] = $count;
        


    }

    
    return $addingDate;
}

//get users adding date
function get_usersAddingDate()
{
    $users = new User();
    $query = "SELECT `UserID`, `AddDate` FROM `user` GROUP BY AddDate";
    $row = $users->query($query);
    $addingDates = array();


    for ($i = 0; $i < sizeof($row); $i++) {
        $date = new DateTime($row[$i]->AddDate);
        $formattedDate = $date->format("Y-m-d");
        $addingDates[$i] = $formattedDate;


    }
    return $addingDates;
}

//get users adding date individual
function get_bookAddingDate()
{
    $books = new Book();
    $row = $books->findAll();
    $addingDate = array();
    $count = 0;
    $temp = array();
    $m = 0;

    for ($i = 0; $i < sizeof($row); $i++) {
        $date = new DateTime($row[$i]->AddDate);
        $formattedDate = $date->format("Y-m-d");
        if (!in_array($formattedDate, $temp)) {
            $temp[$m] = $formattedDate;
            $m = $m + 1;
        }
    }
    for ($j = 0; $j < sizeof($temp); $j++) {
        $count = 0;
        for ($x = 0; $x < sizeof($row); $x++) {
            $date2 = new DateTime($row[$x]->AddDate);
            $formattedDate2 = $date2->format("Y-m-d");

            if ($temp[$j] == $formattedDate2) {

                $count = $count + 1;

            }


        }
        $addingDate[$temp[$j]] = $count;


    }


    return $addingDate;
}

//get users adding date
function get_booksAddingDate()
{
    $books = new Book();
    $row = $books->findAll();
    $addingDates = array();


    for ($i = 0; $i < sizeof($row); $i++) {
        $date = new DateTime($row[$i]->AddDate);
        $formattedDate = $date->format("Y-m-d");
        $addingDates[$i] = $formattedDate;


    }
    return $addingDates;
}

//Log events
function record_Events($id,$event)
{
    //$id - id of user
    //$event - event that user done in the system

    $eventLog = new EventLog();
    $user = new User();

    $row = $user->where("UserID", $id);
    $row = $row[0];

    $eventData['UserID'] = $id;
    $eventData['UserName'] = $row->FirstName . " " . $row->LastName;
    $eventData['Event'] = $event;
    if($row->MemberType =="Library-StaffMember"){
        $eventData['MemberType'] = $row->JobType;
    }else{
        $eventData['MemberType'] = $row->Type;
    }


    $eventLog->insert($eventData);
    

}

//Online users

function add_online_user(){

    $onlineuser = new OnlineUser;

    $onlineuserData['UserID'] = Auth::profileID();
    $onlineuserData['UserName'] = Auth::profileName();

    $onlineuser->insert($onlineuserData);

}

function delete_online_user($id){

    $onlineuser = new OnlineUser;


    $onlineuser->delete('UserID',$id);

}


function pagination_finder($totalRows,$rows_per_page,$page_number){
    
    $page_numbers = array();

    //First page
    $page_numbers['first_page_no'] = 1;

    //Last page
    $last_page_no = ceil($totalRows/$rows_per_page);
    $page_numbers['last_page_no'] = $last_page_no;

    //Next page
    if($page_number >=$last_page_no ){
        $page_numbers['next_page_no'] = NULL;

    }else{
        $next_page_no = $page_number+1;
        $page_numbers['next_page_no'] = $next_page_no;
    }

    //previous page
    if($page_number <=1 ){
        $page_numbers['previous_page_no'] = NULL;

    }else{
        $previous_page_no = $page_number-1;
        $page_numbers['previous_page_no'] = $previous_page_no;
    }

    //Current page
    $page_numbers['current_page_no'] = $page_number;

    return $page_numbers;

}
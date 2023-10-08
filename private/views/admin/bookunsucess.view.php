<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/user/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <!-- <link rel="stylesheet" href="<?=ROOT?>/css/librarian/viewBook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/addBook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/editBook.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/viewViewBook.css">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css"> -->
    <!-- <link rel="stylesheet" href="<?=ROOT?>/css/librarian/includes/popreserve.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/includes/popup.reservationsucess.css"> 
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>
<body>
        <div class="header">
            <p class="operation">View Book</p>
            <?php include('../private/views/librarian/includes/header.view.php'); ?>


    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        

    
        <!-- navigation bar-->
        <?php include('../private/views/includes/nav.view.php'); ?>
  
        
        <div class="bodyContainer01">
 

        <?php if($row):?>

        <img src="<?= ROOT ?>/uploads/<?=$row[0]->Image?>" alt="" srcset="" class="imageProfile" id="imageProfile">
        <!-- <img src="image/profile.jpg" alt="" class="imageProfile"> -->
        <div class="bookInfo"><label for="bookfomation" class="info">Book Info</label></div>
        
            <table id="bookInfoTable">
                
                    <tr >
                        <td id="titleBookInfo">Title</td>
                        <td id="valueBookInfo"><?= $row[0]->Title;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">ISBN</td>
                        <td id="valueBookInfo"><?= $row[0]->ISBN;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Author Name</td>
                        <td id="valueBookInfo"><?= $row[0]->AuthorName;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Edition</td>
                        <td id="valueBookInfo"><?= $row[0]->Edition;?> Edition</td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Language</td>
                        <td id="valueBookInfo"><?= $row[0]->Language;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Publisher</td>
                        <td id="valueBookInfo"><?= $row[0]->Publisher;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Published Year</td>
                        <td id="valueBookInfo"><?= $row[0]->PublishedYear;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Category Name</td>
                        <td id="valueBookInfo"><?= get_CategoryName("CategoryID",$row[0]->Category);?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">No of Pages</td>
                        <td id="valueBookInfo"><?= $row[0]->NoPages;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">No of Available Copies</td>
                        <td id="valueBookInfo"><?= $row[0]->AvailableCopies;?></td>
                    </tr>
                

            </table>
            
                <?php
                  $rusers = new ReserveBook();
                  $data = $rusers->where("BookID", $row[0]->BookID);

                
                
                
                ?>
            
            <div class="containerBookInfo"> 
                <p class="ReservedListBookInfo">Reserved List</p> 
                <table class="reservationlistdetails">


                <?php 
                if($data):
                    foreach ($data as $row1):  ?>
                        
                        <tr>


                        <td><img src="<?= ROOT?>/uploads/<?=get_userImage("UserID",$row1->UserID)?>" alt="" srcset="" class="profileImg1" id="profileImg1"></td>

                        <td><?=get_user_name("UserID",$row1->UserID);?></td>

                        <td><?=$row1->ReservedDate;?></td>  
                        
                        
                    </tr>

                    
                                
                        
                                
                    <?php endforeach?>

                    <?php else: ?>
                        <div class="result_notfound_container1">
                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png1">
                        <br>
                        <h4 class="No_result1">No Reservations</h4>
                       
                </div>
   
                     
                             
                 <?php endif;?>
                </table>
            </div>
            
            
           
        </div>

        

        <button class="reserve"><a href='<?=ROOT?>/users/reservebook/<?=$row[0]->BookID?>/<?=Auth::profileID()?>'>Reserve</a></button>

        
        

        <button class="backbtnBookInfo"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>
       
       <?php endif;?>
                
    </div>



<?php include('../private/views/user/includes/popup.reservationunsuccess.view.php'); ?>


<script type="text/javascript"> var reservebookid= '<?=$reservebookid?>';</script>

</body>

<!-- Footer -->

<script src="<?=ROOT?>/js/user/popupUnsuccessReserve.js"></script>
<script src="<?=ROOT?>/js/librarian/nav.js"></script>
<script src="<?=ROOT?>/js/includes/calendar.js"></script>
<script src="<?=ROOT?>/js/librarian/bookAdd.js"></script>
<script src="<?=ROOT?>/js/librarian/bookEdit.js"></script>
<script src="<?=ROOT?>/js/librarian/bookView.js"></script>
<script src="<?=ROOT?>/js/includes/popupAuthor.js"></script>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/includes/editProfile.js"></script>
<script src="<?=ROOT?>/js/librarian/issueBook.js"></script>
<script src="<?=ROOT?>/js/librarian/locateBook.js"></script>
<script src="<?=ROOT?>/js/librarian/inventory.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>
<!-- <script src="<?=ROOT?>/js/librarian/addUser.js"></script> -->
<script src="<?=ROOT?>/js/librarian/addUser.js"></script>
<!-- <script src="<?=ROOT?>/js/librarian/addBookCategory.js"></script> -->
<script src="<?=ROOT?>/js/librarian/addlcategory.js"></script>
<script src="<?=ROOT?>/js/includes/notification.js"></script>
<script src="<?=ROOT?>/js/user/popupReserve.js"></script>


</html>

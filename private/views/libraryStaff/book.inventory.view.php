<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/checkBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>
    <body>
         <div class="header">
            <p class="operation">Inventory</p>
            <?php include('../private/views/librarian/includes/header.view.php'); ?>
        </div> 
    
        <!-- navigation bar -->
         <?php
           include('../private/views/librarian/includes/nav.view.php'); ?> 
        
        
<!-- notification view -->
      <?php include('../private/views/librarian/includes/notification.view.php'); ?>
    
        <div class="bodyContainer01">

<!-- form -->
<?php

  $id = $_SESSION['id'] ;


  
  if($flags[0]=="B"){
    $book= new Book();
    $row = $book->where('BookID', $id);
    $id= "B".$id;
  }
elseif($flags[0]=="C"){
    $copy= new BookCopy();
    $row = $copy->where('CopyID', $id);
    $id= "C".$id;




}
  

  
?>

<div class="container_book_search" id="container_book_search">
            <h1>Inventory Book Check</h1>
            <h2>Please follow the below instruction for inventory check</h2>

            <div class="inventory_instruction_container">

                <ol>
                    <li>Type Access Number (Ex:B3004/C3004) of the Book as Access Number. Press the Check button.</li>
                    <li>Press the Reset Inventory Button for Reset Current Inventory Data.</li>
                    <span>*First press the Reset Inventory Button before doing an annual inventory process. <br> *You
                        can only reset inventory data once a year.</span>

                </ol>

            </div>

<div class="inventoryform" id="inventoryform">

<form  method="post" enctype="multipart/form-data" class="inventory_add_data_form">

        <label for="condition" class="conditionLabel">Book Condition</label>

        <select id="condition" class="condition" name="condition" required >

            <option <?=get_select('condition','', $row[0]->InventoryCondition ?? "")?> value="" disabled selected >--- Choose Type ---</option>
                            <option <?=get_select('condition','Damaged',$row[0]->InventoryCondition ?? "")?> value="Damaged">Damaged</option>
                            <option <?=get_select('condition','T-Withdrawn',$row[0]->InventoryCondition ?? "")?> value="T-Withdrawn">T-Withdrawn</option>
                            <option <?=get_select('condition','Withdrawn',$row[0]->InventoryCondition ?? "")?> value="Withdrawn">Withdrawn</option>
                            <option <?=get_select('condition','Lost',$row[0]->InventoryCondition ?? "")?> value="Lost">Lost</option>

        
        </select>

            <label for="comment" class="commentLabel">Comment</label>

            <input type="text" name="comment" class="comment" id="comment" value="<?= get_var('comment',$row[0]->Comments) ?>">
    

        <button class="addbookbtn1" id="addbookbtn1" name="submit" type="submit">OK</button>
        <button class="cancelbtn_inventory"><a href="<?=ROOT?>/books/checkbook">Cancel</a></button>
        </form>
       

</div>

</div>

  
    <!-- <img src="<?=ROOT?>/img/requestbook1.png" alt="" srcset="" class="image"> -->
    



</div>
<?php 
include('../private/views/includes/popup.add.view.php');?>    
    
    <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>

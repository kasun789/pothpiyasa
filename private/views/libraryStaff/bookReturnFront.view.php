<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/bookReturnFront.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>
    <body>
         <div class="header">
            <p class="operation">Check Book</p>
            <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div> 
    
        <!-- navigation bar -->
         <?php
          include('../private/views/libraryStaff/includes/nav.view.php'); ?> 
        
        <!-- notification view -->
      <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>
    
        <div class="bodyContainer01">

<!-- form -->
   
<div class="bodyContainer2">

   <button class="returnBook" id="returnBook" name="returnBook"><a href="<?=ROOT?>/books/returnBook">Return Book</a></button>
   <button class="renewBook" id="renewBook" name="renewBook"><a href="<?=ROOT?>/books/renewBook">Renew Book</a></button>
   <img src="<?=ROOT?>/img/image06.png" alt="" srcset="" class="image">
    
</div>


</div>
<?php 
include('../private/views/includes/popup.add.view.php');?>    
    
<?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
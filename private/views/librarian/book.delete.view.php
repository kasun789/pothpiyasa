<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/editBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>

<body>
        <div class="header">
            <p class="operation">Delete Preview</p>
            <?php include('../private/views/librarian/includes/header.view.php'); ?>
        </div> 
    
        <!-- navigation bar-->
       
        <?php 
        include('../private/views/librarian/includes/nav.view.php'); ?>

        <!-- notification view -->
      <?php include('../private/views/librarian/includes/notification.view.php'); ?>
      
    <div class="bodyContainer01" id="bookDeleteContainer">
        <div class="bodyContainerEditBook">
    
    
        </div>
    </div>
        <?php  include('../private/views/includes/popup.delete2.view.php');?> 
    <?php include('../private/views/librarian/includes/footer.view.php'); ?>

    <!-- set the popup msg -->
<?php if($flag[0]==1){
    echo '<script type="text/javascript">openDelete2Popup("'.ROOT.'/books?page=1");</script>';
}?>

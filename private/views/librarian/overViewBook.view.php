<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/overViewBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

   
</head>

<body>
<div class="header">
        <p class="operation">Book Search</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
</div>

<!-- navigation bar -->

<?php 
   include('../private/views/librarian/includes/nav.view.php');
 ?>

 <!-- notification view -->
 <?php include('../private/views/librarian/includes/notification.view.php'); ?>
 
<!-- body -->
<div class="overViewCon1">
<?php if($rows):?>
  <?php 
    // print_r($rows)?>
  <img src="<?= ROOT?>/uploads/<?=$rows[0]->Image?>" class="bookImageBookSearch">
  <table class="bookDetails">
    <tr>
      <td class="heading">Title</td>
      <td class="data"><?= $rows[0]->Title?></td>
    </tr>
    <tr>
      <td class="heading">Author Name</td>
      <td class="data"><?= get_authorName("AuthorID",$rows[0]->AuthorID)?></td>
    </tr>
    <tr>
      <td class="heading">ISBN</td>
      <td class="data"><?= $rows[0]->ISBN?></td>
    </tr>
    <tr>
      <td class="heading">Edition</td>
      <td class="data"><?= $rows[0]->Edition?></td>
    </tr>
    <tr>
      <td class="heading">Category</td>
      <td class="data"><?= get_categoryName("CategoryID",$rows[0]->Category)?></td>
    </tr>
    <tr>
      <td class="heading">Published Year</td>
      <td class="data"><?= $rows[0]->PublishedYear?></td>
    </tr>
   
  </table>
  <?php endif?>

  <div class="resiveredBookDiv">
    <h4 class="headingresivered">Reserved List</h4>
    <hr class="reservedListHR">
    <?php if($rowReservedBook && $users):?>
 
  <table class="ReservedListTable">
    <?php for ($i=0; $i < sizeof($rowReservedBook) ; $i++):?>
    <tr>
      <td ><img src="<?=ROOT?>/Uploads/<?= $users[$i]->Image?>" class="imageUser"></td>
      <td class="UserName"><?= $users[$i]->FirstName." ".$users[$i]->LastName?></td>
      <td class="dateTime"><?= print_r($rowReservedBook[$i]->ReservedDate)?></td>
    </tr>

  </table>
  <?php endfor?>
  <?php else:?>
    <h2>Not Found.</h2>
  <?php endif?>

  </div>
  <button class="backbtn"><a href="<?=ROOT?>/books/searchbook/librarian">Back</a></button>
</div>

<?php include('../private/views/librarian/includes/footer.view.php'); ?>
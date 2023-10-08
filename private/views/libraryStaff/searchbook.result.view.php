<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/viewBookCategory.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/circulation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>

<body>
<div class="header">
        <p class="operation">Book Circulation</p>
        <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
</div>

<!-- navigation bar -->

<?php 
  include('../private/views/libraryStaff/includes/nav.view.php');
 ?>

<!-- notification view -->
<?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>

<!-- body -->


<div class="container_book_search">

  <?php 
  // print_r($rows);
  if(!empty($rows)):
    $i=0;  
    foreach ($rows as $row):
       $getbookid=$row->BookID;
    endforeach
    
    ?>
    <div class="searchResult">
      <p class="parasearch"> BookID : &nbsp<?= $getbookid ;?>   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspBook Name :  <?= get_bookname("BookID", $getbookid,$row->Code) ;?></p>
    </div>
    <div class="table_container">
    <table class="searchBookTable">
    <tr>
    <th>No</th>
    <th>User ID</th>
    <th>User Name</th>
    <th>Issued Date</th>
    <th>Returned Date</th>
    <th>Fine Amount</th>
  </tr>
    <?php
    
    foreach ($rows as $row):
    $i++;
  
    ?>
        
      <tr>


        <td><?= $i;?></td>
        <td><?= $row->UserID?></td>
        <td><?= get_user_name("UserID", $row->UserID)?></td>
        <td><?= $row->IssuedDate?></td>
        <td><?=  returnedOrNot($row->UserID,$row->BookID,$row->Code)?></td>
        <td><?=get_fine_for_book("BookID", $row->BookID,$row->Code)?></td>

      

    <?php endforeach?>
    </table>


    <?php else: ?>
      <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                        <br>
                        <h4 class="No_result">No results found</h4>
                        
                </div>
    <?php endif?>
    </tr>
    <button class="backbtnCirculation"><a href="<?= ROOT ?>/books/circulation">Back</a></button>
  
</div>




<?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
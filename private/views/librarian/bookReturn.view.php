<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/returnBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>
    <body>
         <div class="header">
            <p class="operation">Return Book</p>
            <?php
             include('../private/views/librarian/includes/header.view.php'); ?>
        </div> 
    
        <!-- navigation bar -->
         <?php
          include('../private/views/librarian/includes/nav.view.php'); ?> 

          <!-- notification view -->
      <?php 
      include('../private/views/librarian/includes/notification.view.php'); ?>
        
    
        <div class="bodyContainer01" id="bodyContainer01">

        <!-- form -->
        
        <div class="bodyContainer2" id="bodyContainer2">

        <form  method="post" class="form" id="form">
    <br>
        <label for="locateBook" class="locateBook">Reg No</label>
        <input type="text" name="nic" class="nic" value="<?= get_var('nic') ?>">
        <br>
        <label for="accessNumber" class="accessNumber">Access Number(s) </label>
        <div class="errorMesg" id="errorMesg">
                    <?php if (isset($errors['ISBN'])): ?>
                    <p>
                        <?="*" . $errors['ISBN'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <button id="plus" class="plus" type="button"><i class="fa-sharp fa-solid fa-plus" id="plusIcon"></i>&nbsp;Add Book</button>
        <br>

        <button class="returnBookbtn" id="returnBookbtn" name="returnBookbtn">Accept</button>
    </form>
    <img src="<?=ROOT?>/img/image08.png" alt="" srcset="" class="image">
    
    <button class="backbtn" id="backbtn"><a href="<?=ROOT?>/librariandashboard">Back</a></button>
            
        </div>

        <?php if($fine):?>
  <div class="containerWarning" id="containerWarning">
        <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
        <p class="warnningMsg"><span><?= $fine[0]['userName'] ?></span>, Reg No <span><?= $fine[0]['RegistrationNo'] ?></span> has been checked.<span>Account status:</span>  blocked due to unpaid fines of <span>Rs. <?=$fine['totalFine']?></span> .</p>
        <i class="fa-solid fa-angle-right" id="arrow"></i>
    </div>


    

  </div>

</div>
<div class="containerFine" id="containerFine">
    
        <h3 class="fineStatus"><span><?=$fine[0]['userName']?></span> Fine Status</h3>
        <table class="fineStausTable">
          <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Due Date</th>
                <th>Fine</th>
            </tr>

          </thead>
          <tbody>
            <?php for($i=0;$i<sizeof($fine)-1;$i++):?>
            <tr>
              <td><img src="<?=ROOT?>/uploads/<?=$fine[$i]['Image']?>" alt="" srcset="" class="bookImage"></td>
              <td><span class="bookTitle"><?=$fine[$i]['Title']?></span></td>
              <td><span class="dueDate2"><?=$fine[$i]['DueDate']?></span></td>
              <td><span class="Fine">Rs. <?=$fine[$i]['Fine']?>&nbsp;</span></td>
            </tr>
            <?php endfor?>
            <tr>
              <td colspan="3"class="TotalFine">Total Fine</td>
              <td class="totalFineValue"><span>Rs. <?=$fine['totalFine']?>.00&nbsp;</span></td>
            </tr>
            
          </tbody>
            
        </table>

        <div class="containerAnimation" id="containerAnimation">
        <div class="circle">
            <div class="tickmark">
    
            </div>
        </div>
    </div>
    
    
    <button class="payFine" name="payFine" id="payFine" onclick="openLocateReturnBookPopup(<?php echo $fine[0]['UserID']?>)">Pay Fine</button>
    <button class="okbtn" name="okbtn" id="okbtn" onclick="okbtnFun(<?php echo $fine[0]['UserID']?>)" disabled>OK</button>
    <button class="cancel" name="cancel" id="cancel">Cancel</button>
  </div>

<?php endif?>
        </div>
<?php 
include('../private/views/includes/popup.return.view.php');?> 
<?php include('../private/views/includes/popup.locate.view.php'); ?>   

<!-- Footer -->

</body>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/librarian/returnBook.js"></script>
<script src="<?=ROOT?>/js/librarian/nav.js"></script>
<script src="<?=ROOT?>/js/includes/calendar.js"></script>

<script src="<?=ROOT?>/js/includes/notification.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>

<?php if ($flag[0] == 1) {
        echo '<script type="text/javascript">openReturnViewBookPopup("http://localhost/Pothpiyasa/public/books/returnBook");</script>';
    } ?>

</html>
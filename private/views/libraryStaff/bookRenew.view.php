<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/renewBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>
    <body>
         <div class="header">
            <p class="operation">Renew Book</p>
            <?php 
            include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div> 
    
        <!-- navigation bar -->
         <?php
           include('../private/views/libraryStaff/includes/nav.view.php'); ?> 

          <!-- notification view -->
      <?php 
      include('../private/views/libraryStaff/includes/notification.view.php'); ?>
        
    
        <div class="bodyContainer01" id="renew_book_container">

        <!-- form -->
        
        <div class="bodyContainer2" >

        <form  method="post" class="form" id="form">
    <br>
        <label for="locateBook" class="locateBook">Reg No</label>
        <input type="text" id="nic" name="nic" class="nic" value="<?= get_var('nic') ?>">
        <br>
        <label for="accessNumber" class="accessNumber">Access Number(s) </label>
        <div class="errorMesg" id="errorMesg">
                    <?php if (isset($errors['ISBN'])): ?>
                    <p>
                        <?="*" . $errors['ISBN'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <label for="dueDate" class="dueDateLable">Due Date <br>(Optional)</label>
        <!-- set the minimum and maximum date to the calandar -->
        <?php
          date_default_timezone_set('Asia/Colombo');
          $current_date = date('Y-m-d');
        ?>
        <input type="date" id="dueDate" name="DueDate" class="DueDate" min="<?=$current_date?>">
        <button id="plus" class="plus" type="button"><i class="fa-sharp fa-solid fa-plus" id="plusIcon"></i>&nbsp;Add Book</button>
        <br>

        <button class="returnBookbtn" id="renewbtn" onclick="open_successfull_renew_popup()" name="renew">Renew</button>
    </form>
    <img src="<?=ROOT?>/img/image09.png" alt="" srcset="" class="image">
    <button class="backbtn" id="backbtn"><a href="<?=ROOT?>/books/viewReturnFrontPage">Back</a></button>
            
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
    
    
    <!-- <button class="payFine" name="payFine" id="payFine" onclick="openLocateRenewBookPopup(<?php echo $fine[0]['UserID']?>)">Pay Fine</button> -->
    <button class="Next" name="Next" id="okbtn" onclick="okbtnRenew()" disabled>OK</button>
    <button class="cancel" name="cancel" id="cancel">Cancel</button>
  </div>

<?php endif;?>
        </div>
<?php 
include('../private/views/includes/popup.locate.view.php');?>
<!-- popup -->

<!-- renew popup -->
<?php if(isset($errors['Reserve'])):?>
          <div class="containerWarningRenew" id="containerWarning">
        <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
        <p class="warnningMsg"><?=$errors['Reserve']?>.</p>
        <!-- <i class="fa-solid fa-angle-right" id="arrow"></i> -->
    </div>

<?php endif?>

<!-- <div class="renew_container_popup" id="renew_container_popup">
    <div class="renewPopup" id="renewPopup">
        <img src="<?= ROOT ?>/img/remove.png">
        <h2>Renewal Failed!</h2>
        <p>Sorry, you cannot renew 'book title' because it has been reserved by another user.</p>
        <button type="button" onclick="closePopup()">OK</button>
    </div>
</div> -->


<!-- set the Date -->
<!-- <div class="renew_date_container_popup" id="renew_date_container_popup">
    <div class="renewDatePopup" id="renewDatePopup">
        <img src="<?= ROOT ?>/img/fifteen.png">
        <h2>Select Due Date</h2>
        <p>Due Date</p>
        <input type="date" name="dueDateRenew" id="dueDateRenew" min='<?php echo date("Y-m-d")?>'>
        <button type="button" onclick="closePopup()">OK</button>
    </div>
</div> -->

<?php include('../private/views/includes/popup.renew.successfull.view.php');?> 

   
<!-- Footer -->

</body>
<script src="<?=ROOT?>/js/libraryStaff/nav.js"></script>
<script src="<?=ROOT?>/js/includes/calendar.js"></script>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/libraryStaff/renewBook.js"></script>
<script src="<?=ROOT?>/js/includes/notification.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>


</html>

<!-- renewal successful msg popup-->
<?php 
if($flag){
  if($flag[0]==1)
  echo '<script type="text/javascript">openRenewSuccessPopup("http://localhost/Pothpiyasa/public");</script>';
}

?>
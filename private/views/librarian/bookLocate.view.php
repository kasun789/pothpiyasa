<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/locateBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
   
</head>

<body>
<div class="header">
        <p class="operation">Issue Book</p>
        <?php 
        include('../private/views/librarian/includes/header.view.php'); ?>
</div>

<!-- navigation bar -->

<?php 
   include('../private/views/librarian/includes/nav.view.php');

 ?>

 <!-- notification view -->
 <?php 
   include('../private/views/librarian/includes/notification.view.php'); ?>
 
<!-- body -->
<div class="locateBookContainer1" id="locateBookContainer1">
  <div class="locateBookContainer2">
  <form  method="post" class="form" id="form">
    <br>
        <label for="locateBook" class="locateBook">Locate Book</label>
        <br>
        <label for="accessNumber" class="accessNumber">Access Number(s) </label>
        <div class="errorMesg" id="errorMesg">
                    <?php if (isset($errors['ISBN'])): ?>
                    <p>
                        <?="*" . $errors['ISBN'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <!-- <input type="number" class="accessNumberInput" id="accessNumberInput" name="accessNumberInput" > -->
        <button id="plus" class="plus" type="button"><i class="fa-sharp fa-solid fa-plus" id="plusIcon"></i>&nbsp;Add Book</button>
        <br>

        <label class="switch">
        <input type="checkbox"  id="togglebtn">
        <span class="slider round"></span>
        </label>
        <label for="date" class="date">Define Return Date</label>
      
        <input type="date" name="returnDate" id="returnDate" class="returnDate" min='<?php echo date("Y-m-d")?>' disabled> 
        <br>
        <button class="issueBookbtn" id="issueBookbtn">Issue</button>
    </form>

    <!-- fine status -->

    <?php if($rows):?>
    <div class="memberInforContainer">
    <label for="memberInfo" class="memberInfo">Member Info</label>
       <div class="memberImage">
          <img src="<?=ROOT?>/uploads/<?=$rows[0]->Image?>">
       </div>
       <table class="memInfo">
        <tr>
          <td class="nameLable"><label for="Name" >Name </label></td>
          <td> <span class="Name"><?=$rows[0]->Title?> <?=$rows[0]->FirstName?> <?=$rows[0]->LastName?></span></td>
        </tr>
        <tr>
          <td class="reg"><label for="registrationNo" >Registration No</label></td>
          <td> <span class="registrationNo"><?=$rows[0]->RegistrationNo?></span></td>
        </tr>
        <tr>
          <td class="nicLable"> <label for="nic" >NIC</label></td>
          <td><span class="nic"><?=$rows[0]->NIC?></span></td>
        </tr>
        <tr>
          <td class="typeLable"> <label for="type" >Type </label></td>
          <td><span class="type">
        <?php 
          if($rows[0]->Type){
              echo $rows[0]->Type;    
            }
          else{
            echo $rows[0]->JobType;
          }
        ?>
        </span></td>
        </tr>
        <tr>
          <td class="bdoLable"><label for="bdo" >BirthDay </label></td>
          <td><span class="bdo"><?=$rows[0]->Birthday?> </span></td>
        </tr>
        <tr>
          <td class="sexLable"><label for="sex" >Sex </label></td>
          <td><span class="sex"><?=$rows[0]->Sex?></span></td>
        </tr>
        <tr>
          <td class="addressLable"><label for="address" >Address </label></td>
          <td><span class="address"><?=$rows[0]->Address?> </span></span></td>
        </tr>
        <tr>
          <td class="emailLable"><label for="email" class="emailLable">Email </label></td>
          <td><span class="email"><?=$rows[0]->Email?></span></td>
        </tr>
        <tr>
          <td class="phoneLable"><label for="phoneNo" >Phone No </label></td>
          <td><span class="phoneNo"><?=$rows[0]->PhoneNo?></span></td>
        </tr>
       </table>
    </div>
    <?php endif?>
  
  <button class="back"><a href="<?=ROOT?>/books/issueBook">Back</a></button>

    
<!-- reserve  -->
<?php if(isset($errors['Reserve'])):?>
    <div class="containerWarningLocate" id="containerWarning">
        <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
        <p class="warnningMsg"><?=$errors['Reserve']?></p>
        <!-- <i class="fa-solid fa-angle-right" id="arrow"></i> -->
    </div>
<?php endif;?>

  </div>

</div>

<?php include('../private/views/includes/popup.issue.successfull.view.php'); ?>

<?php include('../private/views/librarian/includes/footer.view.php'); ?>

<?php if($flag[0]==1){
   echo '<script type="text/javascript">openIssueViewBookPopup("http://localhost/Pothpiyasa/public/books/issueBook");</script>';;
}
?>
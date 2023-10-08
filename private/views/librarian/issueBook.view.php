<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/issueBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

   
</head>

<body>
<div class="header">
        <p class="operation">Issue Book</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
</div>

<!-- navigation bar -->

<?php 
   include('../private/views/librarian/includes/nav.view.php');
 ?>

 <!-- notification view -->
 <?php include('../private/views/librarian/includes/notification.view.php'); ?>
 
<!-- body -->
<div class="issueBookContainer1" id="issueBookContainer1">
  <div class="issueBookContainer2" id="issueBookContainer2">

  <form  method="post" enctype="multipart/form-data">

    <label for="userID" class="userIDLabel">Reg No</label>
    <input type="text" class="userID" name="userID"  value="<?= get_var('userID') ?>">
    <div class="errorMesg">
    <?php if($errors):?>
      <p>
          <?="*" . $errors['userID'] ?>
      </p>
    <?php endif?>
    </div>
    <button class="locate" name="locateByID">Locate</button>

  </form>
  </div>



  <div class="issueBookContainer3">
  <form  method="post" enctype="multipart/form-data">
  <!-- <label for="heading2" class="heading2">Locate By Name</label> -->
    <label for="lastName" class="lastNameLabel">Last Name</label>
    <input type="text" class="lastName" name="lastName"  value="<?= get_var('lastName') ?>">

    <label for="firstName" class="firstNameLabel">First Name</label>
    <input type="text" class="firstName" name="firstName"  value="<?= get_var('firstName') ?>">

    <label for="Type" class="TypeLabel">Type</label>
    <select name="type" id="" class="Type">
      <option <?= get_select('type', '') ?> value="">--- Choose Type ---</option>
       <option <?= get_select('type', 'Administrator') ?> value="Administrator">Administrator</option>
       <option <?= get_select('type', 'Librarian') ?> value="Librarian">Librarian</option>
       <option <?= get_select('type', 'Library-Staff') ?> value="Library-Staff">Library-Staff</option>
       <option <?= get_select('type', 'Lecturer') ?> value="Lecturer">Lecturer</option>
       <option <?= get_select('type', 'Student') ?> value="Student">Student</option>
       <option <?= get_select('type', 'Non-Academic') ?> value="Non-Academic">Non-Academic</option>
    </select>

    <button class="locateType" name="locateByName" id="locateByName">Locate</button>
  </form>
  
  <div>
    <?php if($rows):?>
      
      <h3 class="heading3"><?php echo sizeof($rows)?> Members Available </h3>
      <table class="userTable">
        <?php foreach ($rows as $row):?>
          
          <!-- send size of array to js file -->
          <script>
            let rows = <?php echo sizeof($rows)?>
          </script>

          <tr class="trTable" >
            <td class="imageRow"><img src="<?=ROOT?>/Uploads/<?=$row->Image?>" class="image"></td>
            <td class="NameRow"><a href="<?=ROOT?>/books/bookLocateUsingUserName/<?=$row->UserID?>" class="name"><?=$row->LastName?>&nbsp;<?=$row->FirstName?></a></td>
            <?php if(!empty($row->JobType)):?>
              <td class="typeRow"><?=$row->JobType?></td>
            <?php else:?>
              <td class="typeRow"><?=$row->Type?></td>
          </tr>
      <?php endif?>
      <?php endforeach?>
      </table>
      <?php else:?>
        <script>
            let rows = <?php echo 0?>
        </script>
      
    <?php endif?>
    <?php if (empty($fine) and empty($rows)) : ?>
          <div class="noResult">No Result Found!</div>
    <?php endif ?>
    </div>


  <button class="back"><a href="<?=ROOT?>/librariandashboard">Back</a></button>


  <?php if($fine):?>
  <div class="containerWarning" id="containerWarning">
        <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
        <p class="warnningMsg"><span><?=$fine[0]['userName']?></span>, Reg No <span><?= $fine[0]['RegistrationNo'] ?></span> has been checked.<span>Account status:</span>  blocked due to unpaid fines of <span>Rs. <?=$fine['totalFine']?></span> .</p>
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
    
    
    <!-- <button class="payFine" name="payFine" id="payFine" onclick="openLocatePopup(<?php echo $fine[0]['UserID']?>)">Pay Fine</button> -->
    <button class="Next" name="Next" id="Next" onclick="directNextPage(<?php echo $fine[0]['UserID']?>)" disabled>Next</button>
    <button class="cancel" name="cancel" id="cancel">Cancel</button>
  </div>

<?php endif?>
<?php 
// include('../private/views/includes/popup.locate.view.php'); ?>
<?php include('../private/views/librarian/includes/footer.view.php'); ?>







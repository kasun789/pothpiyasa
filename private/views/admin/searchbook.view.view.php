<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PothPiyasa</title>
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/header.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/dashboardUser.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/reservations.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/loans.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/history.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/searchbook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/searchbook.view.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/requestBook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/calender.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">


    <!-- <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/swiper.min.css"> -->


</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    background: #eee;
    /* font-family: Helvetica Neue, Helvetica, Arial, sans-serif; */
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  .swiper {
    top: 10px;
    width:80%;
    height: 80%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>

<body>
<div class="header">
        <p class="operation">Book List</p>

        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>

        <div class="profile" id="profile">
            <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" class="profileImg" id="profileImg">
        </div>

        <div class="container_patron" id="container_patron">

            <div class="container_patron_details">
                <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" id="profileImg">
                <p class="profileName" id="profileName">
                    <?= Auth::profileName() ?>
                </p>
                <p class="profileEmail" id="profileEmail">
                    @<?= Auth::profileEmail() ?>
                </p>
            </div>

            <ul>
                <li><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">Profile</a></li>
                <!-- <li><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li> -->
                <li><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My
                        Reservation</a></li>
                <li><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a>
                </li>
                <li><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>

                <li><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>


            </ul>
        </div>
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?> 



<!-- body -->

  
  
 
<div class="bodyContainerswiper">



    
  <?php if(!empty($_SESSION ["details"])):

    
  
    ?>
    
    <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

    <?php
     
                                    
        foreach ($_SESSION ["details"] as $row): ?>

          <div class="swiper-slide">
          <a href='<?=ROOT?>/books/viewSpecific/<?=$row->BookID?>'><img src="<?= ROOT ?>/uploads/<?=$row->Image?>" /></a>
          </div>

        <?php endforeach; ?>

  
      
    </div>

    <!-- forward and backward buttons -->

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    

    
  </div>

  
    <?php else: ?>
      <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                        <br>
                        <h4 class="No_result">No results found</h4>
                        <br>
                        <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching again!</h5>
                </div>
    <?php endif?>
  

  <button class="backbtnbooklist"><a href="<?= ROOT ?>/userdashboard">Back</a></button>
    </div>

    
     
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
         delay: 2400,
         disableOnInteraction: false,
      },
      mousewheel: true,
      keyboard: true,
  });
</script>

<?php include('../private/views/includes/footer.view.php'); ?>



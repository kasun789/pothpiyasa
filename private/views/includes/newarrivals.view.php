<?php //include('../private/views/user/includes/header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pothpiyasa</title>
  <link rel="stylesheet" href="<?= ROOT ?>/css/includes/searchbook.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Demo styles -->
  <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: white;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .htag {
      position: absolute;
      top: 130px;
      left: 670px;
      color: #3498DB;
      font-size: 36px;

    }

    .swiper {
      top: 200px;
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 300px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
  </style>


</head>


<body>
  <header>
    <div class="header_bar_login">
      <div class="system_logo">
        <img src="<?= ROOT ?>/img/admin/login/logo.png" class="logo">
        <img src="<?= ROOT ?>/img/admin/login/logo_text.png" class="logo_text">
      </div>
      <div class="signin_button">
        <!-- <img src="<?= ROOT ?>/img/admin/login/vector_book.png" class="book_logo"> -->
        <i class="fa-solid fa-user" id="signinI"></i>
        <a href="<?= ROOT ?>/Login" class="signin">Sign In</a>
      </div>
    </div>
  </header>



  <div class="options">
    <a href="<?= ROOT ?>/userlogin"><i class="fa-solid fa-circle-chevron-left" id="backward"></i></a>

    <ul>
      <li><a href="<?= ROOT ?>/books/searchbookOPAC" class="">OPAC</a></li>
      <li><a href="<?= ROOT ?>/books/newarrivals" class="active">New Arrivals</a></li>
    </ul>
  </div>


  <!-- body -->

  <div class="bodyContainer01">


    <!-- form -->

    <div class="bodyContainer03">

      <h1 class="htag">NEW ARRIVALS</h1>




      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <?php
          $rows = get_newarrivals();
          if ($rows):

            foreach ($rows as $row): ?>
              <div class="swiper-slide">
              <a href='<?=ROOT?>/books/viewSpecificnewarrival/<?=$row->BookID?>'><img src="<?= ROOT ?>/uploads/<?=$row->Image?>" /></a>
              </div>

            <?php endforeach; ?>

          <?php endif; ?>

        </div>

        <!-- forward and backward buttons -->

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>


        <!-- pagination -->

        <div class="swiper-pagination"></div>
      </div>


    </div>



  </div>

  <footer>
        <div class="footer_bar">
            <h5 class="copyright" >© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
  </footer>





  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      spaceBetween: 30,
      centeredSlides: true,
      slidesPerView: "auto",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 1100,
        disableOnInteraction: false,
      },
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>



  <?php //$this->view('user/includes/footer'); ?>
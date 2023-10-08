<?php include('../private/views/user/includes/header.view.php'); ?>
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
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  .swiper {
    margin-top: 60px;
    width:85%;
    height: 65%;
    margin-left:80px;
    /* border:10px solid red; */
  }

  /* .swiper:hover{
  transform: scale(1.2);
    z-index: 2;
} */

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    /* background: #fff; */
    background:rgba(174, 214, 241, 0.6);
    box-shadow: 0 0.3rem 0.5rem rgba(68, 68, 68, 0.5);

    border-radius:20px;
    display: flex;
    /* justify-content: center; */
    /* align-items: center; */
  }

  .swiper-slide img {
    /* padding:15px 10px 15px 10px; */
    border-radius:10px;

    margin-left:15px;
    margin-right:10px;
    margin-top:10px;
    margin-bottom:15px;
    display: block;
    width: 95%;
    height: 95%;
    object-fit: cover;
  }
</style>

<body>
    <div class="header">
        <p class="operation">Book List</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        


    <!-- navigation bar -->

    <?php 
      $this->view('user/includes/nav'); 
    ?>


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
                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_pngsearchbook">
                        <br>
                        <h4 class="No_resultsearchbook">No results found</h4>
                        <br>
                        <h5 class="No_result_parasearchbook">We couldn't find what you search for. <br>Try searching again!</h5>
                </div>
    <?php endif?>
  

  <button class="backbtnbooklist"><a href="<?= ROOT ?>/books/searchbookUsers">Back</a></button>
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

<?php include('../private/views/user/includes/footer.view.php'); ?>


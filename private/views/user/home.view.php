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
      font-family: "Inter";
      font-style: normal;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      top:40px;
      width: 80%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 200px;
      height: 200px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
  </style>

<body>
<div class="header">
        <p class="operation">Dashboard</p>
        
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        


<!-- navigation bar -->

<?php include('../private/views/user/includes/nav.view.php'); ?>


<!-- New Arrivals -->

<div class="dashContainer1">

<div class="headingnewarrivals">

  <h1 >New Arrivals</h1>
  
        
</div>
  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

    <?php
      $rows=get_newarrivals();
      if ($rows): 
                                    
        foreach ($rows as $row): ?>
          <div class="swiper-slide">
          <a href='<?=ROOT?>/books/viewSpecific/<?=$row->BookID?>"'><img src="<?= ROOT ?>/uploads/<?=$row->Image?>" /></a>
          
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

<!-- Annoucement -->

<div class="dashContainer2">

  <div class="announcement">
    <h2>Announcement</h2>

  </div>

    <?php
            $rows=get_FineDetails('UserID',Auth::profileID());
           ?>

  
        <div class="totalfine">
        <h1 class="Analytics1">Fine Status</h1> 
        <?php
        $totalFine=0;


      if (($rows)!=="None"):
       
            

                  foreach ($rows as $row): 

                    $totalFine= $totalFine+$row->FineAmount;
                   // print($row->FineAmount);

                  ?>
                    
                  

         <?php endforeach; ?>
         <p class="parafine"><i class="fa-solid fa-circle-exclamation" id="warning"></i>You have to pay Rs.<?php echo $totalFine ?> 
         amount of fine.</p>
         <?php else:?>
          <p class="parafine"><i class="fa-solid fa-circle-exclamation" id="warning"></i>You have to pay Rs.<?php echo $totalFine ?> 
         amount of fine.</p>
      <?php endif; ?>
             <div class="h1tag1"></div>
        </div>

        <div class="duedates">
        <h1 class="Analytics2">Due Dates</h1>  
        <?php
        if (($rows)!=="None"): 
        
            

          foreach ($rows as $row): 
                if($row->ReturnStatus==0): ?>

                     <p class="paradue"><i class="fa-solid fa-triangle-exclamation" id="note"></i>You have due dates at<?php echo " ".$row->DueDate ?> for <?php echo get_BookTitle('BookID',$row->BookID) ?></p>
               
                <?php endif;?>
          <?php endforeach?>
        <?php else:?>
                     <p class="paradue1"><i class="fa-solid fa-triangle-exclamation" id="note"></i>You have no due dates</p>

        <?php endif;?>
             <div class="h1tag2"></div>
        </div>
       
        <div class="reservationstatus">
        <h1 class="Analytics3">Reservation</h1> 
        <?php
          $reserve = new ReserveBook();
          $data = $reserve->where("UserID", Auth::profileID());

          ?>
          
       
             <?php if ($data): 
        
             foreach ($data as $row1):  ?>

                <i class="fa-solid fa-circle-check" id="reserved"></i><p class="parareservation"><?php echo get_BookTitle('BookID',$row1->BookID) ?></p>
                <br>
          
                <?php endforeach?>
            <?php else:?>
              <i class="fa-solid fa-triangle-exclamation" id="reserved1"></i><p class="parareservation1">No Reservations.</p>
           <?php endif;?>
             <div class="h1tag3"></div>
        </div>


        <a href="<?= ROOT?>/books/searchbookUsers"><i class="fa-solid fa-magnifying-glass" id="webcatelog"></i></a>
        <p class="webcatelogpara">Web Catelog</p>

        <a href="http://documents.ucsc.lk/xmlui/"><i class="fa-solid fa-book" id="dlibrary"></i>
        <p class="digitalPara">Digital Library</p></a>

</div>

<!-- Introduction of library -->

<div class="dashContainer3">


   <div class="wrap">
    <nav id="nav">
      
        <ul>
          <li><a class="active" href="#" data-target="lhome">HOME</a></li>
          <li><a class="about" href="#" id="about" data-target="lmembership">ABOUT</a>
            </li>

          <li><a class="" href="#" data-target="lcollections">COLLECTIONS</a></li>
          <li><a class="" href="#" data-target="lfacilities">FACILITIES</a></li>
          <li><a class="" href="#" data-target="lcontactus">CONTACT US</a></li>
        </ul>
    </nav>
    </div>
    <div id="content">
      
      <?php
      include('lhome.html');
      ?>
   
    
   
    </div>

</div>

<!-- 
<div class="bodyContainer04">
    <a href=""><i class="fa-solid fa-book" id="dlibrary"></i></a>
    

  #dlibrary{
    position: absolute;
    font-size: 150px;
    color: purple;
    left: 1250px;
    top: 250px;
  }
</div> -->







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
         delay: 2200,
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>
<!-- Calendar -->
<?php include('../private/views/user/includes/calendar.view.php'); ?>

    
<?php include('../private/views/user/includes/footer.view.php'); ?>





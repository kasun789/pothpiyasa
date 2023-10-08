<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/searchbook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/viewViewBook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/includes/popreserve.css">



    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <title>Pothpiyasa</title>
    <style>
        #reserved{
            color:red;
            font-size:20px;
        }
    </style>
</head>


<body>
    <header>
        <div class="header_bar_login" id="header_bar_login">
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
    <div class="options" id="options">
    <a href="<?= ROOT ?>/userlogin"><i class="fa-solid fa-circle-chevron-left" id="backward"></i></a>

    <ul>
      <li><a href="<?= ROOT ?>/books/searchbookOPAC" class="">OPAC</a></li>
      <li><a href="<?= ROOT ?>/books/newarrivals" class="active">New Arrivals</a></li>
    </ul>
  </div>

    <div class="bodyContainer01" id="bodyContainer01">
 

        <?php if($row):?>

        <img src="<?= ROOT ?>/uploads/<?=$row[0]->Image?>" alt="" srcset="" class="imageProfile" id="imageProfile">
        <!-- <img src="image/profile.jpg" alt="" class="imageProfile"> -->
        <div class="bookInfo"><label for="bookfomation" class="info">Book Info</label></div>
        
            <table id="bookInfoTable">
                
                    <tr >
                        <td id="titleBookInfo">Title</td>
                        <td id="valueBookInfo"><?= $row[0]->Title;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">ISBN</td>
                        <td id="valueBookInfo"><?= $row[0]->ISBN;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Author Name</td>
                        <td id="valueBookInfo"><?=$row[0]->AuthorName;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Edition</td>
                        <td id="valueBookInfo"><?= $row[0]->Edition;?> Edition</td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Language</td>
                        <td id="valueBookInfo"><?= $row[0]->Language;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Publisher</td>
                        <td id="valueBookInfo"><?= $row[0]->Publisher;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Published Year</td>
                        <td id="valueBookInfo"><?= $row[0]->PublishedYear;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Category Name</td>
                        <td id="valueBookInfo"><?= get_CategoryName("CategoryID",$row[0]->Category);?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">No of Pages</td>
                        <td id="valueBookInfo"><?= $row[0]->NoPages;?></td>
                    </tr>
                

            </table>
            
                
<!--             
            <div class="containerBookInfo"> <p class="ReservedListBookInfo">Reserved List</p> 
                <div class="reserveduserlist">
                <?php
                    $reservebookid=$row[0]->BookID;
                    $reserve = new ReserveBook();
                    $data = $reserve->where("BookID", $row[0]->BookID);
                // print_r($data);

                if ($data): ?>
                    
                       <table class="reservationlist">

                       <?php foreach ($data as $row1):  ?>
                    
                       <tr>


                        <td><img src="<?= ROOT?>/uploads/<?=get_userImage("UserID",$row1->UserID)?>" alt="" srcset="" class="profileImg" id="profileImg"></td>

                         <td><?=get_user_name("UserID",$row1->UserID);?></td>

                         <td><?=$row1->ReservedDate;?></td>  
                         
                         
                    </tr>

                    
                               
                        
                                
                    <?php endforeach?>

                       </table>
                       
                    <?php endif;?>

            </div>
        </div> -->
       

           
        </div>

        
        <button class="reserve" id="reserve" type="button" onclick="openReserveLocatePopup()">Reserve</button>


        <button class="backbtnBookInfo" id="backbtnBookInfo"><a href="<?= ROOT ?>/login">Back</a></button>
       
       <?php endif;?>
    <?php include('../private/views/includes/popup.reserve.view.php'); ?>
     
   
    <footer>
        <div class="footer_bar">
            <h5 class="copyright" >© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
  </footer>


</body>
<script type="text/javascript"> var reservebookid= '<?=$reservebookid?>';</script>

<script src="<?=ROOT?>/js/user/OPACreserve.js"></script>


</html>


<!-- <?php //$this->view('user/includes/footer'); ?> -->
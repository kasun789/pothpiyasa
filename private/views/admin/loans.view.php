<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PothPiyasa</title>
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/header.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/dashboardUser.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/reservations.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/loans.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/history.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/searchbook.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/searchbook.view.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/requestBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">


    <!-- <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/swiper.min.css"> -->


</head>

<body>
<div class="header">
        <p class="operation">My Loans</p>

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

<div class="container_view_loans">

<h1>Returning Dates of the Books</h1>
        <h2>Please consider the following instructions</h2>

        <div class="loans_instruction_container">

            <ol>
                <li>The following information provides details regarding the return details for books that you have previously borrowed.</li>
                <li>Kindly be informed that there is a fine applicable for each book in the event of late return.</li>

            </ol>

        </div>


                <?php if ($rows):
                $countRows=0;
                foreach ($rows as $row): 
                        if($row->ReturnStatus==0):
                                $countRows=$countRows+1;
                        endif;
                endforeach;
               
                 if($countRows>0):
                 ?>
                     
                                <table class="loans_table" id="loans_table">

                                        <tr>
                                                                <td><?= ++$i; ?></td>
                                                                <td><?= get_bookname('BookID', $row->BookID, $row->Code) ?></td>
                                                                <td><?= date("Y-m-d", strtotime($row->IssuedDate)) ?></td>
                                                                <td><?= $row->DueDate ?></td>
                                                                <td id="fineshow"><?= get_fine('UserID',$row->UserID , $row->BookID, $row->Code )  ?></td>



                                        </tr>
                                        <?php 
                                        $i=0;
                                        foreach ($rows as $row): 
                                                if($row->ReturnStatus==0):
                                                        ?>
                                                        <tr>
                                                                <td><?= ++$i; ?></td>
                                                                <td><?= get_bookname('BookID', $row->BookID ) ?></td>
                                                                <td><?= date("Y-m-d", strtotime($row->IssuedDate)) ?></td>
                                                                <td><?= $row->DueDate ?></td>
                                                                <td id="fineshow"><?= get_fine('UserID',$row->UserID , $row->BookID )  ?></td>


                                                        </tr>
                
                                                <?php endif;?>

                                        <?php endforeach; ?>
                               </table>
                <?php else:?>
                        
                <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="loans_notfound_png">
                        <br>
                        <h4 class="loans_No_result">No Loans</h4>
                       
                </div>
                <?php endif;?> 

         <?php else: ?>

                <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="loans_notfound_png">
                        <br>
                        <h4 class="loans_No_result">No Loans</h4>
                       
                </div>


                
                <?php endif; ?>
        </div>
        <button class="backbtnloans"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>


 <script>
         x = document.getElementById("loans_table").rows.length;

       for(i=1;i<x;i++){
        var tr = document.getElementsByTagName("tr")[i];
        var td = tr.getElementsByTagName("td")[5];
        if(td.textContent.trim()=="No Fine"){
               tr.style.background="";
        }
        else{
            
          tr.style.background="#F46155";
              
        }
}

</script>

<?php include('../private/views/includes/footer.view.php'); ?>


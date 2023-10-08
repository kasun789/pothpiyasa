<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/checkBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>

<body>
    <div class="header">
        <p class="operation">Inventory</p>

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
                    @
                    <?= Auth::profileEmail() ?>
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



    <div class="bodyContainer01">

        <!-- form -->
        <?php

$id = $_SESSION['id'] ;


  
if($flags[0]=="B"){
  $book= new Book();
  $row = $book->where('BookID', $id);
  $id= "B".$id;
}
elseif($flags[0]=="C"){
  $copy= new BookCopy();
  $row = $copy->where('CopyID', $id);
  $id= "C".$id;




}



        ?>

        <div class="container_book_search" id="container_book_search">
            <h1>Inventory Book Check</h1>
            <h2>Please follow the below instruction for inventory check</h2>

            <div class="inventory_instruction_container">

            <ol>
                    <li>Please Enter the Access Number of the Book in the Format "Ex:B3004/C3004" & Click the "Check" button.</li>
                    <li>To Reset the Current Inventory Data, Please Click on the "Reset Inventory" button.</li>
                    <span>*Before proceeding with the annual inventory process, Please ensure that you reset the current inventory data. <br> *Resetting of inventory data is limited to once per year.</span>

                </ol>

            </div>

            <div class="inventoryform" id="inventoryform">

                <form method="post" enctype="multipart/form-data" class="inventory_add_data_form">

                    <label for="condition" class="conditionLabel">Book Condition</label>

                    <select id="condition" class="condition" name="condition" required>

                        <option <?= get_select('condition', '', $row[0]->InventoryCondition ?? "") ?> value="" disabled
                            selected>--- Choose Type ---</option>
                        <option <?= get_select('condition', 'Damaged', $row[0]->InventoryCondition ?? "") ?>
                            value="Damaged">
                            Damaged</option>
                        <option <?= get_select('condition', 'T-Withdrawn', $row[0]->InventoryCondition ?? "") ?>
                            value="T-Withdrawn">T-Withdrawn</option>
                        <option <?= get_select('condition', 'Withdrawn', $row[0]->InventoryCondition ?? "") ?>
                            value="Withdrawn">Withdrawn</option>

                    </select>

                    <label for="comment" class="commentLabel">Comment</label>

                    <input type="text" name="comment" class="comment" id="comment"
                        value="<?= get_var('comment', $row[0]->Comments) ?>">


                    <button class="addbookbtn1" id="addbookbtn1" name="submit" type="submit">OK</button>
                    <button class="cancelbtn_inventory"><a href="<?= ROOT ?>/adminDashboard">Cancel</a></button>
                </form>


            </div>

        </div>


        <!-- <img src="<?= ROOT ?>/img/requestbook1.png" alt="" srcset="" class="image"> -->



    </div>

    <?php
    include('../private/views/includes/popup.add.view.php'); ?>

    <?php include('../private/views/includes/footer.view.php'); ?>
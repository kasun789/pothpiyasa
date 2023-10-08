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
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popupinventoryreset.css">
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

    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>

    <div class="bodyContainer01">

        <div class="container_book_search" id="container_book_search">
            <h1>Inventory Book Check</h1>
            <h2>Please follow the below instruction for inventory check</h2>

            <div class="inventory_instruction_container">

                <ol>
                    <li>Please enter the Access Number of the book in the format "Ex:B3004/C3004" & click the "Check" button.</li>
                    <li>To reset the current inventory data, please click on the "Reset Inventory" button.</li>
                    <span>*Before proceeding with the annual inventory process, Please ensure that you reset the current inventory data. <br> *Resetting of inventory data is limited to once per year.</span>

                </ol>

            </div>


            <button class="reset" id="reset" name="reset" onclick="openInventoryPopup()"><i
                    class="fa-solid fa-arrow-rotate-right" id="reseticon"></i>&nbsp;Reset Inventory</button>


            <!-- form -->
            <div class="bodyContainer2" id="bodyContainer2">


                <form method="post" enctype="multipart/form-data" class="inventory_form">

                    <label for="tital" class="titalLabel">Access Number</label>

                    <?php if (isset($errors['Title'])): ?>

                        <input type="text" name="Title" class="tital" id="tital" value="<?= get_var('Title') ?>" required>
                        <div class="errorTitleMesg">
                            <p>
                                <?= "*" . $errors['Title'] ?>
                            </p>

                        </div>

                    <?php else: ?>
                        <input type="text" name="Title" class="tital" id="tital" value="" required>
                    <?php endif; ?>




                    <button class="inventory_addbookbtn" id="addbookbtn" name="submit" type="submit">Check</button>

                </form>
                <button class="inventory_backbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>

            </div>


        </div>
        <!-- <img src="<?= ROOT ?>/img/requestbook1.png" id="imageinventory" alt="" srcset="" class="image"> -->


    </div>
    <?php include('../private/views/librarian/includes/popup.inventory.view.php'); ?>

</body>
<script src="<?= ROOT ?>/js/admin/includes/nav.js"></script>
<script src="<?= ROOT ?>/js/includes/notification.js"></script>
<script src="<?= ROOT ?>/js/includes/popup.js"></script>
<script src="<?= ROOT ?>/js/includes/popupLocate.js"></script>
<script src="<?= ROOT ?>/js/includes/header.js"></script>
<script src="<?= ROOT ?>/js/admin/inventory.js"></script>



</html>
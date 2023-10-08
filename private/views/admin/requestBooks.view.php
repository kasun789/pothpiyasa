<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/user/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/requestBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popup.reservationsucess.css">




</head>

<body>
    <div class="header">
        <p class="operation">Request Books</p>

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

    <!-- body -->
    <div class="request_bodyContainer01">
        <h1>Request Books From Main Library (University of Colombo)</h1>
        <h2>Please follow the below instruction for request book</h2>

        <div class="request_instruction_container">

            <ol>
                <li>The requesting book must not be available in the UCSC library.</li>
                <li>The availability details of requested books will be posted on a weekly basis in the "Reserved Book List Publish".</li>

            </ol>

        </div>

        <!-- form -->
        <img src="<?= ROOT ?>/img/requestbooks.png" class="requestbook_img">


        <div class="bodyContainer_requestbook">



            <form method="post" enctype="multipart/form-data" class="request_form">


                <label for="bookTitle" class="bookTitleLabel">Book Title</label>
                <input type="text" name="bookTitle" class="bookTitle" id="bookTitle" value="<?= get_var('bookTitle') ?>">

                <label for="bookAuthor" class="bookAuthorLabel">Author</label>
                <input type="text" name="bookAuthor" class="bookAuthor" id="bookAuthor" value="<?= get_var('bookAuthor') ?>">

                <label for="bookPublishedYear" class="bookPublishedYearLabel">Published Year</label>
                <input type="number" name="bookPublishedYear" class="bookPublishedYear" id="bookPublishedYear" value="<?= get_var('bookPublishedYear') ?>">

                <label for="bookEdition" class="bookEditionLabel">Edition</label>
                <input type="number" name="bookEdition" class="bookEdition" id="bookEdition" value="<?= get_var('bookEdition') ?>">



                <button class="requestbtn" name="submit" type="submit">Request</button>
                <button class="backbtn1"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>


            </form>


        </div>



    </div>
    <?php include('../private/views/user/includes/popup.bookrequest.success.view.php'); ?>


    <?php include('../private/views/includes/footer.view.php'); ?>
    <script src="<?= ROOT ?>/js/user/popup.requestbook.js"></script>

    <?php if (isset($errors['error'])) : ?>
        <div class="containerWarning" id="containerWarning">
            <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
            <p class="warnningMsg"><span><?= $errors['error'] ?></span></p>
        </div>
        </div>
    <?php endif ?>

    <?php
    if ($flag[0] == 1) {
        echo '<script type="text/javascript">openReserveLocatePopup2();</script>';
    } ?>
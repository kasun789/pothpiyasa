<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/searchbook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">


</head>



<body>
    <div class="header">
        <p class="operation">Search Book</p>

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

    <div class="bodyContainer01">

        <!-- form -->
        <img src="<?= ROOT ?>/img/admin/login/library.png" class="library_png">

        <div class="bodyContainer02">


            <form method="post" enctype="multipart/form-data" >

                <h3 class="opac_name">OPAC (Online Public Access Category)</h3>
                <div class="hrtag"></div>



                <label for="Title" class="TitleLabel">Title</label>
                <input type="text" name="Title" class="Title" id="Title" value="<?= get_var('Title') ?>">





                <label for="Author" class="AuthorLabel">Author</label>
                <input type="text" name="Author" class="Author" id="Author" value="<?= get_var('Author') ?>">




                <label for="Subject" class="SubjectLabel">Subject</label>
                <input type="text" name="Subject" class="Subject" id="Subject" value="<?= get_var('Subject') ?>">




                <label for="ISBN" class="ISBN1Label">ISBN</label>
                <input type="number" name="ISBN1" class="ISBN1" id="ISBN1" value="<?= get_var('ISBN1') ?>">


                <button class="searchbtn" name="submit" type="submit">Search</button>

            </form>
        </div>
        <button class="backbtnsearchbook"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>



    </div>

    <?php include('../private/views/includes/footer.view.php'); ?>
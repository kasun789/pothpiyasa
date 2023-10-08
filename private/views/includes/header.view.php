<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PothPiyasa</title>
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/header.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/notification.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/addUser.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/eventLog.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/holidays.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/viewUser.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/viewReport.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/reports.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/viewReport.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/adminDashboard.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/configSettings.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/includes/calendar.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/onlineUsers.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/editProfile.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/bulkadd.css">



</head>

<body>
    <div class="header">

        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon" onclick="showNotification()"></i>
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
                <li><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">My Profile</a></li>
                <!-- <li><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li> -->
                <li><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My
                        Reservation</a></li>
                <li><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a>
                </li>
                <li><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>

                <li><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>


            </ul>
        </div>
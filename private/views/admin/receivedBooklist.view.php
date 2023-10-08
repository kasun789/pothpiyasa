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
    <link rel="stylesheet" href="<?=ROOT?>/css/user/includes/receivedbooklist.css">





</head>

<body>
    <div class="header">
        <p class="operation">Requested Book List</p>

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

        <div class="container_view_booklist">

                <h1>List of Available Books that Requested from Main Library</h1>
                <h2>Please follow the below instructions</h2>

                <div class="received_instruction_container">

                        <ol>
                                <li>Please note that the book list will be automatically removed one week after its publication, therefore it is important to borrow the book within that timeframe.</li>

                        </ol>

                </div>



                <?php if ($rows): ?>


                        <table class="booklist_table" id="booklist_table">

                                <tr>
                                        <th width="100">No</th>
                                        <th width="300">Book Title</th>
                                        <th width="100">Author Name</th>
                                        <th width="100">Edition</th>
                                        <th width="100">Published Year</th>

                                </tr>
                                <?php
                                $i = 0;
                                foreach ($rows as $row):



                                        ?>
                                        <tr>
                                                <td>
                                                        <?= ++$i; ?>
                                                </td>
                                                <td><?= $row->BookTitle ?></td>
                                                <td>
                                                        <?= $row->AuthorName ?>
                                                </td>
                                                <td>
                                                        <?= $row->Edition ?>
                                                </td>
                                                <td><?= $row->PublishedYear ?></td>
                                        </tr>




                                        <?php


                                endforeach; ?>
                        </table>

                <?php else: ?>

                        <div class="result_notfound_container">
                                <img src="<?= ROOT ?>/img/notfound.png" class="received_notfound_png">
                                <br>
                                <h4 class="received_No_result">No Results</h4>
                        </div>



                <?php endif; ?>




                <!-- <button class="backbtnhistory"><a href="<?= ROOT ?>/userdashboard">Back</a></button> -->

        </div>






        <script>



        </script>

        <?php include('../private/views/includes/footer.view.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pothpiyasa</title>
        <link rel="stylesheet" href="<?= ROOT ?>/css/user/includes/header.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/user/includes/nav.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/user/includes/reservations.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popreserve.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popup.reservationsucess.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">


        <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">


</head>

<body>
<div class="header">
        <p class="operation">Reservations</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        

<!-- navigation bar -->

<?php 
   include('../private/views/user/includes/nav.view.php');
 ?>



        <!-- body -->

        <div class="container_view_reservations">

                <h1>List of Received Book List from UCSC Library</h1>
                <h2>Please follow the below instructions</h2>

                <div class="reservation_instruction_container">

                        <ol>
                                <li>Please note that the reservation limit is set to a maximum of three books at a time.
                                </li>
                                <li>You have the option to remove the reserved book from your account at any time.</li>

                        </ol>

                </div>


                <?php if ($rows):
                        ?>

                        <table class="reservations_table">

                                <thead id="myHeader">

                                        <tr>
                                                <th width="100">No</th>
                                                <th width="100">ISBN</th>
                                                <th width="300">Book Name</th>
                                                <th width="100">Reserved Date</th>
                                                <th width="200">Operation</th>

                                        </tr>


                                </thead>


                                <tbody>
                                        <?php

                                        $i = 0;
                                        foreach ($rows as $row):

                                                ?>

                                                <tr>
                                                        <td>
                                                                <?= ++$i; ?>
                                                        </td>
                                                        <td>
                                                                <?= get_ISBN('BookID', $row->BookID) ?>
                                                        </td>

                                                        <td>
                                                                <?= get_booknameReport('BookID', $row->BookID) ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->ReservedDate ?>
                                                        </td>


                                                        <td><button type='button' class='remove_reservations' id='remove_reservations'
                                                                        onclick='openReserveLocatePopup()'><i
                                                                                class='fa-solid fa-trash'></i>&nbsp;
                                                                        Remove</button>

                                                        </td>

                                                </tr>

                                        <?php endforeach; ?>
                                </tbody>

                        </table>


                <?php else: ?>

                        <div class="result_notfound_container">
                                <img src="<?= ROOT ?>/img/notfound.png" class="reservation_notfound_png">
                                <br>
                                <h4 class="reservation_No_result">No Reservations</h4>

                        </div>


                <?php endif; ?>

        </div>
        <button class="backbtnreservation"><a href="<?= ROOT ?>/userdashboard">Back</a></button>



        </div>
        <?php include('../private/views/user/includes/popup.reservation.delete.view.php'); ?>
        <?php include('../private/views/user/includes/popup.reservation.delete.success.view.php'); ?>

        <script type="text/javascript">var userid = '<?= $row->UserID ?>';</script>
        <script type="text/javascript">var reservebookid = '<?= $row->BookID ?>';</script>

        <script src="<?= ROOT ?>/js/user/popupDeleteReservation.js"></script>
        
        <?php include('../private/views/user/includes/footer.view.php'); ?>
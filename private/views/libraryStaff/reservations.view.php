<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pothpiyasa</title>
        <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/header.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/reservation.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>

<body>
        <div class="header">
                <p class="operation">Reservations</p>
                <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div>

        <!-- navigation bar -->

        <?php
        include('../private/views/libraryStaff/includes/nav.view.php');
        ?>

        <!-- notification view -->
        <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>

        <!-- body -->

        <div class="container_view_reservations">

                <h1>List of Reserved Books from UCSC Library</h1>
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
                                                                <?= get_bookname('BookID', $row->BookID) ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->ReservedDate ?>
                                                        </td>


                                                        <td><button type='button' class='remove_reservations' id='remove_reservations'
                                                                        onclick='openDeletePopup(<?= $row->AuthorID ?>)'><i
                                                                                class='fa-solid fa-trash'></i>&nbsp;<a
                                                                                href='<?= ROOT ?>/authors/edit/<?= $row->UserID ?>/<?= $row->BookID ?>'>
                                                                                Remove</a></button>

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
                <?php include('../private/views/includes/popup.deleteAuthor.view.php'); ?>

        </div>
        <button class="backbtnreservation"><a href="<?= ROOT ?>/libraryStaffdashboard">Back</a></button>


        </div>


        <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PothPiyasa</title>
        <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/header.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/history.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">


</head>

<body>
        <div class="header">
                <p class="operation">My History</p>
                <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div>

        <!-- navigation bar -->


        <?php
        include('../private/views/libraryStaff/includes/nav.view.php');
        ?>

        <!-- notification view -->
        <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>
        <!-- body -->
        <div class="container_view_history">

<h1>History of Borrowed Books</h1>


<div class="detail_container">
        <label for="pay fine" id="payfine">Pay Fine &nbsp&nbsp : </label>
        <label for="" id="payfineColor"></label>
        <label for="paid fine" id="paidfine">Paid Fine &nbsp&nbsp :</label>
        <label for="" id="paidfineColor"></label>
</div>

<?php if ($rows): ?>


        <table class="history_table" id="history_table">

                <tr>
                        <th width="100">No</th>
                        <th width="300">Book Name</th>
                        <th width="100">Borrowed Date</th>
                        <th width="100">Returned Date</th>
                        <th width="100">Amount of fine (Rs.)</th>

                </tr>
                <?php
                $i = 0;
                foreach ($rows as $row):



                        ?>
                        <tr>
                                        <td>
                                                <?= ++$i; ?>
                                        </td>
                                        <td>
                                                <?= get_bookname('BookID', $row->BookID, $row->Code) ?>
                                        </td>
                                        <td>
                                                <?= date("Y-m-d", strtotime($row->IssuedDate)) ?>
                                        </td>
                                        <td>
                                                <?= get_returnDate('UserID', $row->UserID, $row->BookID, $row->Code) ?>
                                        </td>
                                        <td id="fine1">
                                                <?= get_fine('UserID', $row->UserID, $row->BookID, $row->Code) ?>
                                        </td>
                        </tr>


                        <?php

                        $userID = $row->UserID;
                endforeach; ?>
        </table>

        <div class="pagination_container_patron">
                <!-- <button class="nav_pag_btn1" onclick="prevPag()" ><i class="fa-solid fa-chevron-left"></i>Prev</button> -->
                <ul>
                        <li class="pag_link"><a
                                        href="<?= ROOT ?>/users/myhistory/<?= $userid ?>?page=<?= $page_numbers['first_page_no'] ?>"><i
                                                class="fa-solid fa-chevron-left"></i>&nbsp;&nbsp;First</a></li>
                        <?php if ($page_numbers['previous_page_no']): ?>
                                <li class="pag_link"><a
                                                href="<?= ROOT ?>/users/myhistory/<?= $userid ?>?page=<?= $page_numbers['previous_page_no'] ?>">Prev</a>
                                </li>
                        <?php else: ?>
                                <li class="pag_link">Prev</li>
                        <?php endif; ?>

                        <li class="pag_link">Page
                                <?= $page_numbers['current_page_no'] ?> of
                                <?= $page_numbers['last_page_no'] ?>
                        </li>

                        <?php if ($page_numbers['next_page_no']): ?>
                                <li class="pag_link"><a
                                                href="<?= ROOT ?>/users/myhistory/<?= $userid ?>?page=<?= $page_numbers['next_page_no'] ?>">Next</a>
                                </li>
                        <?php else: ?>
                                <li class="pag_link">Next</li>
                        <?php endif; ?>
                        <li class="pag_link"><a
                                        href="<?= ROOT ?>/users/myhistory/<?= $userid ?>?page=<?= $page_numbers['last_page_no'] ?>">Last&nbsp;&nbsp;<i
                                                class="fa-solid fa-chevron-right"></i></a></li>


                </ul>
                <!-- <button class="nav_pag_btn2" onclick="nextPag()" >Next<i class="fa-solid fa-chevron-right"></i></button> -->
        </div>

        <form method="POST" id="go_to_page" class="go_to_page_patron">
                <label for="go_to_page">Go to page</label>

                <input type="text" name="go_to_page">
                <button type="submit" name="page_search_button">Go<i
                                class="fa-solid fa-chevron-right"></i></button>
                <!-- <button type="submit" name="page_search_button" ><a href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['search_page_no'] ?>">Go<i class="fa-solid fa-chevron-right"></i></a></button> -->

                <!-- <input type="submit" name="page_search_button" value="Go" > -->



        </form>


<?php else: ?>

        <div class="result_notfound_container">
                <img src="<?= ROOT ?>/img/notfound.png" class="history_notfound_png">
                <br>
                <h4 class="history_No_result">No History</h4>
                <!-- <br>
        <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching again!</h5> -->
        </div>



<?php endif; ?>


<!-- <button class="backbtnhistory"><a href="<?= ROOT ?>/userdashboard">Back</a></button> -->

</div>


<script>
  x = document.getElementById("history_table").rows.length;

for (i = 1; i < x; i++) {
        var tr = document.getElementsByTagName("tr")[i];
        var td = tr.getElementsByTagName("td")[4];
     
        var returndate = tr.getElementsByTagName("td")[3];
        if (td.textContent.trim() =="No Fine") {
                tr.style.background = "";
                console.log("awa");
        }
        else {
                if (returndate.textContent.trim() == "Not Returned") {
                        tr.style.background = "#F78483";
                }
                else {
                        tr.style.background = "#FBB68F";

                }
        }

}


</script>
        <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
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
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/viewUser.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/calender.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>

<body>
        <div class="header">
                <p class="operation">View Patron</p>
                <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div>

        <!-- navigation bar -->

        <?php include('../private/views/libraryStaff/includes/nav.view.php'); ?>

        <!-- notification view -->
      <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>
      
        

      <form method="POST">

<select class="user_filter_typo" id="user_filter_typo" class="user_filter_typo" name="user_filter_typo">
        <option value="">--- Filter By ---</option>
        <option value="FirstName">--- Filter By First Name ---</option>
        <option value="LastName">--- Filter By Last Name ---</option>
        <option value="Sex">--- Filter By Sex ---</option>
        <option value="Email">--- Filter By Email ---</option>
</select>

<input class="user_filter_typo_input" name="user_filter_typo_input" type="text">

<button id="filter_typo_search" name="filter_typo_search" class="filter_search_btn2">Filter</button>
</form>

<div class="container_view" id="patron_table_container_view">


<?php if ($rows): ?>
        <table class="user_table">
                <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone No</th>
                        <th>Sex</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Patron Type</th>
                        <th>Added by</th>
                        <th>Operations</th>

                </tr>
                <?php foreach ($rows as $row): ?>
                        <tr>
                                <td>
                                        <?= $row->FirstName ?>
                                </td>
                                <td>
                                        <?= $row->LastName ?>
                                </td>
                                <td>
                                        <?= $row->PhoneNo ?>
                                </td>
                                <td>
                                        <?= $row->Sex ?>
                                </td>
                                <td>
                                        <?= $row->Birthday ?>
                                </td>
                                <td>
                                        <?= $row->Address ?>
                                </td>
                                <td>
                                        <?= $row->Email ?>
                                </td>
                                <td>
                                        <?= $row->MemberType ?>
                                </td>
                                <!-- Getting user name when gives id, this should -->
                                <td>
                                        <?= get_staff_name('StaffID', $row->AddStaffID) ?>
                                </td>

                                <td><button type='button' class='editbtn' id='editbtn'><i
                                                        class='fa-solid fa-pen'></i>&nbsp;<a
                                                        href='<?= ROOT ?>/users/edit/<?= $row->UserID ?>'>
                                                        Edit</a></button>

                                        <!-- <button type='button' class='deletebtn' id='deletebtn'
                                                onclick='openDeleteUserPopup(<?= $row->UserID ?>)'><i
                                                        class='fa-solid fa-trash'></i>&nbsp;&nbsp;Delete</button> -->

                                </td>

                        </tr>

                <?php endforeach; ?>
        </table>

<?php else: ?>
        <div class="result_notfound_container">
                <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                <br>
                <h4 class="No_result">No results found</h4>
                <br>
                <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching again!</h5>
        </div>
<?php endif; ?>


<div class="pagination_container_patron">
        <!-- <button class="nav_pag_btn1" onclick="prevPag()" ><i class="fa-solid fa-chevron-left"></i>Prev</button> -->
        <ul>
                <li class="pag_link"><a
                                href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['first_page_no'] ?>"><i
                                        class="fa-solid fa-chevron-left"></i>&nbsp;&nbsp;First</a></li>
                <?php if ($page_numbers['previous_page_no']): ?>
                        <li class="pag_link"><a
                                        href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['previous_page_no'] ?>">Prev</a>
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
                                        href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['next_page_no'] ?>">Next</a>
                        </li>
                <?php else: ?>
                        <li class="pag_link">Next</li>
                <?php endif; ?>
                <li class="pag_link"><a
                                href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['last_page_no'] ?>">Last&nbsp;&nbsp;<i
                                        class="fa-solid fa-chevron-right"></i></a></li>


        </ul>
        <!-- <button class="nav_pag_btn2" onclick="nextPag()" >Next<i class="fa-solid fa-chevron-right"></i></button> -->
</div>

<form method="POST" id="go_to_page" class="go_to_page_patron">
        <label for="go_to_page">Go to page</label>

        <input type="text" name="go_to_page">
        <button type="submit" name="page_search_button">Go<i class="fa-solid fa-chevron-right"></i></button>
        <!-- <button type="submit" name="page_search_button" ><a href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['search_page_no'] ?>">Go<i class="fa-solid fa-chevron-right"></i></a></button> -->
                        
                <!-- <input type="submit" name="page_search_button" value="Go" > -->
        </>


</form>

</div>

<?php include('../private/views/includes/popup.delete1.view.php'); ?>


        <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
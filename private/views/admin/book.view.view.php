<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pothpiyasa</title>
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addBook.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/editBook.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/viewBook.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
        <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>

<body>
<div class="header">
        <p class="operation">View Book</p>

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

        <!-- notification view -->
        <?php include('../private/views/librarian/includes/notification.view.php'); ?>

        
        <!-- body -->
        <!-- fillter -->
        <form method="POST">

                        <select class="user_filter_typo" id="user_filter_typo" class="user_filter_typo" name="user_filter_typo">
                                <option value="">--- Filter By ---</option>
                                <option value="Title"> Title </option>
                                <option value="ISBN"> ISBN </option>
                                <option value="AuthorName"> Author Name </option>
                                <option value="CategoryName"> Category Name </option>
                        </select>

                        <input class="user_filter_typo_input" name="user_filter_typo_input" type="text">

                        <button id="filter_typo_search" name="filter_typo_search" class="filter_search_btn2">Filter</button>
                </form>

        <div class="bodyContainer01ViewBook" id="bodyContainer01ViewBook">
                
                <div class="bodyContainerViewBook">


                        <?php if ($rows) : ?>
                                <table class="user_table">

                                        <tr>
                                                <th>Title</th>
                                                <th>ISBN</th>
                                                <th>Edition</th>
                                                <th>NoPages</th>
                                                <th>Language</th>
                                                <th>Published Year</th>
                                                <th>Publisher</th>
                                                <th>Received Date</th>
                                                <th>Add Staff ID</th>
                                                <th>Vendor Name</th>
                                                <th>Donor Name</th>
                                                <th>Author Name</th>
                                                <th>Add Date</th>
                                                <th>Book Condtion</th>
                                                <th>Category Name</th>
                                                <th>Inventory Status</th>
                                                <th>Comments</th>
                                                <th>Class</th>
                                                <th>Location</th>
                                                <th>Lending Category</th>
                                                <th>No of Copies</th>
                                                <th>No of Available Copies</th>
                                                <th>Actions</th>
                                        </tr>
                                        <?php foreach ($rows as $row) : ?>
                                                <tr>
                                                        <td>
                                                                <a href='<?= ROOT ?>/books/viewSpecific/<?= $row->BookID ?>"' class='bookTitleTable'> <?= $row->Title ?></a>
                                                        </td>
                                                        <td>
                                                                <?= $row->ISBN ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Edition ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->NoPages ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Language ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->PublishedYear ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Publisher ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->ReceivedDate ?>
                                                        </td>

                                                        <!-- Getting user name when gives id, this should -->
                                                        <td>
                                                                <?= get_staff_name('StaffID', $row->AddStaffID) ?>
                                                        </td>
                                                        <td>
                                                                <?= get_VendorName("VendorID", $row->VendorID) ?>
                                                        </td>
                                                        <td>
                                                                <?= get_DonorName("DonorID", $row->DonorID) ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->AuthorName ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->AddDate ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->BookCondition ?>
                                                        </td>
                                                        
                                                        <td>
                                                                <?= get_CategoryName("CategoryID", $row->Category) ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->InventoryCondition ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Comments ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Class ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->Location ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->LendingCategory ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->NoCopies ?>
                                                        </td>
                                                        <td>
                                                                <?= $row->AvailableCopies ?>
                                                        </td>
                                                        <td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a href='<?= ROOT ?>/books/edit/<?= $row->BookID ?>'>
                                                                                Edit</a></button>

                                                                <button type='button' class='deletebtn' id='deletebtn' onclick='openDelete1Popup(<?= $row->BookID ?>)'><i class='fa-solid fa-trash'></i>&nbsp;Delete</button>

                                                        </td>

                                                </tr>

                                        <?php endforeach; ?>
                                </table>

                        <?php else : ?>
                                <div class="result_notfound_container">
                                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                                        <br>
                                        <h4 class="No_result">No results found</h4>
                                        <br>
                                        <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching
                                                again!</h5>
                                </div>
                        <?php endif; ?>
                </div>

                <div class="pagination_container_book">
                        <!-- <button class="nav_pag_btn1" onclick="prevPag()" ><i class="fa-solid fa-chevron-left"></i>Prev</button> -->
                        <ul>
                                <li class="pag_link"><a href="<?= ROOT ?>/books/viewbooks?page=<?= $page_numbers['first_page_no'] ?>"><i class="fa-solid fa-chevron-left"></i>&nbsp;&nbsp;First</a></li>
                                <?php if ($page_numbers['previous_page_no']) : ?>
                                        <li class="pag_link"><a href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['previous_page_no'] ?>">Prev</a>
                                        </li>
                                <?php else : ?>
                                        <li class="pag_link">Prev</li>
                                <?php endif; ?>

                                <li class="pag_link">Page
                                        <?= $page_numbers['current_page_no'] ?> of
                                        <?= $page_numbers['last_page_no'] ?>
                                </li>

                                <?php if ($page_numbers['next_page_no']) : ?>
                                        <li class="pag_link"><a href="<?= ROOT ?>/books/viewbooks?page=<?= $page_numbers['next_page_no'] ?>">Next</a>
                                        </li>
                                <?php else : ?>
                                        <li class="pag_link">Next</li>
                                <?php endif; ?>
                                <li class="pag_link"><a href="<?= ROOT ?>/books/viewbooks?page=<?= $page_numbers['last_page_no'] ?>">Last&nbsp;&nbsp;<i class="fa-solid fa-chevron-right"></i></a></li>


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


        </div>

        <?php include('../private/views/includes/popup.delete2.view.php'); ?>

        <?php include('../private/views/includes/popup.delete1.view.php'); ?>

        <?php include('../private/views/includes/footer.view.php'); ?>
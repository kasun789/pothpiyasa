<?php include('../private/views/includes/header.view.php'); ?>

<p class="operation">Damaged Books Report</p>
</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- body -->


<form method="POST">

    <select class="issue_user_filter_typo" id="user_filter_typo" class="user_filter_typo" name="issue_user_filter_typo">
        <option value="">--- Filter By ---</option>
        <option value="BookID">--- Filter By Book ID ---</option>
        <option value="ISBN">--- Filter By ISBN ---</option>
        <option value="Title">--- Filter By Book Title ---</option>
    </select>

    <input class="issue_user_filter_typo_input" name="issue_user_filter_typo_input" type="text">


    <button id="issue_filter_typo_search" name="issue_filter_typo_search"
        class="issue_filter_search_btn2">Filter</button>

    <?php

        $string = json_encode($rows);
        $url = urlencode($string);

    ?>




    <a href="<?= ROOT ?>/Make_pdf/damage_report/<?= $url ?>">
        <button type="button" id="issue_download" name="download" class="issue_download_btn">
            Download
        </button>
    </a>


</form>

<div class="damaged_container_view">


    <?php if ($rows): ?>
    <table class="user_table">
        <tr>
            <th>Book ID</th>
            <th>ISBN</th>
            <th>Book Title</th>
            <th>Author(S)</th>
            <th>Edition</th>
            <th>Language</th>
            <th>Publisher</th>
            <th>Received Date</th>


        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td>
                <?= $row->BookID ?>
            </td>
            <td>
                <?= $row->ISBN ?>
            </td>
            <td>
                <?= $row->Title ?>
            </td>
            <td>
                <?= $row->AuthorName?>
            </td>
            <td>
                <?= $row->Edition ?>
            </td>
            <td>
                <?= $row->Language ?>
            </td>
            <td>
                <?= $row->Publisher ?>
            </td>
            <td>
                <?= $row->ReceivedDate ?>
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

    <div class="pagination_container">
        <!-- <button class="nav_pag_btn1" onclick="prevPag()" ><i class="fa-solid fa-chevron-left"></i>Prev</button> -->
        <ul>
            <li class="pag_link"><a
                    href="<?= ROOT ?>/reports/damaged_books?page=<?= $page_numbers['first_page_no'] ?>"><i
                        class="fa-solid fa-chevron-left"></i>&nbsp;&nbsp;First</a></li>
            <?php if ($page_numbers['previous_page_no']): ?>
            <li class="pag_link"><a
                    href="<?= ROOT ?>/reports/damaged_books?page=<?= $page_numbers['previous_page_no'] ?>">Prev</a>
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
                    href="<?= ROOT ?>/reports/damaged_books?page=<?= $page_numbers['next_page_no'] ?>">Next</a>
            </li>
            <?php else: ?>
            <li class="pag_link">Next</li>
            <?php endif; ?>
            <li class="pag_link"><a
                    href="<?= ROOT ?>/reports/damaged_books?page=<?= $page_numbers['last_page_no'] ?>">Last&nbsp;&nbsp;<i
                        class="fa-solid fa-chevron-right"></i></a></li>


        </ul>
        <!-- <button class="nav_pag_btn2" onclick="nextPag()" >Next<i class="fa-solid fa-chevron-right"></i></button> -->
    </div>

    <form method="POST" id="go_to_page" class="go_to_page">
        <label for="go_to_page">Go to page</label>

        <input type="text" name="go_to_page">
        <button type="submit" name="page_search_button">Go<i class="fa-solid fa-chevron-right"></i></button>


    </form>


    <button class="report_backbtn"><a href="<?= ROOT ?>/reports">Back</a></button>

</div>


<?php include('../private/views/includes/footer.view.php'); ?>
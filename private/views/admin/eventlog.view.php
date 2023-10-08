<?php include('../private/views/includes/header.view.php'); ?>


<p class="operation">Event Log</p>

</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- body -->

<form method="POST">

        <label for="from_date" class="from_date_label">From</label>
        <input type="date" name="from_date" class="from_date" required>

        <label for="to_date" class="to_date_label">To</label>
        <input type="date" name="to_date" class="to_date" required>


        <!-- <button id="logevents_filter_date_search" name="logevents_filter_date_search" class="filter_search_btn1"
                onclick="pagination_hide()">Search</button> -->

        <select class="logevents_filter_typo" id="logevents_filter_typo" class="logevents_filter_typo"
                name="logevents_filter_typo" required>
                <option value="">--- Filter By ---</option>
                <option value="UserID">--- Filter By Patron ID ---</option>
                <option value="UserName">--- Filter By Patron Name ---</option>
                <option value="MemberType">--- Filter By Patron Type ---</option>
                <option value="Event">--- Filter By Event ---</option>
        </select>

        <input class="logevents_filter_typo_input" name="logevents_filter_typo_input" type="text">

        <button id="filter_typo_search" name="filter_typo_search" class="logevents_filter_search_btn2"
                onclick="pagination_hide()">Filter</button>
</form>

<div class="logevents_container_view">

        <?php if ($rows): ?>
                <table class="logevents_table">
                        <tr>
                                <th>Patron ID</th>
                                <th>Patron Name</th>
                                <th>Patron Type</th>
                                <th>Event</th>
                                <th>Date/Time</th>
                        </tr>
                        <?php foreach ($rows as $row): ?>
                                <tr>
                                        <td>
                                                <?= $row->UserID ?>
                                        </td>
                                        <td>
                                                <?= $row->UserName ?>
                                        </td>
                                        <td>
                                                <?= $row->MemberType ?>
                                        </td>
                                        <td>
                                                <?= $row->Event ?>
                                        </td>
                                        <td>
                                                <?= $row->Date ?>
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

        <div class="pagination_container_eventlog" id="pagination_container_eventlog">
                <!-- <button class="nav_pag_btn1" onclick="prevPag()" ><i class="fa-solid fa-chevron-left"></i>Prev</button> -->
                <ul>
                        <li class="pag_link"><a
                                        href="<?= ROOT ?>/eventlogs?page=<?= $page_numbers['first_page_no'] ?>"><i
                                                class="fa-solid fa-chevron-left"></i>&nbsp;&nbsp;First</a></li>
                        <?php if ($page_numbers['previous_page_no']): ?>
                                <li class="pag_link"><a
                                                href="<?= ROOT ?>/eventlogs?page=<?= $page_numbers['previous_page_no'] ?>">Prev</a>
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
                                                href="<?= ROOT ?>/eventlogs?page=<?= $page_numbers['next_page_no'] ?>">Next</a>
                                </li>
                        <?php else: ?>
                                <li class="pag_link">Next</li>
                        <?php endif; ?>
                        <li class="pag_link"><a
                                        href="<?= ROOT ?>/eventlogs?page=<?= $page_numbers['last_page_no'] ?>">Last&nbsp;&nbsp;<i
                                                class="fa-solid fa-chevron-right"></i></a></li>


                </ul>
                <!-- <button class="nav_pag_btn2" onclick="nextPag()" >Next<i class="fa-solid fa-chevron-right"></i></button> -->
        </div>

        <form method="POST" id="go_to_page_eventlog" class="go_to_page_eventlog">
                <label for="go_to_page">Go to page</label>

                <input type="text" name="go_to_page">
                <button type="submit" name="page_search_button">Go<i class="fa-solid fa-chevron-right"></i></button>
                <!-- <button type="submit" name="page_search_button" ><a href="<?= ROOT ?>/users/viewusers?page=<?= $page_numbers['search_page_no'] ?>">Go<i class="fa-solid fa-chevron-right"></i></a></button> -->

                <!-- <input type="submit" name="page_search_button" value="Go" > -->
                </>


        </form>

</div>


<?php include('../private/views/includes/footer.view.php'); ?>
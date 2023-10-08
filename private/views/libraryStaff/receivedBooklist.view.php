<?php include('../private/views/libraryStaff/includes/header.main.view.php'); ?>

<body>
        <div class="header">
                <p class="operation">Received BookList</p>
                <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
        </div>
        <!-- notification view -->
        <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>


        <!-- navigation bar -->


        <?php
        include('../private/views/libraryStaff/includes/nav.view.php');
        ?>

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

        <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
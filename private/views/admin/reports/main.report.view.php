<?php include('../private/views/includes/header.view.php'); ?>

        <p class="operation">Reports</p>
        
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?>

    <div class="report_container">
        <div class="report">

            <a href='<?= ROOT ?>/reports/issued_books'>
                <div class="outside_box">
                    <h3>Issued Books</h3>
                </div>
            </a>


            <a href='<?= ROOT ?>/reports/returned_books'>
                <div class="outside_box">
                    <h3>Returned Books</h3>
                </div>
            </a>

            <a href='<?= ROOT ?>/reports/withdrawn_books'>
                <div class="outside_box">
                    <h3>Withdrawn Books</h3>
                </div>
            </a>


            <a href='<?= ROOT ?>/reports/lost_books'>
                <div class="outside_box">
                    <h3>Lost Books</h3>
                </div>
            </a>



            <a href='<?= ROOT ?>/reports/damaged_books'>
                <div class="outside_box">
                    <h3>Damaged Books</h3>
                </div>
            </a>


            <a href='<?= ROOT ?>/reports/fine_report'>
                <div class="outside_box">
                    <h3>Fine Report</h3>
                </div>
            </a>

            <a href='<?= ROOT ?>/reports/fine_payment'>
                <div class="outside_box">
                    <h3>Fine Payment</h3>
                </div>
            </a>


            <a href='#' onclick ='d_v_popup()' >
                <div class="outside_box"  >
                    <h3>Donors/Vendors</h3>
                </div>
            </a>

        
            <a href='<?= ROOT ?>/reports/inventory_report'>
                <div class="outside_box">
                    <h3>Inventory Report</h3>
                </div>
            </a>

            <!-- Donor Vendor buttons -->

            <a href='<?= ROOT ?>/reports/donors'>
                <div class="outside_box dv_button1" id ="d_v1">
                    <h3>Donor Report</h3>
                </div>
            </a>

            <a href='<?= ROOT ?>/reports/vendors'>
                <div class="outside_box dv_button2" id ="d_v2">
                    <h3>Vendor Report</h3>
                </div>
            </a>



            <button class="main_reportbackbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>

        </div>



        <?php include('../private/views/includes/footer.view.php'); ?>
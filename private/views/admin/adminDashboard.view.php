<?php 
include('../private/views/includes/header.view.php'); ?>

        <p class="operation">Dashboard</p>
        
</div>

<!-- navigation bar -->

<?php 
 include('../private/views/includes/nav.view.php'); ?>

<!-- notification view -->
<?php 
 include('../private/views/includes/notification.view.php'); ?>

<!-- body -->
<div class="adminDashboard_analytics">

    <div class="con3">
        <h1 class="overallAnalytics">Analytics Dashboard</h1>
    </div>

    <!-- display the overol information -->
    <table class="overolInfo_admin">
        <tr>
            <td class="totalBooks">Total Books</td>
            <td class="totalBookValues">
                <?= $rows['totalBooks'] ?>

            </td>
        </tr>
        <tr>
            <td class="totalPatron">Total Patrons</td>
            <td class="totalPatronsValue">
                <?= $rows['totalUsers'] ?>


            </td>
        </tr>
        <tr>
            <td class="borrowedBooks">Today's Total Patrons</td>
            <td class="totalBorrowValue">
                <?= $rows['totaTodaylUsers'] ?>


            </td>
        </tr>
        <tr>
            <td class="damegedBooks">Today's Total Issue Books</td>
            <td class="totalDamegedValue">
                <?= $rows['totaTodaylBooks'] ?>


            </td>
        </tr>
    </table>
    <img src="<?= ROOT ?>/img/admin/others/dashboard_img.jpg" alt="" srcset="" class="dashboard_img">

</div>

<div class="adminDashboard_analytics_charts">

    <!-- <img src="<?= ROOT ?>/img/admin/others/admin_report.png" alt=""> -->
    <div class="chart1">
        <canvas id="chartLineView"></canvas>
    </div>

    <!-- put chartjs cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
                $noUsers =array_values(get_userAddingDates()) ;
                $label = array_keys(get_userAddingDates());
                
                ?>

    <!-- setup the graphs -->
    <script>
    const patrons = <?php print_r(json_encode($noUsers)) ?>;
    const labels = <?php print_r(json_encode($label)) ?>;
    </script>
</div>

<!-- Calendar -->
<?php include('../private/views/includes/calendar.view.php'); ?>

<!-- Online Users -->
<?php include('../private/views/includes/onlineUsers.view.php'); ?>



<?php include('../private/views/includes/footer.view.php'); ?>
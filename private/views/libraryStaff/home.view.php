<?php include('../private/views/libraryStaff/includes/header.main.view.php'); ?>

<body>
      <div class="header">
            <p class="operation">Dashboard</p>
            <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
      </div>

      <!-- navigation bar -->

      <?php include('../private/views/libraryStaff/includes/nav.view.php'); ?>

      <!-- notification view -->
      <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>


      <div class="dashContainer1">
            <div class="con1">
                  <h1 class="overallAnalytics">Overall Analytics</h1>
            </div>
            <?php if ($rows): ?>
                  <?php
                  $values[0] = $rows['twbooks'];
                  $values[1] = $rows['noIssue'];
                  $values[2] = $rows['dbooks'];
                  $values[3] = $rows['wbooks'];

                  $labels[0] = 'TW Books';
                  $labels[1] = 'Borrowed Books';
                  $labels[2] = 'Damage Books';
                  $labels[3] = 'Withdrawal Books';

                  $categories = array();
                  $totalBooks = array();

                  for ($i = 0; $i < sizeof($rows['categories']); $i++) {
                        $categories[$i] = $rows['categories'][$i]->Name;
                        $totalBooks[$i] = get_bookCount('Category', get_categoryID('Name', $rows['categories'][$i]->Name));
                        $issueBookSt[$i] = get_issueBookStatus('Category', get_categoryID('Name', $rows['categories'][$i]->Name));
                        $twBooks[$i] = get_TWBooks('Category', get_categoryID('Name', $rows['categories'][$i]->Name));
                  }

                  ?>

                  <!-- display the overol information -->
                  <table class="overolInfo">
                        <tr>
                              <td class="totalBooks">Total Books</td>
                              <td class="totalBookValues">
                                    <?= $rows['noBooks'] ?>
                              </td>
                        </tr>
                        <tr>
                              <td class="totalPatron">Total Patrons</td>
                              <td class="totalPatronsValue">
                                    <?= $rows['noUsers'] ?>
                              </td>
                        </tr>
                        <tr>
                              <td class="borrowedBooks">Borrowed Books</td>
                              <td class="totalBorrowValue">
                                    <?= $rows['noIssue'] ?>
                              </td>
                        </tr>
                        <tr>
                              <td class="damegedBooks">Damaged Books</td>
                              <td class="totalDamegedValue">
                                    <?= $rows['dbooks'] ?>
                              </td>
                        </tr>
                  </table>
                  <img src="<?= ROOT ?>/img/image02.jpg" alt="" srcset="" class="img01">
            <?php endif ?>
      </div>


      </div>
      <div class="dashContainer2">
            <div class="con2">
                  <h1 class="overallAnalytics">Book Analytics</h1>
            </div>
            <div class="chart">
                  <canvas id="chartView"></canvas>

            </div>
            <br>
            <div class="color1" id="color1"></div>
            <div class="color2" id="color2"></div>
            <div class="color3" id="color3"></div>
            <div class="color4" id="color4"></div>
            <p class="label1"></p>
            <p class="label2"></p>
            <p class="label3"></p>
            <p class="label4"></p>
      </div>

      <div class="dashContainer4">
            <div class="con3">
                  <h1 class="overallAnalytics">Inventory Analytics</h1>
            </div>
            <div class="chart1">
                  <canvas id="chartLineView"></canvas>
            </div>
            <!-- <div class="color4" id="color4"></div>
    <div class="color5" id="color5"></div>
    <div class="color6" id="color6"></div>
    <span class="label4"></span>
    <span class="label5"></span>
    <span class="label6"></span> -->
      </div>
      

      <div class="dashContainer3" id="dashContainer3">
            <p class="onlineUsersTitle01">Online Users</p>
            <p class="onlineUsersTitle02">7 Online Users [last 5 minutes]</p>
            <hr>

            <img src="<?= ROOT ?>/img/onlineUsers.png" alt="" srcset="" class="image02">
      </div>

      <!-- Calendar -->
      <?php include('../private/views/includes/calendar.view.php'); ?>

      <div class="onlineUserButton">
                  <img src="<?= ROOT ?>/img/onlineUser.png" alt="" srcset="" id="onlineUserButton">
      </div>
            <!-- online user -->
            <?php include('../private/views/librarian/includes/onlineUsers.view.php'); ?>

      <!-- put chartjs cdn -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <!-- setup the graphs -->
      <script>
            const marks = <?php print_r(json_encode($values)) ?>;
            const labels = <?php print_r(json_encode($labels)) ?>;
            const categories = <?php print_r(json_encode($categories)) ?>;
            const totalBook = <?php print_r(json_encode($totalBooks)) ?>;
            const issueBook = <?php print_r(json_encode($issueBookSt)) ?>;
            const twBook = <?php print_r(json_encode($twBooks)) ?>;
      </script>
      <script src="<?= ROOT ?>/js/libraryStaff/dashboard.js"></script>

      <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
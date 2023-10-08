<div class="navigation">
    <img src="<?= ROOT ?>/img/logo2.png" alt="" class="logo">
    <!-- <i class="fa-solid fa-bars" id="navIcon"></i> -->

    <!-- dashbord -->

    <div class="navigationLabels">


        <div class="toggelBar" id="toggelBar"></div>


        <div class="dashboard_nav" id="dashboard_nav">

            <div class="dashbordIconBack" id="dashbordIconBack"></div>
            <i class="fa-solid fa-house-chimney" id="dashbordIcon"></i>
            <p class="dashbordLabel" id="dashbordLabel"><a href="<?= ROOT ?>/AdminDashboard">Dashboard</a></p>
        </div>


        <!-- account -->

        <div class="account_nav" id="account_nav">

            <div class="accountIconBack" id="accountIconBack"></div>
            <i class="fa-regular fa-id-card" id="accountIcon"></i>
            <p class="accountLabel" id="accountLabel"><a href="#">Account</a></p>
            <i class="fas fa-chevron-circle-right" id="toggleArrow1"></i>

            <div class="accountlist" id="accountlist">
                <ul>
                    <!-- Here gives path to the controller, from controller partcular view call -->
                    <li class="editProfile" ><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">Profile</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/books/searchbookUsers" >Search Book</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>" >My Reservation</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>" >My History</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>" >My Loans</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/requestbooks" >Request Book</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/receivedBookList ">Requested Book List</a></li>


                </ul>
            </div>
        </div>


        <!-- book -->

        <div class="book_nav" id="book_nav">
            <div class="bookIconBack" id="bookIconBack"></div>
            <i class="fa-solid fa-book" id="bookIcon"></i>
            <p class="bookLabel" id="bookLabel"><a href="#">Book</a></p>
            <i class="fas fa-chevron-circle-right" id="toggleArrow2"></i>

            <!-- Book Side Pannel -->

            <div class="booklist" id="booklist">
                <ul>
                    <li class="addBook"><a href="<?= ROOT ?>/books/add">Add Book</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/books">View Book</a></li>
                </ul>
            </div>

        </div>

        <!-- member -->

        <div class="member_nav" id="member_nav">
            <div class="memberIconBack" id="memberIconBack"></div>
            <i class="fa-solid fa-address-book" id="memberIcon"></i>
            <p class="memberLabel" id="memberLabel"><a href="#">Patron</a></p>
            <i class="fas fa-chevron-circle-right" id="toggleArrow3"></i>

            <!-- Member Side Pannel -->

            <div class="memberlist" id="memberlist">
                <ul>
                    <!-- Here gives path to the controller, from controller partcular view call -->
                    <li class="addmember"><a href="<?= ROOT ?>/users/add">Add Patron</a></li>
                    <li class="addmember"><a href="<?= ROOT ?>/users/viewusers">View Patron</a></li>
                    <li class="addmember"><a href="<?= ROOT ?>/BulkAdd/student_add">Bulk Student Add</a></li>
                    <li class="addmember"><a href="<?= ROOT ?>/BulkAdd/lecturer_add">Bulk Lecturer Add</a></li>
                    <li class="addmember"><a href="<?= ROOT ?>/BulkAdd/nonacademic_add">Bulk Non-Academic Add</a></li>

                </ul>
            </div>
        </div>


        <!-- circulation -->

        <div class="circulation_nav" id="circulation_nav">
            <div class="circulationIconBack" id="circulationIconBack"></div>
            <i class="fa-sharp fa-solid fa-paste" id="circulationIcon"></i>
            <p class="circulationLabel" id="circulationLabel"><a href="<?= ROOT ?>/books/circulation">Circulation</a></p>
            <!-- <i class="fas fa-chevron-circle-right" id="toggleArrow4"></i> -->
        </div>



        <!-- Book Category -->

        <!-- <div class="bookCategory_nav" id="bookCategory_nav">
            <div class="bookCategoryIconBack" id="bookCategoryIconBack"></div>
            <i class="fa-sharp fa-solid fa-swatchbook" id="bookCategoryIcon"></i>
            <p class="bookCategoryLabel" id="bookCategoryLabel"><a href="#">Book Category</a></p>
            <i class="fas fa-chevron-circle-right" id="toggleArrow5"></i>
        </div> -->


        <!-- inventory -->

        <div class="inventory_nav" id="inventory_nav">
            <div class="inventoryIconBack" id="inventoryIconBack"></div>
            <i class="fa-sharp fa-solid fa-warehouse" id="inventoryIcon"></i>
            <p class="inventoryLabel" id="inventoryLabel"><a href="<?= ROOT ?>/books/checkBook">Inventory</a></p>
            <!-- <i class="fas fa-chevron-circle-right" id="toggleArrow6"></i> -->
        </div>


        <!-- author -->

        <div class="report_nav" id="report_nav">
            <div class="reportIconBack" id="reportIconBack"></div>
            <i class="fa-sharp fa-solid fa-paste" id="reportIcon"></i>
            <p class="reportLabel" id="reportLabel"><a href="<?= ROOT ?>/reports">Reports</a></p>
            <!-- <i class="fas fa-chevron-circle-right" id="toggleArrow7"></i> -->
        </div>

        <div class="holiday_nav" id="holiday_nav">
            <div class="holidayIconBack" id="holidayIconBack"></div>
            <i class="fa-solid fa-calendar-days" id="holidayIcon"></i>
            <i class="fa-sharp fa-solid fa-paste" ></i>
            <p class="holidayLabel" id="holidayLabel"><a href="<?= ROOT ?>/holidays">Holidays</a></p>
            <!-- <i class="fas fa-chevron-circle-right" id="toggleArrow8"></i> -->
        </div>

        <div class="event_nav" id="event_nav">
            <div class="eventIconBack" id="eventIconBack"></div>
            <i class="fa-solid fa-clipboard-list" id="eventIcon"></i>
            <p class="eventLabel" id="eventLabel"><a href="<?= ROOT ?>/eventlogs">Log Events</a></p>
            <!-- <i class="fas fa-chevron-circle-right" id="toggleArrow9"></i> -->
        </div>

        <!-- admin task -->

        <div class="admin_nav" id="admin_nav">
            <div class="adminTaskIconBack" id="adminTaskIconBack"></div>
            <i class="fas fa-cog" id="adminTaskIcon"></i>
            <i class="fas fa-chevron-circle-right" id="toggleArrow10"></i>
            <p class="adminTaskLabel" id="adminTaskLabel"><a href="#">Administration</a></p>

            <div class="adminlist" id="adminlist">
                <ul>
                    <!-- <li class="getReports"><a href="<?= ROOT ?>/reports">Get Reports</a></li> -->
                    <!-- <li class="getReports"><a href="<?= ROOT ?>/holidays">Holidays</a></li> -->
                    <li class="getReports"><a href="<?= ROOT ?>/BookCategories/add">Define Category</a></li>
                    <!-- <li class="getReports"><a href="<?= ROOT ?>/eventlogs">Event Log</a></li> -->
                    <li class="getReports"><a href="<?= ROOT ?>/configSettings/fineSettings">Fine Calculation Settings</a></li>
                    <!-- <li class="getReports"><a href="#">Backups</a></li> -->
                    <li class="getReports"><a href="<?= ROOT ?>/configSettings/privilegeSettings">User Privilege Settings</a></li>


                </ul>
                <!-- <p class="addBook">Add Book</p>
                    <p class="viewBook">View Book</p> -->
            </div>
        </div>

        <p class="logout"><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></p>



    </div>
</div>
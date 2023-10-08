<div class="navigation">
    <img src="<?= ROOT ?>/img/logo2.png" alt="" class="logo">

    <!-- dashbord -->

    <div class="navigationLabels">

        <div class="toggelBar" id="toggelBar"></div>

        <div class="dashboard_nav" id="dashboard_nav">
            <div class="dashbordIconBack" id="dashbordIconBack"></div>
            <i class="fa-solid fa-house-chimney" id="dashbordIcon"></i>
            <p class="dashbordLabel" id="dashbordLabel"><a href="<?= ROOT ?>/librariandashboard">Dashboard</a></p>
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
                    <li class="editProfile"><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">Profile</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My Reservation</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>
                    <li class="editProfile"><a href="<?= ROOT ?>/users/requestbooks ">Request Book</a></li>
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
                    <li class="addBook"><a href="<?= ROOT ?>/books/add" id="addbook">Add Book</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/books/viewBook?page=1">View Book</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/books/issueBook">Issue Book</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/books/viewReturnFrontPage">Return Book</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/books/sendBookList">Send Requested Booklist</a></li>
                    <li class="addBook"><a href="<?= ROOT ?>/BulkAdd/reservation_booklist_add">Publish Received Booklist</a></li>

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
                    <li class="addmember"><a href="<?= ROOT ?>/users">View Patron</a></li>
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
        <div class="administration_nav" id="administration_nav">
            <div class="bookCategoryIconBack" id="bookCategoryIconBack"></div>
            <i class="fa-sharp fa-solid fa-swatchbook" id="bookCategoryIcon"></i>
            <p class="bookCategoryLabel" id="bookCategoryLabel"><a href="#">Administration</a></p>
            <i class="fas fa-chevron-circle-right" id="toggleArrow5"></i>
            <div class="categorylist" id="categorylist">
                <ul>
                    <li class="addcategory"><a href="<?= ROOT ?>/bookcategories/add">Define Categories</a></li>

                </ul>

            </div>
        </div>


        <!-- inventory -->
        <div class="inventory_nav" id="inventory_nav">
            <div class="inventoryIconBack" id="inventoryIconBack"></div>
            <i class="fa-sharp fa-solid fa-warehouse" id="inventoryIcon"></i>
            <p class="inventoryLabel" id="inventoryLabel"><a href="<?= ROOT ?>/books/checkBook">Inventory</a></p>
        </div>
        

        <p class="logout"><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></p>



    </div>
</div>
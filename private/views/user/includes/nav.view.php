<div class="navigation">
    <img src="<?= ROOT ?>/img/logo2.png" alt="" class="logo">


    <!-- dashbord -->

    <div class="navigationLabels">

        <div class="toggelBar" id="toggelBar"></div>
        
        <div class="dashboard_nav" id="dashboard_nav">
            <div class="dashbordIconBack" id="dashbordIconBack"></div>
            <i class="fa-solid fa-house-chimney" id="dashbordIcon"></i>
            <p class="dashbordLabel" id="dashbordLabel"><a href="<?= ROOT ?>/userdashboard/home">Dashboard</a></p>
        </div>

        <!-- profile -->
        <div class="profile_nav" id="profile_nav">
            <div class="profileIconBack" id="profileIconBack"></div>
            <i class="fa-regular fa-id-card" id="profileIcon"></i>
            <p class="profileLabel" id="profileLabel"><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>">Profile</a></p>
        </div>

        <!-- Search book -->
        <div class="book_nav" id="book_nav">
            <div class="bookIconBack" id="bookIconBack"></div>
            <i class="fa-solid fa-book" id="bookIcon"></i>
            <p class="bookLabel" id="bookLabel"><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></p>
        </div>

        <!-- Reservations -->
        <div class="reservation_nav" id="reservation_nav">
            <div class="reservationIconBack" id="reservationIconBack"></div>
            <i class="fa-solid fa-address-book" id="reservationIcon"></i>
            <p class="reservationLabel" id="reservationLabel"><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My Reservations</a></p>
        </div>

        <!-- Loans -->
        <div class="loan_nav" id="loan_nav">
            <div class="loansIconBack" id="loansIconBack"></div>
            <i class="fa-sharp fa-solid fa-paste" id="loansIcon"></i>
            <p class="loansLabel" id="loansLabel"><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></p>
        </div>

        <!-- History -->
        <div class="history_nav" id="history_nav">
            <div class="historyIconBack" id="historyIconBack"></div>
            <i class="fa-sharp fa-solid fa-swatchbook" id="historyIcon"></i>
            <p class="historyLabel" id="historyLabel"><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a></p>
        </div>

        <!-- Request Books -->
        <div class="requestBook_nav" id="requestBook_nav">
            <div class="requestbookIconBack" id="requestbookIconBack"></div>
            <i class="fa-sharp fa-solid fa-warehouse" id="requestbookIcon"></i>
            <p class="requestbookLabel" id="requestbookLabel"><a href="<?= ROOT ?>/users/requestbooks">Request Books</a></p>
        </div>

        <!-- received Book -->
        <div class="receivedbook_nav" id="receivedbook_nav">
            <div class="receivedbookIconBack" id="receivedbookIconBack"></div>
            <i class="fa-sharp fa-solid fa-warehouse" id="receivedbookIcon"></i>
            <p class="receivedbookLabel" id="receivedbookLabel"><a href="<?= ROOT ?>/users/receivedBookList">Requested Book List</a></p>
        </div>

        <p class="logout"><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></p>




    </div>
</div>
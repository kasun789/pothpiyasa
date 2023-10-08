<div class="notificationIconBack"></div>
<i class="fa-solid fa-bell" id="notificationIcon" onclick="showNotification()"></i>
<div class="profile">
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
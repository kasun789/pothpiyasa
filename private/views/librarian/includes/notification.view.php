<?php
    $notification = new Notification();
    $userID = Auth::profileID();
    $current_date = date('Y-m-d');
    $quary = "SELECT `userID`, `notification`, `DateTime` FROM `notification`WHERE `userID` = {$userID} AND DATE(`DateTime`) = '"."$current_date'";
    $quary2 = "SELECT * FROM `notification` WHERE userID ={$userID} AND Seen = 'Unseen'";
    $notifyRows = $notification->query($quary);
    $notifyRows2 = $notification->query($quary2);

    ?>

    <?php if(!empty($notifyRows2)):?>
        <div class="notificationPoint" id="notificationPoint"><span class="notificationCount"><?=sizeof($notifyRows2)?></span></div>
    <?php else:?>
        <div class="notificationPointView" id="notificationPoint"></div>
    <?php endif?>

<div class="notificationContainer" id="notificationContainer">
    <div class="notificationMainDiv">
    <h4 class="notificationMainTopic">Notifications</h4>
    </div>
    
    <!-- <hr> -->
    <?php if(!empty($notifyRows)):?>
    <?php for ($i = 0; $i < sizeof($notifyRows); $i++) : ?>
        <div class="notificationLine">
            <ul>
                <li class="notificationBullet">
                    <h3 class="notificationTopic"><?= $notifyRows[$i]->notification ?></h3>

                    <!-- split time and date -->
                    <?php
                    $dateObj = new DateTime($notifyRows[$i]->DateTime);
                    $date = $dateObj->format('Y-m-d');
                    $time = $dateObj->format('H:i A');
                    ?>

                    <h6 class="notificationDate"><?= $date ?> at <?= $time ?></h6>
                    <?php if($notifyRows[$i]->notification == "Your book request has been sent to the main library"):?>
                    <i class="fa-solid fa-envelope" id="notificationIcons"></i>
                    <?php endif?>

                    <?php if($notifyRows[$i]->notification == "You have a Fine"):?>
                    <i class="fa-solid fa-money-check-dollar" id="notificationIcons"></i>
                    <?php endif?>

                    <?php if($notifyRows[$i]->notification == "Can get Your reserved Book"):?>
                    <i class="fa-solid fa-book-bookmark" id="notificationIcons"></i>
                    <?php endif?>

                    
                </li>
            </ul>

        </div>
        
    <?php endfor ?>
    <?php else:?>
        <i class="fa-solid fa-hourglass" id="emptyNotification"></i>
        <span class="NoNotification">No Notification</span>
    <?php endif?>

</div>
<?php include('../private/views/user/includes/header.view.php'); ?>

<body>
<div class="header">
        <p class="operation">Edit Profile</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        


<!-- navigation bar -->

<?php 
   include('../private/views/user/includes/nav.view.php');
 ?>

<!-- body -->

<div class="container_view_history">
               
       
        <button class="backbtnreservation"><a href="<?= ROOT ?>/userdashboard">Back</a></button>

 </div>


<?php include('../private/views/user/includes/footer.view.php'); ?>
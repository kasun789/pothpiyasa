<?php include('../private/views/includes/header.view.php'); ?>


        <p class="operation">Delete Patron</p>
        
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?>

    <!-- body -->

    <div class="bodyContainer01">


        <div class="bodyContainer02">


        </div>

    </div>

    <?php include('../private/views/includes/popup.delete2.view.php'); ?>
    


    <?php include('../private/views/includes/footer.view.php'); ?>

    <?php if($flag[0]==1){
    echo '<script type="text/javascript">openDeleteUserPopup("'.ROOT.'/users");</script>';
}?>
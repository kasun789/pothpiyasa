<?php include('../private/views/includes/header.view.php'); ?>

<p class="operation">Bulk Add</p>

</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- notification view -->
<?php include('../private/views/includes/notification.view.php'); ?>

<!-- body -->
<div class="bulkadd_container" id="bulkadd_container">
    <h1>Bulk Holiday Add To PothPiyasa Library</h1>
    <h3>Please follow the below instruction for bulk upload</h3>

    <div class="bulkadd_instruction_container">

        <ol>
            <li>The file should be XLS, CSV or XLSX file.</li>
            <li>The file should contains following field with giving order --> Holiday's[Holiday_title, Holiday_description, Holiday_start,
            Holiday_end].
                <br> <span>*Holiday_description & Holiday_end are not mandatory. You can leave them blank if you want. <br>*Date formats should be YYYY-MM-DD </span>
            </li>
        </ol>

        <button id="click_to_view_example_button" onclick="show_example_popup()">Click to view example</button>

        <div id="example_popup" class="example_popup">
            <img class="example_popup_img_holiday" src="<?= ROOT ?>/img/admin/others/bulkadd_example_holiday.png" alt=""
                srcset="">

        </div>

    </div>

    <div class="bulkadd_select_container">
        <h3>Select File to upload Bulk List</h3>

        <form method="POST" enctype="multipart/form-data">

            <input type="file" name="import_file" class="form-control" required />
            <br>
            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

        </form>
    </div>

</div>

<?php include('../private/views/includes/popup.bulkadd.view.php'); ?>

<!-- Error popup -->
<div class="container_popup" id="container_popup">
    <div class="bulkadderrorpopup" id="bulkadderrorpopup">
        <img src="<?= ROOT ?>/img/check.png">
        <h2>Unsuccessfull!</h2>
        <div class="errorBulkAddRegistrationNo">
            <?php if (isset($errors['Holiday_title'])): ?>
                <p>
                    <?= "*" . $errors['Holiday_title'] ?>
                </p>
            <?php endif; ?>
        </div>
        
        <div class="errorBulkAddFirstName">
            <?php if (isset($errors['Holiday_start'])): ?>
                <p>
                    <?= "*" . $errors['Holiday_start'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="errorBulkAddInvalidFile">
            <?php if (isset($errors['File'])): ?>
                <p>
                    <?= "*" . $errors['File'] ?>
                </p>
            <?php endif; ?>
        </div>
        <button type="button" onclick="closeBulkAddPopup()">OK</button>
    </div>
</div>


<?php include('../private/views/includes/footer.view.php'); ?>



<!-- set the popup msg -->
<?php if ($flag[0] == 1) {
    echo '<script type="text/javascript"> bulkAddPopup(); </script>';
} ?>

<?php
if (count($errors) != 0 && $flag[0] == 0) {
    echo '<script type="text/javascript"> bulkAddErrorPopup(); </script>';
} ?>
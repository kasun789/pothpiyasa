<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pothpiyasa</title>
  <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/viewBookCategory.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/circulation.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
  <link rel="stylesheet" href="<?=ROOT?>/css/admin/bulkadd.css">

</head>

<body>
  <div class="header">
    <p class="operation">Published Received Book List</p>
    <?php include('../private/views/librarian/includes/header.view.php'); ?>
  </div>

  <!-- navigation bar -->

  <?php
  include('../private/views/librarian/includes/nav.view.php');
  ?>

  <!-- notification view -->
  <?php include('../private/views/librarian/includes/notification.view.php'); ?>

<!-- body -->
<div class="bulkadd_container" id="bulkadd_container">
    <h1>Bulk Received Book List Add</h1>
    <h3>Please follow the below instruction for bulk upload</h3>

    <div class="bulkadd_instruction_container">

        <ol>
            <li>The file should be XLS, CSV or XLSX file.</li>
            <li>The file should contains following field with giving order --> ReceivedBookList's[BookTitle, AuthorName, Edition,
            PublishedYear].
                <br> <span>*Published year format should be YYYY</span>
            </li>
        </ol>

        <button id="click_to_view_example_button" onclick="show_example_popup()">Click to view example</button>

        <div id="example_popup" class="example_popup">
            <img class="example_popup_img_receivedbooklist" src="<?= ROOT ?>/img/admin/others/bulkadd_example_receivedbooklist.png" alt=""
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
            <?php if (isset($errors['BookTitle'])): ?>
                <p>
                    <?= "*" . $errors['BookTitle'] ?>
                </p>
            <?php endif; ?>
        </div>
        
        <div class="errorBulkAddFirstName">
            <?php if (isset($errors['AuthorName'])): ?>
                <p>
                    <?= "*" . $errors['AuthorName'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="errorBulkAddLastName">
            <?php if (isset($errors['Edition'])): ?>
                <p>
                    <?= "*" . $errors['Edition'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="errorBulkAddPhoneNo">
            <?php if (isset($errors['PublishedYear'])): ?>
                <p>
                    <?= "*" . $errors['PublishedYear'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="errorBulkAddEmail">
            <?php if (isset($errors['EmptyFile'])): ?>
                <p>
                    <?= "*" . $errors['EmptyFile'] ?>
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
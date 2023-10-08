<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/libraryStaff/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/checkBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/popupinventoryreset.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
</head>

<body>
    <div class="header">
        <p class="operation">Inventory</p>
        <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->
    <?php
    include('../private/views/libraryStaff/includes/nav.view.php'); ?>


    <!-- notification view -->
    <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>


    <div class="bodyContainer01">

        <div class="container_book_search">
            <h1>Inventory Book Check</h1>
            <h2>Please follow the below instruction for inventory check</h2>

            <div class="inventory_instruction_container">

                <ol>
                    <li>Choose book attribute from the drop menu (Type).</li>
                    <li>Type your search criteria in the search box (Detail) for particular book attribute.</li>
                    <li>Press the Search button.</li>

                </ol>

            </div>




            <button class="reset" id="reset" name="reset" onclick="openInventoryPopup()"><i class="fa-solid fa-arrow-rotate-right" id="reseticon"></i>&nbsp;Reset Inventory</button>


            <!-- form -->
            <div class="bodyContainer2" id="bodyContainer2">





                <form method="post" enctype="multipart/form-data" class="inventory_form">

                    <label for="tital" class="titalLabel">Access Number</label>

                    <?php if (isset($errors['Title'])): ?>

                        <input type="text" name="Title" class="tital" id="tital" value="<?= get_var('Title') ?>" required>
                        <div class="errorTitleMesg">
                            <p>
                                <?= "*" . $errors['Title'] ?>
                            </p>

                        </div>

                    <?php else: ?>
                        <input type="text" name="Title" class="tital" id="tital" value="" required>
                    <?php endif; ?>




                    <button class="inventory_addbookbtn" id="addbookbtn" name="submit" type="submit">Check</button>

                </form>
                <button class="inventory_backbtn"><a href="<?= ROOT ?>/librarystaffdashboard">Back</a></button>

            </div>





        </div>
        <!-- <img src="<?= ROOT ?>/img/requestbook1.png" id="imageinventory" alt="" srcset="" class="image"> -->




    </div>
    <?php
    include('../private/views/librarian/includes/popup.inventory.view.php'); ?>

    <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>
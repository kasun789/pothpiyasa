<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addlcategory.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/cpopup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    <style>
         .addcategorybtn4{
            position: absolute;
            width: 89px;
            height: 33px;
            left: 113px;
            top: 150px;
            color: white;
            background: #2E9FED;
            border-radius: 35px;
            border: 0;
            cursor: pointer;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 24px;
            text-align: center;
  }

 
    </style>
</head>

<body>
    <!-- <div class="header">
        <p class="operation">Lending Category</p>
        <?php 
        // include('../private/views/librarian/includes/header.view.php'); ?>
    </div> -->

    <!-- navigation bar -->

    <?php 
    // include('../private/views/includes/nav.view.php'); ?>

    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
    <!-- body -->

    <div class="bodyContainer01" id="contianerCategories">

        <div class="options">
            <ul>
                <li><a href="<?= ROOT ?>/bookcategories/add" class="">Book Category</a></li>
                <li><a href="<?= ROOT ?>/lendingcategories/add" class="active">Lending Category</a></li>
                <li><a href="" class="" id="PatronAttri" onmouseover="visible()">Patron Attributes</a>

                    <div class="drop_menu" id="drop_menu">

                        <ul>
                            <li><a href="<?= ROOT ?>/attributes/lectureradd" class="">Lecturer</a></li>
                            <li><a href="<?= ROOT ?>/attributes/studentadd" class="">Student</a></li>

                        </ul>

                    </div>


                </li>
            </ul>
        </div>


        <!-- form -->


        <div class="bodyContainer02" onmouseover="invisible()">





            <form id="myForm" method="post" enctype="multipart/form-data">
                <?php if ($row) : ?>
                    <div class="bodyContainer03">

                        <label for="BookCategoryName" class="BookCategoryNameLabel">LendingCategory Name</label>

                        <?php if (isset($errors['lendingCategoryName'])) : ?>
                            <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName" value="<?= $errorcontent[0] ?>" required>

                            <div class="errorbookCategoryName">
                                <p id="myParagraph">
                                    <?= "*" . $errors['lendingCategoryName'] ?>
                                </p>

                            </div>
                            <label for="Descriptionlable" class="Descriptionlable">Description</label>

                            <input type="text" name="Description" class="Description" id="Description" value="<?= $errorcontent[1] ?>" required>
                        <?php else : ?>
                            <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName" value="<?= get_var('Name', $row[0]->CategoryName) ?>" required>

                            <label for="Descriptionlable" class="Descriptionlable">Description</label>

                            <input type="text" name="Description" class="Description" id="Description" value="<?= get_var('Description', $row[0]->Description) ?>" required>
                        <?php endif; ?>
                        <button class="addcategorybtn4" name="lcedit" type="button" onclick="openLeditCategoryPopupView()">Edit</button>
                        <button type="button" class="backbtncatecagory1"><a href="<?= ROOT ?>/lendingcategories/add/">Back</a></button>

                    </div>
            </form>

            <script type="text/javascript">
                var id = '<?= $row[0]->LendingID ?>';
            </script>

            <div class="displaycategories" id="displaycategories">
                <?php

                    $lcategory = new LendingCategory();
                    $rows = $lcategory->findAll();

                ?>
                <?php if ($rows) : ?>


                    <table class="category_table" id="category_table">

                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Actions</th>

                        </tr>
                        <?php
                        $i = 0;
                        foreach ($rows as $row) :

                        ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $row->CategoryName ?></td>
                                <td><?= $row->Description ?></td>



                                <td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a class="a1" href='<?= ROOT ?>/lendingcategories/edit/<?= $row->LendingID ?>'>
                                            Edit</a></button>
                                    <button type='button' class='deletebtn' id='deletebtn' onclick="directDeleteCategoryDelete(<?= $row->LendingID ?>)"><i class='fa-solid fa-trash'></i>&nbsp;
                                            Delete</button>
                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </table>

                <?php endif; ?>
            <?php endif; ?>
            </div>


        </div>
    </div>






        <?php include('../private/views/librarian/includes/popup.ladd.view.php'); ?>
        <?php include('../private/views/librarian/includes/popup.ledit.view.php'); ?>
        <?php include('../private/views/librarian/includes/popup.ldelete.view.php'); ?>

        <script>
            const drop_menu = document.getElementById('drop_menu');

            function visible() {
                drop_menu.style.visibility = 'visible';
            }

            function invisible() {
                drop_menu.style.visibility = 'hidden';

            }
        </script>

<?php $this->view('librarian/includes/footer'); ?>
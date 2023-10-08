<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addCategory.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/cpopup.css">

    <style>
         .jkiuyo{
        /* position: absolute; */
        width: 89px;
        height: 33px;
        margin-left: 180px;
        margin-top: 120px;
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
    <div class="header">
        <p class="operation">Book Category</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?>


    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>

    <!-- body -->

    <div class="bodyContainer01" id="contianerCategories">

        <div class="options">
            <ul>
                <li><a href="<?= ROOT ?>/bookcategories/add" class="active">Book Category</a></li>
                <li><a href="<?= ROOT ?>/lendingcategories/add" class="">Lending Category</a></li>
                <li><a href="" class="" id="PatronAttri" onmouseover="visible()">Patron Attributes</a>
                    <!--  -->
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


        <!-- form -->


        <div class="bodyContainer02" onmouseover="invisible()">





            <form id="myForm" method="post" enctype="multipart/form-data">

                <div class="bodyContainer03">

                    <label for="BookCategoryName" class="BookCategoryNameLabel">BookCategory Name</label>

                    <?php if (isset($errors['bookCategoryName'])) : ?>
                        <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName" value="<?= $errorcontent[0] ?>" required>

                        <div class="errorbookCategoryName">

                            <p id="myParagraph">
                                <?= "*" . $errors['bookCategoryName'] ?>
                            </p>




                        </div>
                    <?php else : ?>
                        <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName" value="<?= get_var('Name') ?>" required>

                    <?php endif; ?>
                    <button class="jkiuyo" id="jkiuyo" name="jkiuyo" type="button" onclick="openAddCategoryPopup1()">Add New</button>
                    <!-- <button type="submit" name="bcadd" class="addbookcategorybutton">Add New</button> -->
                </div>

            </form>


            <div>


                <?php

                $category = new BookCategory();
                $rows = $category->findAll();

                ?>
                <?php if ($rows) : ?>


                    <table class="category_table" id="category_table">

                        <tr>
                            <th>No</th>
                            <th>Category Name</th>

                            <th>Actions</th>

                        </tr>
                        <?php
                        $i = 0;
                      

                        foreach ($rows as $row) :

                        ?>
                            <tr>
                                <td>
                                    <?= ++$i; ?>
                                </td>
                                <td>
                                    <?= $row->Name ?></a>
                                </td>



                                <td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a class="a1" href='<?= ROOT ?>/bookcategories/edit/<?= $row->CategoryID ?>'>
                                            Edit</a></button>
                                    <button type='button' class='deletebtn' id='deletebtn' onclick="openDeleteCategoryPopupView('<?= $row->CategoryID?>')"><i
                                            class='fa-solid fa-trash'></i>&nbsp;
                                            Delete</button>
                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </table>

                <?php endif; ?>
            </div>


        </div>
    </div>
    <?php include('../private/views/librarian/includes/popup.caddconfirmation.view.php'); ?>
    <?php include('../private/views/librarian/includes/popup.caddedSuccess.view.php'); ?>
    <?php include('../private/views/librarian/includes/popup.cdeleteconfirmation.view.php'); ?>

    <script>
        // const patronattribute=document.getElementById("PatronAttri");
        const drop_menu = document.getElementById('drop_menu');

        function visible() {
            drop_menu.style.visibility = 'visible';
        }

        function invisible() {
            drop_menu.style.visibility = 'hidden';

        }
    </script>

<?php include('../private/views/includes/footer.view.php'); ?>

    
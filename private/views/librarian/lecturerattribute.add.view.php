<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addlattributecategory.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/cpopup.css">

    <style>



    </style>
</head>

<body>
    <div class="header">
        <p class="operation">Patron Attributes</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->

    <?php
    $this->view('librarian/includes/nav');
    ?>

    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>

    <!-- body -->

    <div class="bodyContainer01" id="contianerCategories">



        <div class="options">
            <ul>
                <li><a href="<?= ROOT ?>/bookcategories/add" class="">Book Category</a></li>
                <li><a href="<?= ROOT ?>/lendingcategories/add" class="">Lending Category</a></li>
                <li><a href="" class="active" id="PatronAttri" onmouseover="visible()">Patron Attributes</a>

                    <div class="drop_menu" id="drop_menu">

                        <ul>
                            <li><a href="<?= ROOT ?>/attributes/lectureradd" class="active">Lecturer</a></li>
                            <li><a href="<?= ROOT ?>/attributes/studentadd" class="">Student</a></li>

                        </ul>

                    </div>


                </li>

            </ul>
        </div>


        <!-- form -->


        <div class="bodyContainer02" onmouseover="invisible()">





            <form id="myForm" method="post" enctype="multipart/form-data">

                <div class="bodyContainer03">

                    <label for="BookCategoryName" class="BookCategoryNameLabel">Name</label>

                    <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName" value="<?= get_var('Name') ?>">

                    <div class="errorbookCategoryName">
                        <?php if (isset($errors['bookCategoryName'])) : ?>

                            <p id="myParagraph">
                                <?= "*" . $errors['bookCategoryName'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <label for="Descriptionlable" class="Descriptionlable">Attribute</label>

                    <select id="Description" class="Description" name="Description" id="Description" value="<?= get_var('Description') ?>" required>

                        <option <?= get_select('Description', 'type') ?> value="type">Lec-Type</option>
                        <option <?= get_select('Description', 'subject') ?> value="subject">Lec-Subject</option>
                        <option <?= get_select('Description', 'department') ?> value="department">Lec-Department</option>




                        <?php //else: 
                        ?>
                        <!-- <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName"  value="" required>
                     <label for="Descriptionlable" class="Descriptionlable">Patron Category</label>

                        <select id="Description" class="Description" name="Description" id="Description" value="" required>
                        <option value="">--- Choose Category ---</option> -->
                        <?php
                        // $category = new PatronCategory();
                        // $data = $category->findAll();
                        // for ($i=0; $i < count($data); $i++) { 
                        //     echo "<option ". get_select('Description',$data[$i]->PatronCategoryID) . " value='".$data[$i]->PatronCategoryID."'" .">".$data[$i]->Name."</option>"; 
                        // }

                        ?>





                    </select>

                    <button class="addcategorybtn91" id="addcategorybtn91" name="paadd1">Display</button>

                    <button class="addcategorybtn9" id="addcategorybtn9" name="paadd">Add</button>

                </div>

            </form>


            <div class="displaycategories" id="displaycategories">
                <?php

                //   $lcategory=new LecturerType();
                //   $rows= $lcategory->findAll();



                ?>
                <?php if ($rows) :  ?>




                    <table class="category_table" id="category_table">

                        <tr>
                            <th>No</th>
                            <th>Attribute Name</th>
                            <th>Actions</th>

                        </tr>
                        <?php
                        $i = 0;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $row->Name ?></td>

                              
                               


                                <td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a class="a1" href='<?= ROOT ?>/attributes/lectureredit/<?= $row->Type ?>/<?= $row->ID ?>'>
                                            Edit</a></button>
                                    <button type='button' class='deletebtn' id='deletebtn' onclick="openLecAttributeDeleteCategoryPopupView('<?= $row->ID ?>','<?= $row->Type ?>')"><i class='fa-solid fa-trash'></i>&nbsp;
                                        Delete</button>
                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </table>

                <?php endif; ?>
            </div>


        </div>
    </div>



        <?php include('../private/views/librarian/includes/popup.LecAttrideleteconfirmation.view.php'); ?>


        <script>
            const drop_menu1 = document.getElementById('drop_menu');

            function visible() {
                drop_menu1.style.visibility = 'visible';
            }

            function invisible() {
                drop_menu1.style.visibility = 'hidden';

            }
        </script>



</body>
<script src="<?=ROOT?>/js/librarian/nav.js"></script>
<script src="<?=ROOT?>/js/includes/calendar.js"></script>
<script src="<?=ROOT?>/js/librarian/addlcategory.js"></script>
<script src="<?=ROOT?>/js/librarian/bookAdd.js"></script>
<script src="<?=ROOT?>/js/librarian/bookEdit.js"></script>
<script src="<?=ROOT?>/js/librarian/bookView.js"></script>
<script src="<?=ROOT?>/js/includes/popupAuthor.js"></script>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/includes/editProfile.js"></script>
<script src="<?=ROOT?>/js/librarian/issueBook.js"></script>
<script src="<?=ROOT?>/js/librarian/locateBook.js"></script>
<script src="<?=ROOT?>/js/librarian/inventory.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>
<!-- <script src="<?=ROOT?>/js/librarian/addUser.js"></script> -->
<script src="<?=ROOT?>/js/librarian/addUser.js"></script>
<!-- <script src="<?=ROOT?>/js/librarian/addBookCategory.js"></script> -->
<script src="<?=ROOT?>/js/includes/notification.js"></script>
<!-- <script src="<?=ROOT?>/js/user/popupReserve.js"></script> -->


</html>
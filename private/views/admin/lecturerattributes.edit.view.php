<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
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

    <?php include('../private/views/includes/nav.view.php'); ?>


    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
    
    <!-- body -->

    <div class="bodyContainer01">


      
    <div class="options">
        <ul>
        <li><a href="<?= ROOT ?>/bookcategories/add" class="">Book Category</a></li>
        <li><a href="<?= ROOT ?>/lendingcategories/add" class="">Lending Category</a></li>
        <li><a href="" class="">Patron Attributes</a>

        <div class="drop_menu">

            <ul>
                    <li><a href="<?= ROOT ?>/attributes/lectureradd" class="">Lecturer</a></li>
                    <li><a href="<?= ROOT ?>/attributes/studentadd" class="">Student</a></li>
                
            </ul>

        </div>


        </li>
       </ul>
    </div>
   

<!-- form -->



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
        <?php if ($row) : ?>
            <div class="bodyContainer03">
                <label for="BookCategoryName" class="BookCategoryNameLabel1">Name</label>

                <input type="text" name="Name" class="BookCategoryName1" id="BookCategoryName" value="<?= get_var('Name', $row[0]->Name) ?>">

                <div class="errorbookCategoryName1">
                    <?php if (isset($errors['bookCategoryName'])) : ?>

                        <p id="myParagraph">
                            <?= "*" . $errors['bookCategoryName'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="Descriptionlable" class="Descriptionlable1">Attribute</label>

                <select id="Description" class="Description1" name="Description" id="Description" value="" required>


                    <option <?= get_select('Description', 'Type', $row[0]->Type) ?> value="type">Type</option>
                    <option <?= get_select('Description', 'Sub', $row[0]->Type) ?> value="subject">Subject</option>
                    <option <?= get_select('Description', 'Department', $row[0]->Type) ?> value="department">Department</option>






                </select>


                <button class="addcategorybtn181" id="addcategorybtn10" name="paadd">Edit</button>
                <button type="button" class="backbtncatecagory1"><a href="<?= ROOT ?>/attributes/lectureradd">Back</a></button>


            </div>
        <?php endif; ?>
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


                        <!-- //define js variable -->
                        <script type="text/javascript">
                            var type = '<?= $row->Type ?>';
                        </script>
                        <script type="text/javascript">
                            var id = '<?= $row->ID ?>';
                        </script>


                        <td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a class="a1" href='<?= ROOT ?>/attributes/lectureredit/<?= $row->Type ?>/<?= $row->ID ?>'>
                                    Edit</a></button>
                            <button type='button' class='deletebtn' id='deletebtn' onclick="openLecAttributeDeleteCategoryPopupView()"><i class='fa-solid fa-trash'></i>&nbsp;
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








 <?php include('../private/views/includes/footer.view.php'); ?>

  






























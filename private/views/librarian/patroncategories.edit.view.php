<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addCategory.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

    <style>
        .BookCategoryNameLabel{
            font-size: 15px;
        }
   
         .addcategorybtn8{
        position: absolute;
        width: 89px;
        height: 33px;
        left: 180px;
        top: 120px;
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
        <p class="operation">Patron Category</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->

    <?php 
       $this->view('librarian/includes/nav'); 
    ?>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
    
    <!-- body -->

    <div class="bodyContainer01">

    <div class="options">
        <ul>
        <li><a href="<?= ROOT ?>/bookcategories/add" class="">Book Category</a></li>
        <li><a href="<?= ROOT ?>/lendingcategories/add" class="">Lending Category</a></li>
        <li><a href="<?= ROOT ?>/logincategories/add" class="">Login Category</a></li>
        <li><a href="<?= ROOT ?>/patroncategories/add" class="active">Patron Category</a></li>
        <li><a href="<?= ROOT ?>/patronattributes/add" class="">Patron Attributes</a></li>




       </ul>
    </div>
   

<!-- form -->


<div class="bodyContainer02">





            <form id="myForm" method="post" enctype="multipart/form-data">

            <div class="bodyContainer03">

            <label for="BookCategoryName" class="BookCategoryNameLabel">PatronCategory Name</label>

                <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName"  value="<?= get_var('Name',$row[0]->Name) ?>" required>

                <div class="errorbookCategoryName">
                <?php if (isset($errors['bookCategoryName'])): ?>
                            <p id="myParagraph">
                                <?="*" . $errors['bookCategoryName'] ?>
                            </p>
                            <?php endif; ?>


                            </div>      
                            <button class="addcategorybtn8" name="pcedit">Edit</button>

                            </div>

            </form>


             <div class="displaycategories" id="displaycategories">
                <?php
                
                  $category=new PatronCategory();
                  $rows= $category->findAll();
                 
                ?>
                             <?php if ($rows): ?>

                                        
                <table class="category_table" id="category_table">

                        <tr>
                                <th>No</th>
                                <th>Category Name</th>
                     
                                <th>Actions</th>

                        </tr>
                        <?php 
                        $i=0;
                        foreach ($rows as $row): 

                                ?>
                        <tr>
                                <td><?= ++$i; ?></td>
                                <td ><?= $row->Name ?></a></td>
                               


                                <td>
                                <button type='button' class='editbtn' id='editbtn'><i
                                                        class='fa-solid fa-pen'></i>&nbsp;<a class="a1"
                                                        href='<?= ROOT ?>/patroncategories/edit/<?= $row->PatronCategoryID ?>'>
                                                        Edit</a></button>
                                        <button type='button' class='deletebtn' id='deletebtn'><i
                                                        class='fa-solid fa-trash'></i>&nbsp;<a class="a1"
                                                        href='<?= ROOT ?>/patroncategories/delete/<?= $row->PatronCategoryID ?>'>
                                                        Delete</a></button>
                                </td>

                        </tr>

                        <?php endforeach; ?>
                </table>

                <?php endif;?>
             </div>


 </div>









    <?php $this->view('librarian/includes/footer'); ?>

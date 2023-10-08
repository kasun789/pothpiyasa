<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addCategory.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <style>
         .addcategorybtn5{
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
        <p class="operation">Login Category</p>

        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>

        <div class="profile" id="profile">
            <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" class="profileImg" id="profileImg">
        </div>

        <div class="container_patron" id="container_patron">

            <div class="container_patron_details">
                <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" id="profileImg">
                <p class="profileName" id="profileName">
                    <?= Auth::profileName() ?>
                </p>
                <p class="profileEmail" id="profileEmail">
                    @<?= Auth::profileEmail() ?>
                </p>
            </div>

            <ul>
                <li><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">Profile</a></li>
                <!-- <li><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li> -->
                <li><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My
                        Reservation</a></li>
                <li><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a>
                </li>
                <li><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>

                <li><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>


            </ul>
        </div>
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?>


    <!-- body -->

    <div class="bodyContainer01">

    <div class="options">
        <ul>
        <li><a href="<?= ROOT ?>/bookcategories/add" class="">Book Category</a></li>
        <li><a href="<?= ROOT ?>/lendingcategories/add" class="">Lending Category</a></li>
        <li><a href="<?= ROOT ?>/logincategories/add" class="active">Login Category</a></li>
        <li><a href="<?= ROOT ?>/patroncategories/add" class="">Patron Category</a></li>
        <li><a href="<?= ROOT ?>/patronattributes/add" class="">Patron Attributes</a></li>


       </ul>
    </div>
   

<!-- form -->


<div class="bodyContainer02">





            <form id="myForm" method="post" enctype="multipart/form-data">

            <div class="bodyContainer03">

            <label for="BookCategoryName" class="BookCategoryNameLabel">LoginCategory Name</label>
            <?php if (isset($errors['bookCategoryName'])): ?>

                <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName"  value="<?= get_var('Name') ?>" required>

                <div class="errorbookCategoryName">
                            <p id="myParagraph">
                                <?="*" . $errors['bookCategoryName'] ?>
                            </p>


                            </div>  
                            <?php else: ?>
                                <input type="text" name="Name" class="BookCategoryName" id="BookCategoryName"  value="" required>

                            <?php endif; ?>

                            <button class="addcategorybtn5" name="lcadd" >Add New</button>

                            </div>

            </form>


             <div class="displaycategories" id="displaycategories">
                <?php
                
                  $category=new LoginCategory();
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
                                                        href='<?= ROOT ?>/logincategories/edit/<?= $row->LoginCategoryID ?>'>
                                                        Edit</a></button>
                                        <button type='button' class='deletebtn' id='deletebtn'><i
                                                        class='fa-solid fa-trash'></i>&nbsp;<a class="a1"
                                                        href='<?= ROOT ?>/logincategories/delete/<?= $row->LoginCategoryID ?>'>
                                                        Delete</a></button>
                                                       
                                </td>

                        </tr>

                        <?php endforeach; ?>
                </table>

                <?php endif;?>
             </div>


 </div>


 <?php include('../private/views/includes/footer.view.php'); ?>


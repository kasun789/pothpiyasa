<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/includes/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/librarian/bookSearch.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    
</head>



<body>
    <div class="header">
        <p class="operation">Search Book</p>
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

    <!-- form -->
    <img src="<?= ROOT ?>/img/admin/login/library.png" class="library_png">

   <div class="bodyContainer02">
   
   
    <form method="post" enctype="multipart/form-data">

    <h3 class="opac_name">OPAC (Online Public Access Category)</h3>
    <div class="hrtag"></div>


   
    <label for="Title" class="TitleLabel">Title</label>
        <input type="text" name="Title" class="Title" id="Title"  value="<?= get_var('Title') ?>">

       

        

        <label for="Author" class="AuthorLabel">Author</label>
        <input type="text" name="Author" class="Author" id="Author" value="<?= get_var('Author') ?>">

       
        

        <label for="Subject" class="SubjectLabel">Subject</label>
        <input type="text" name="Subject" class="Subject" id="Subject" value="<?= get_var('Subject') ?>">

       

       
        <label for="ISBN" class="ISBN1Label">ISBN</label>
        <input type="number" name="ISBN1" class="ISBN1" id="ISBN1" value="<?= get_var('ISBN1') ?>">
        

        <button class="searchbtn" name="submit" type="submit">Search</button>
       
    </form>
</div>
<button class="backbtnsearchbook"><a href="<?= ROOT ?>/librariandashboard">Back</a></button>


        
</div>

    <?php $this->view('librarian/includes/footer'); ?>

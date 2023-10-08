<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/searchbook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <title>Pothpiyasa</title>
</head>


<body>
    <header>
        <div class="header_bar_login">
            <div class="system_logo">
                <img src="<?= ROOT ?>/img/admin/login/logo.png" class="logo">
                <img src="<?= ROOT ?>/img/admin/login/logo_text.png" class="logo_text">
            </div>
            <div class="signin_button">
                <!-- <img src="<?= ROOT ?>/img/admin/login/vector_book.png" class="book_logo"> -->
                <i class="fa-solid fa-user" id="signinI"></i>
                <a href="<?= ROOT ?>/Login" class="signin">Sign In</a>
            </div>
        </div>
    </header>

    <div class="options">

        <a href="<?= ROOT ?>/Login"><i class="fa-solid fa-circle-chevron-left" id="backward"></i></a>

        <ul>
            <li><a href="<?= ROOT ?>/books/searchbookOPAC" class="active">OPAC</a></li>
            <li><a href="<?= ROOT ?>/books/newarrivals" class=" ">New Arrivals</a></li>
        </ul>
    </div>

    <main>

        <div class="opacui">
            <h1>OPAC (Online Public Access Category)</h1>
            <form method="POST">
                <label for="Title" class="TitleLabel">Title</label>
                <input type="text" name="Title" class="Title" id="Title" value="<?= get_var('Title') ?>">


                <label for="Author" class="AuthorLabel">Author</label>
                <input type="text" name="Author" class="Author" id="Author" value="<?= get_var('Author') ?>">
                <div class="errorAuthor">


                    <label for="Subject" class="SubjectLabel">Subject</label>
                    <input type="text" name="Subject" class="Subject" id="Subject" value="<?= get_var('Subject') ?>">
                    <div class="errorSubject">


                        <label for="ISBN" class="ISBN1Label">ISBN</label>
                        <input type="number" name="ISBN1" class="ISBN1" id="ISBN1" value="<?= get_var('ISBN1') ?>">


                        <button class="searchbtn" name="submit" type="submit">Search</button>
            </form>
        </div>

        <img src="<?= ROOT ?>/img/admin/login/library.png" class="library_png">


    </main>
    <footer>
        <div class="footer_bar">
            <h5 class="copyright">© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
    </footer>
    <?php $this->view('user/includes/footer'); ?>

</body>

</html>
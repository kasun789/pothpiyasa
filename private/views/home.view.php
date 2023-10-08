<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/login.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/home.css">
    <title>Login</title>
</head>


<body>

    <header>
        <div class="header_bar">
            <div class="system_logo">
                <img src="<?= ROOT ?>/img/admin/login/logo.png" class="logo">
                <img src="<?= ROOT ?>/img/admin/login/logo_text.png" class="logo_text">
            </div>
            <div class="opac_button">
                <img src="<?= ROOT ?>/img/admin/login/vector_book.png" class="book_logo">
                <a href="#" class="opac_text">OPAC</a>
            </div>
        </div>
    </header>


    <div class="home_container">

        <div class="home_background">
        
        </div>

        <div class="role admin_role">
            <h3>Administrator</h3>
            <a href="<?= ROOT?>/AdminLogin">
                <img src="<?= ROOT ?>/img/home/admin.png" width="200px" height="160px">
            </a>
        </div>

        <div class="role librarian_role">
            <h3>Librarian</h3>
            <a href="<?= ROOT?>/LibrarianLogin">
                <img src="<?= ROOT ?>/img/home/librarian.png" width="200px" height="160px">
            </a>
        </div>

        <div class="role libraryStaff_role">
            <h3>Library-Staff</h3>
            <a href="<?= ROOT?>/LibraryStaffLogin">
                <img src="<?= ROOT ?>/img/home/library_staff.png" width="200px" height="160px">
            </a>
        </div>

        <div class="role user_role">
            <h3>Borrower</h3>
            <a href="<?= ROOT?>/UserLogin">
                <img src="<?= ROOT ?>/img/home/user.png" width="200px" height="160px">
            </a>
        </div>
        
        
    </div>


    <footer>
        <div class="footer_bar">
            <h5 class="copyright">© Copyright PothPiyasa 2022</h5>
        </div>
    </footer>

</body>

</html>
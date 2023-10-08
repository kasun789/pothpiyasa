<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/login.css">
    <title>Pothpiyasa</title>
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
                <a href="<?= ROOT ?>/books/searchbookOPAC" class="opac_text">OPAC</a>
            </div>
        </div>
    </header>

    <main class="mainCon">
        <img src="<?= ROOT ?>/img/libraryStaff/libraryStaff.png" class="library_png">
    </main>

    <div class="forgetPasswordCon3" id="forgetPasswordCon3">
        <h2 class="forgetPasswordH3" id="forgetPasswordH3">New Password</h2>
        <form method="POST">
            <input type="password" name="newPassword" class="newPasswordInput2" placeholder="Create new password" id="newPasswordInput2">
            <input type="password" name="conformationPassword" class="conformPasswordInput2" placeholder="Conform your password" id="conformPasswordInput2">

            <button name="change" id="changebtn">Change</button>
        </form>
    </div>

    <footer>
        <div class="footer_bar">
            <h5 class="copyright">© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
    </footer>

    <script src="<?= ROOT ?>/js/includes/forgetPassword.js"></script>
    <?php if ($errors) : ?>
        <div class="errorsSection3" id="errors">
            <?php
            print_r($errors['password']);
            echo '<script type="text/javascript">moveLablesSection3();</script>';

            ?>
        </div>
    <?php endif; ?>
</body>

</html>
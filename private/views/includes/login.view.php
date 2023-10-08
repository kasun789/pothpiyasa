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

    <main>
        <img src="<?= ROOT ?>/img/libraryStaff/libraryStaff.png" class="library_png">

        <div class="login">
            <img src="<?= ROOT ?>/img/user_avatar.png" class="library_avatar_png">

            <h1>Welcome</h1>
            <?php
            if (isset($errors) && (!empty($errors))) {
                echo '<p class="error" >Invalid User ID / Password</p>';
            }
            ?>
            <?php if (isset($_SESSION['TIMEOUT_MSG']) && $_SESSION['TIMEOUT_MSG'] == "set"): ?>
                <p class="error">
                    <i class="fas fa-history"></i>
                    <?= "Your session has expired. Please log in again!" ?>
                </p>
            <?php endif; ?>
            <form method="POST" class="login_form">
                <div class="txt_field">
                    <input type="text" name="UserName" id="UserName" required>
                    <span></span>
                    <label for="UserName">User Name</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="Password" id="password" required>
                    <span></span>
                    <label for="Password">Password</label>
                </div>
                <a href="<?=ROOT?>/changePassword/sendSecretCode" class="pass">Forget Password</a>
                <input type="submit" value="Login" name="submit">
            </form>
        </div>

    </main>

    <footer>
        <div class="footer_bar">
            <h5 class="copyright">© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
    </footer>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/css/libraryStaff/login.css">
    <title>Pothpiyasa</title>
</head>
<body>
    <header>
        <div class="header_bar">
            <div class="system_logo">
                <img src="<?=ROOT?>/img/admin/login/logo.png" class="logo">
                <img src="<?=ROOT?>/img/admin/login/logo_text.png" class="logo_text">
            </div>
            <div class="opac_button">
                <img src="<?=ROOT?>/img/admin/login/vector_book.png" class="book_logo">
                <a href="#" class="opac_text">OPAC</a> 
            </div>
        </div>
    </header>

    <main>
        <img src="<?=ROOT?>/img/libraryStaff/librarystaffDashboard.png" class="library_png">

        <div class="login">
            <h1>Welcome</h1>
            <?php 
                if(isset($errors) && (!empty($errors))){
                    echo '<p class="error" >Invalid User ID / Password</p>';
                }
            ?>
            <form method="POST">
                <div class="txt_field">
                    <input type="text" name="UserName" id="user_id" required>
                    <span></span>
                    <label for="user_id">User Name</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="Password" id="password" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>
                <a href="#" class="pass">Forget Password</a>
                <input type="submit" value="Login" name="submit">
            </form>
        </div>

    </main>

    <footer>
        <div class="footer_bar">
            <h5 class="copyright" >© Copyright Pothpiyasa 2022</h5>
        </div>
    </footer>

</body>
</html>

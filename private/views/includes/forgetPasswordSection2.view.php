
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/css/includes/login.css">
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
                <a href="<?= ROOT?>/books/searchbookOPAC" class="opac_text">OPAC</a> 
            </div>
        </div>
    </header>

    <main class="mainCon">
        <img src="<?=ROOT?>/img/libraryStaff/libraryStaff.png" class="library_png">
    </main>

    <div class="forgetPasswordCon2" id="forgetPasswordCon2">
            <h2 class="forgetPasswordH2" id="forgetPasswordH2">Code Verification</h2>
            <form method="POST">
                <label for="email" class="verificationCodelable1" id="verificationCodelable1">We've sent a password reset otp to your email 
                    <?php if($userDetails['email']){
                        echo $userDetails['email'];
                    }?>
                </label>
                
                
                <input type="number" name="code" class="forgetPasswordInput2" placeholder="Enter code" id="forgetPasswordInput2">

                <button name="submit" id="forgetPasswordBtn2">Submit</button>
            </form>
        </div>

    <footer>
        <div class="footer_bar">
            <h5 class="copyright" >© COPYRIGHT POTHPIYASA 2023</h5>
        </div>
    </footer>

    <script src="<?=ROOT?>/js/includes/forgetPassword.js"></script>
    <?php if($errors):?>
    <div class="errorsSection2" id="errors">
                    <?php 
                        
                            print_r($errors['code']);
                            echo '<script type="text/javascript">moveLablesSecretCode();</script>';
                        
                    ?>
    </div>
    <?php endif;?>
</body>
</html>

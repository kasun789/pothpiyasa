<?php

require 'includes\Exception.php';
require 'includes\PHPMailer.php';
require 'includes\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Login controller
class changePassword extends Controller
{
    public function index()
    {
        $errors = array();


        $this->view('includes/forgetPassword', ['errors' => $errors]);
    }

    public function sendSecretCode()
    {

        $errors = array();
        $userArr = array();
        $user = new User();


        $randomVal = rand(100001, 999999);

        $str = 'Your password reset code is ' . $randomVal;

        if (!empty($_POST['email'])) {
            if ($user->forgetPasswordValidtion($_POST)) {
                $email = $_POST['email'];
                $userDetails = $user->where('Email', $_POST['email']);

                if (isset($_POST['continue'])) {
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'kasungayashan396@gmail.com';
                        $mail->Password = 'xoxzchllposqtqal';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->setFrom('kasungayashan396@gmail.com');
                        $mail->addAddress($_POST['email']);

                        $mail->isHTML(true);
                        $mail->Subject = 'Password Reset Code';
                        $mail->Body = $str;
                        $mail->send();

                        $randvalStr = strval($randomVal);

                        $hashVal = password_hash($randvalStr, PASSWORD_DEFAULT);
                        print_r($hashVal);
                        $id = $userDetails[0]->UserID;

                        $quary = "UPDATE `user` SET `Code`='" . $hashVal . "' WHERE UserID = $id";

                        $user->query($quary);

                        // return $this->view('includes/forgetPasswordSection2', ['errors' => $errors]);
                        return $this->redirect("changePassword/checkSecreatCode/" . urlencode($email) . "");
                    } catch (Exception $e) {
                        $errors['email'] = 'Something went wrong!. Check the <br> network connection.';
                    }
                }
            } else {
                $errors = $user->errors;
            }
        }



        return $this->view('includes/forgetPassword', ['errors' => $errors]);
    }
    public function checkSecreatCode($email = '')
    {
        $errors = array();
        $userDetils = array();

        $user = new User();

        $userDetails['email'] = urldecode($email);

        if (!empty($_POST['code'])) {

            if ($user->secretCOdeValidation($_POST)) {

                if (isset($_POST['submit'])) {

                    $query = "SELECT `UserID`,`Code` FROM `user` WHERE Email ='" . $email . "'";
                    $secreatCode = $user->query($query);


                    if (password_verify(strval($_POST['code']), $secreatCode[0]->Code)) {
                        $id = $secreatCode[0]->UserID;

                        $query = "UPDATE `user` SET `Code`=0 WHERE UserID=$id";
                        $user->query($query);

                        return $this->redirect("changePassword/changePasswords/" . urlencode($secreatCode[0]->UserID) . "");
                    } else {
                        $errors['code'] = "You've entered incorrect code!";
                    }
                }
            } else {
                $errors = $user->errors;
            }
        }

        return $this->view('includes/forgetPasswordSection2', ['errors' => $errors, 'userDetails' => $userDetails]);
    }

    public function changePasswords($id = NULL)
    {
        $errors = array();
        $user = new User();
        
            if (isset($_POST['change'])) {
                if ($user->passwordValidation($_POST)) {
                    $newPass = $_POST['newPassword'];
                    $newId = urldecode($id);
                    $query = "UPDATE `user` SET `Password`= '" . password_hash($newPass, PASSWORD_DEFAULT) . "' WHERE UserID=$newId";
                    $user->query($query);
                    return $this->redirect("Login");
                }
                else{
                    $errors = $user->errors;
                }
        }
        
        return $this->view('includes/forgetPasswordSection3', ['errors' => $errors]);
    }
}

<?php

//Each table in the database that should have this kind of model

class User extends Model
{

     //Validation is differ from one model to another
     public function validate($DATA)
     {

          $this->errors = array();

          //Check if registration no exist
          if ($this->where('RegistrationNo', ($DATA['RegistrationNo']))) {
               $this->errors['RegistrationNo'] = "This Registration Number is already exist.";
          }

          // Check for registration no
          if (!preg_match('/^\d{4}\/[A-Z]{2,}\/\d{3}$/', $DATA['RegistrationNo'])) {
               $this->errors['RegistrationNo'] = "The Registration Number should follow the format \"Ex:2020/CS/202\".";
          }


          // Check for first name
          if (!preg_match('/^[A-Z](\.[A-Z])+$/', $DATA['FirstName'])) {
               $this->errors['FirstName'] = "The first name should follow the format \"Ex:A.B.C\".";
          }

          //Check for last name
          if (!preg_match('/^[a-zA-Z]+$/', $DATA['LastName'])) {
               $this->errors['LastName'] = "Only letters allowed in last name.";
          }

          //Check if Phone no exist
          if ($this->where('PhoneNo', ($DATA['PhoneNo']))) {
               $this->errors['PhoneNo'] = "This Phone Number is already exist.";
          }

          // Check for Phone no
          if (!preg_match('/^\d{9}$/', $DATA['PhoneNo'])) {
               $this->errors['PhoneNo'] = "The Phone Number should contain only 9 digits without 0.";
          }

          // Check for Address
          if (!preg_match('/^(?![\p{P}\d]*$).+$/', $DATA['Address'])) {
               $this->errors['Address'] = "The Address cannot contain only digits or punctuation marks";
          }

          // Check for Address
          if (!preg_match('/^(?!.*\s{2}).+$/', $DATA['Address'])) {
               $this->errors['Address'] = "The Address contain double spaces.";
          }


          //Check for email
          if (!filter_var($DATA['Email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['Email'] = "Email is not valid";
          }

          //Check if email exist
          if ($this->where('Email', ($DATA['Email']))) {
               $this->errors['Email'] = "This email is already in use";
          }

          // Check for NIC
          if (!preg_match('/^(?!0{9}$)\d{9}V$/', $DATA['NIC']) && !preg_match('/^(1[9-9]|[2-9]\d)\d{10}$/', $DATA['NIC'])) {
               $this->errors['NIC'] = "The NIC should be 9 digits follwed by V or 12 digits.";
          }

          //Check if NIC exist
          if ($this->where('NIC', ($DATA['NIC']))) {
               $this->errors['NIC'] = "This NIC is already exist";
          }


          if (count($this->errors) == 0) {

               return true;
          }

          return false;

     }

     public function validateEditProfile($DATA)
     {

          $this->errors = array();

          // Check for registration no
          if (!preg_match('/^\d{4}\/[A-Z]{2,}\/\d{3}$/', $DATA['RegistrationNo'])) {
               $this->errors['RegistrationNo'] = "The Registration Number should follow the format \"Ex:2020/CS/202\".";
          }

          // Check for first name
          if (!preg_match('/^[A-Z](\.[A-Z])+$/', $DATA['FirstName'])) {
               $this->errors['FirstName'] = "The first name should follow the format \"Ex:A.B.C\".";
          }

          //Check for last name
          if (!preg_match('/^[a-zA-Z]+$/', $DATA['LastName'])) {
               $this->errors['LastName'] = "Only letters allowed in last name.";
          }

          //Check if Phone no exist
          // if ($this->where('PhoneNo', ($DATA['PhoneNo']))) {
          //      $this->errors['PhoneNo'] = "This Phone Number is already exist.";
          // }

          // Check for Phone no
          if (!preg_match('/^\d{9}$/', $DATA['PhoneNo'])) {
               $this->errors['PhoneNo'] = "The Phone Number should contain only 9 digits without 0.";
          }

          // Check for Address
          if (!preg_match('/^(?![\p{P}\d]*$).+$/', $DATA['Address'])) {
               $this->errors['Address'] = "The Address cannot contain only digits or punctuation marks";
          }

          // Check for Address
          if (!preg_match('/^(?!.*\s{2}).+$/', $DATA['Address'])) {
               $this->errors['Address'] = "The Address contain double spaces.";
          }


          //Check for email
          if (!filter_var($DATA['Email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['Email'] = "Email is not valid";
          }

          //Check if email exist
          // if ($this->where('Email', ($DATA['Email']))) {
          //      $this->errors['Email'] = "This email is already in use";
          // }

          // Check for NIC
          if (!preg_match('/^(?!0{9}$)\d{9}V$/', $DATA['NIC']) && !preg_match('/^(1[9-9]|[2-9]\d)\d{10}$/', $DATA['NIC'])) {
               $this->errors['NIC'] = "The NIC should be 9 digits follwed by V or 12 digits.";
          }


          if (count($this->errors) == 0) {

               return true;

          }

          return false;


     }

     public function passwordValidate($DATA, $ROW)
     {

          // print_r($DATA);
          // print_r($ROW);
          $this->errors = array();

          //Check current password

          //$ROW comes as array of items (Array ( [0] => stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212....)
          $row = $ROW[0];

          // echo $row->Password;
          //$ROW[0], (stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212..)

          if (!password_verify($DATA['currentPassword'], $row->Password)) {
               $this->errors['currentPassword'] = "Passowrd is incorrect";

          }



          //Check new password and confirm password are match
          if (!($DATA['newPassword'] == $DATA['confirmPassword'])) {
               $this->errors['confirmPassword'] = "Passwords didn't match";
          }


          if (count($this->errors) == 0) {

               return true;

          }

          return false;


     }

     public function validateBulkAdd($row)
     {

          $this->errors = array();

          //Check if registration no exist

          if (empty(trim($row[0]))) {
               $this->errors['RegistrationNo'] = "There are one or more empty registration number(s). Kindly review the registration numbers for accuracy.";
          }

          if ($this->where('RegistrationNo', $row[0])) {
               $this->errors['RegistrationNo'] = "There are one or more registration number(s) that is already in use. Kindly review the registration numbers for accuracy.";
          }

          // Check for registration no
          if (!preg_match('/^\d{4}\/[A-Z]{2,}\/\d{3}$/', $row[0])) {
               $this->errors['RegistrationNo'] = "The Registration Numbers should follow the format \"Ex:2020/CS/202\". Kindly review the registration numbers for accuracy.";
          }

          //Check for first name

          if (empty(trim($row[3]))) {
               $this->errors['FirstName'] = "There are one or more empty first name(s). Kindly review the first names for accuracy.";
          }

          if (!preg_match('/^[A-Z](\.[A-Z])+$/', $row[3])) {
               $this->errors['FirstName'] = "The first name should follow the format \"Ex:A.B.C\". Kindly review the first names for accuracy.";
          }


          //Check for last name
          if (empty(trim($row[4]))) {
               $this->errors['LastName'] = "There are one or more empty last name(s). Kindly review the last names for accuracy.";
          }

          if (!preg_match('/^[a-zA-Z]+$/', $row[4])) {
               $this->errors['LastName'] = "There are one or more invalid last name(s).Only letters allowed in last name";
          }

          //Check for email

          if (empty(trim($row[9]))) {
               $this->errors['Email'] = "There are one or more empty email(s). Kindly review the emails for accuracy.";
          }

          if (!filter_var($row[9], FILTER_VALIDATE_EMAIL)) {
               $this->errors['Email'] = "There are one or more invalid email(s). Kindly review the emails for accuracy.";
          }

          //Check if email exist
          if ($this->where('Email', ($row[9]))) {
               $this->errors['Email'] = "There are one or more email(s) that is already in use. Kindly review the emails for accuracy.";
          }

          //Check if Phone no exist

          if (empty(trim($row[5]))) {
               $this->errors['PhoneNo'] = "There are one or more empty PhoneNo(s). Kindly review the PhoneNo for accuracy.";
          }
          
          if ($this->where('PhoneNo', $row[5])) {
               $this->errors['PhoneNo'] = "This Phone Number is already exist.";
          }

          // Check for Phone no
          if (!preg_match('/^\d{9}$/', $row[5])) {
               $this->errors['PhoneNo'] = "The Phone Number should contain only 10 digits.\".";
          }

          // Check for Address

          if (empty(trim($row[8]))) {
               $this->errors['Address'] = "There are one or more empty Address(s). Kindly review the Address for accuracy.";
          }
          
          if (!preg_match('/^(?![\p{P}\d]*$).+$/', $row[8])) {
               $this->errors['Address'] = "The Address cannot contain only digits or punctuation marks";
          }

          // Check for Address
          if (!preg_match('/^(?!.*\s{2}).+$/', $row[8])) {
               $this->errors['Address'] = "The Address contain double spaces.";
          }

          // Check for NIC

          if (empty(trim($row[1]))) {
               $this->errors['NIC'] = "There are one or more empty NIC(s). Kindly review the NIC for accuracy.";
          }

          if (!preg_match('/^(?!0{9}$)\d{9}V$/', $row[1]) && !preg_match('/^(1[9-9]|[2-9]\d)\d{10}$/', $row[1])) {
               $this->errors['NIC'] = "The NIC should be 9 digits follwed by V or 12 digits.";
          }

          //Check if NIC exist
          if ($this->where('NIC', ($row[1]))) {
               $this->errors['NIC'] = "This NIC is already exist";
          }




          if (count($this->errors) == 0) {

               return true;
          }

          return false;

     }


     // kasun
     //change password validation
     public function forgetPasswordValidtion($DATA)
     {
          $this->errors = array();


          if (!$this->where('Email', $DATA['email']) && !empty($DATA['email'])) {
               $this->errors['email'] = "This email address does not exist!";
          }



          if (count($this->errors) == 0) {

               return true;

          }

          return false;
     }

     public function secretCOdeValidation($DATA)
     {

          if ($DATA['code'] < 0 && sizeof($DATA['code']) != 6 && !(preg_match('/^[0-9]*$/', $DATA['code']))) {
               $this->errors['code'] = "You've entered incorrect code!";
          }

          if (count($this->errors) == 0) {

               return true;

          }

          return false;
     }

     public function passwordValidation($DATA)
     {

          if ($DATA['newPassword'] != $DATA['conformationPassword']) {

               $this->errors['password'] = 'Confirm password not matched!';
          }

          if (!empty($DATA['newPassword']) && !empty($DATA['conformationPassword'])) {
               if (strlen($DATA['newPassword']) <= 8 && strlen($DATA['conformationPassword']) <= 8) {
                    $this->errors['password'] = 'Password have not enough length!';
               }
          }

          if (empty($DATA['newPassword']) && empty($DATA['conformationPassword'])) {
               $this->errors['password'] = 'Password have not enough length!';
          }



          if (count($this->errors) == 0) {

               return true;

          }

          return false;
     }



}
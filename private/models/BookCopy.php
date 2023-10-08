<?php

class BookCopy extends Model
{
    public function bookCopyValidation($DATA){
        
        $this->errors = array();
        //Check for edition
        if(!preg_match('/^[0-9.]+$/',$DATA['priceBookCopy']))
        {
             $this->errors['priceBookCopy'] = "Only numbers allowed";
        }

        if($DATA['priceBookCopy']<0){
          $this->errors['priceBookCopy'] = "Price Should be positive"; 
     }
     if(!preg_match('/^\d+(\.\d{2})?$|^(\d+)$/',$DATA['priceBookCopy'])){
          $this->errors['priceBookCopy'] = "Price should be in two decimal places"; 
     }

        //Check the vendor Name
        if(isset($DATA['vendorName'])){
          if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['vendorName']))
     {
          $this->errors['vendorName'] = "Vendor name is not correct";
     }
     }
     // Check the vendor email
     if(isset($DATA['vendorEmail'])){
          $email = filter_var($DATA['vendorEmail'], FILTER_SANITIZE_EMAIL);

          // Validate email address
          if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
               $this->errors['vendorEmail'] = "Email not correct";
          } 
     }

    

     //Check the phone no
     if(isset($DATA['vendorTel'])){
          if(!preg_match('/^[0-9,]*$/',$DATA['vendorTel']))
          {
               $this->errors['vendorTel'] = "Phone is not correct";
          }
          else if(strlen($DATA['vendorTel'])!=10){
               $this->errors['vendorTel'] = "Phone is not correct";
          }
     }

     
     
     //Check the donor Name
     if(isset($DATA['DonorName'])){
          if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['DonorName']))
     {
          $this->errors['DonorName'] = "Vendor name is not correct";
     }
     }

     

     //Check the phone no
     if(isset($DATA['DonorTel'])){
          if(!preg_match('/^[0-9,]*$/',$DATA['DonorTel']))
          {
               $this->errors['DonorTel'] = "Phone No is not correct";
          }
          else if(strlen($DATA['DonorTel'])!=10){
               $this->errors['DonorTel'] = "Phone No is not correct";
          }
     }

     // Check the donor email
     if(isset($DATA['DonorEmail'])){
          $email = filter_var($DATA['DonorEmail'], FILTER_SANITIZE_EMAIL);

          // Validate email address
          if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
               $this->errors['DonorEmail'] = "Email is not correct";
          } 
     }

     if(!isset($DATA['priceBookCopy'])){
         
          $this->errors['priceBookCopy'] = "Price can not correct";
     
     }
     

        if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
    }
}
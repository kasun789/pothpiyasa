<?php

//Authentication class

class Auth
{
    public static function authenticate($row)
    {
        //$row contains all the data of user just logged in
        $_SESSION['USER'] = $row;
        $_SESSION['LAST_LOGIN_TIMESTAMP'] = time();
        
    }

    public static function session_timeout()
    {

        //$row contains all the data of user just logged in
        if(isset($_SESSION['USER'])){
            if((time() - $_SESSION['LAST_LOGIN_TIMESTAMP']) > 600){
                $_SESSION['TIMEOUT_MSG'] = "set";
                header("Location: http://localhost/pothpiyasa/public/logout");
            }else{
                $_SESSION['LAST_LOGIN_TIMESTAMP'] = time();
                $_SESSION['TIMEOUT_MSG'] = "unset";

            }
        }
        
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
            // unset($_SESSION['TIMEOUT_MSG']);

        }
        
    }

    public static function logged_in()
    {
        if(isset($_SESSION['USER']))
        {
            return true;
        }

        return false;
        
    }

    public static function profileName()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->FirstName. " " .$_SESSION['USER']->LastName; 
        }

        return false;
        
    }

    public static function profileID()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->UserID; 
        }

        return false;
        
    }
    
      public static function profile()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->Image; 
        }

        return false;
        
    }


    public static function StaffID()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->StaffID; 
        }

        return false;
        
    }

    // public static function PatronType()
    // {
    //     if(isset($_SESSION['USER']))
    //     {
    //         if($_SESSION['USER']->UserID =="Library-StaffMember"){
    //             $eventData['MemberType'] = $row->JobType;
    //         }else{
    //             $eventData['MemberType'] = $row->Type;
    //         }
    //         return $_SESSION['USER']->UserID; 
    //     }

    //     return false;
        
    // }

    public static function profileEmail()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->Email; 
        }

        return false;
        
    }

    public static function access($type = 'Borrower')
    {

        if(!isset($_SESSION['USER']))
        {
            return false;
        }

        $logged_in_type = $_SESSION['USER']->JobType;


        $TYPE['Administrator'] = ['Administrator','Librarian','Library-Staff','Borrower'];
        $TYPE['Librarian'] = ['Librarian','Library-Staff','Borrower'];
        $TYPE['Library-Staff'] = ['Library-Staff','Borrower'];
        $TYPE['Borrower'] = ['Borrower'];

        if(!isset($TYPE[$logged_in_type])){
            return false;
        }

        if(in_array($type,$TYPE[$logged_in_type])){
            return true;
        }

        return false;
        
    }



}

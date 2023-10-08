<?php 

class Logout extends Controller
{
    public function index()
    {

        //Delete online user from the online user table
        delete_online_user(Auth::profileID());
        
        Auth::logout();

        
        
        $this->redirect('Login');
        
    }
}
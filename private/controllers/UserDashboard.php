<?php

class UserDashboard extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
        $this->view('user/home');
    }
}
<?php


class Librarian extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
       $this->view('librarian/home');
    }
}

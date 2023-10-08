<?php

//User Controller
class BookCopies extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
    }

    public function viewOne($id = null)
    {

    }
}
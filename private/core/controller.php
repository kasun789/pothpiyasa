<?php 

//Main Controller
//This contain all methods that common to all controllers
class Controller
{
    
    public function view($view, $data = array())
    {
        //Save data to variables, array keys become variable names
        
        Auth::session_timeout();
        extract($data);
        //['rows'] => $data; --> $rows = $data;

        if(file_exists("../private/views/".$view.".view.php"))
        {
            require("../private/views/".$view.".view.php");
        }else{
            require("../private/views/404.view.php");
        }
        
    }

    public function load_model($model)
    {
        if(file_exists("../private/models/".ucfirst($model).".php"))
        {
            require("../private/models/".ucfirst($model).".php");
            return $model = new $model(); //Instantiation new model object
        }else{
            echo "model file didn't exist";
        }
        return false;
    }

    public function redirect($link)
    {
        //Eg: (Location: http://localhost/pothpiyasa/public/home)
        header("Location: ". ROOT . "/".trim($link,"/"));
        die;
    }



}
<?php

class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = array();

    public function __construct()
    {
        $URL = $this->getURL();

        if(file_exists("../private/controllers/".$URL[0].".php"))
        {
            $this->controller = ucfirst($URL[0]);

            //For get just remaining as the params
            unset($URL[0]);
        }
        //This controller require in index page
        require("../private/controllers/" . $this->controller . ".php");

        //Activating the controller (Creating an instace) (For activate class it need to create instance, then constructor execute)
        $this->controller = new $this->controller;

        if(isset($URL[1])){
            if(method_exists($this->controller, $URL[1]))
            {
                $this->method = ucfirst($URL[1]);
                unset($URL[1]);
            }
        }

        //Now, url only have params only, controller and method is unset
        $URL = array_values($URL);
        $this->params = $URL;

        // Using $this->controller & $this->method, this function identify the,
        // what class & what method that should call, then it pass the $this->params as
        // arguments and calling the particular funcion
        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    private function getURL()
    {
        //$_Get variable get all the parameters of the url to an array
        $url = isset($_GET['url']) ? $_GET['url'] : "Login";

        //Get an array (Array ([0] =>students [1]=>subject [2]=>id))
        return explode("/", filter_var(trim($url, "/")),FILTER_SANITIZE_URL);

    }
}



<?php

class Database
{
    private function connect() //Function for Connect to database
    {
        $string = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
        if(!$con = new PDO($string, DBUSER,DBPWD))
        {
            die("Could not connect to database");
        }
        
        return $con;
    }


    //Getting data from database
    //For query, getting the query data sepertely for security purposes
    public function query($query, $data = array(),$data_type = "object") 
    {
        //Connect to the database
        $con = $this->connect();
        $stmt = $con->prepare($query);


        if($stmt)
        {
        
            $check = $stmt->execute($data);


            if($check)
            {
            
                if($data_type == "object")
                { 

                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                }else{
                    //Associative array($data)
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                if(is_array($data) && count($data) > 0)
                {
                    return $data;
                }
            }
        }

        return false;

    }


}

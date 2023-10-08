<?php

class Model extends Database
{
    public $errors = array();
    
    public function __construct()
    {
        if(!property_exists($this, 'table'))
        {
            $this->table = strtolower($this::class);
        }
    }

    //Functions that common to every model 
    public function where($column,$value) //Getting single record
    {
        $column = addslashes($column);
        $query = "SELECT * FROM $this->table WHERE $column = :value";

        //Here, supply query data seperately
        return $this->query($query, ['value' => $value] );
    }


    //sandali

    public function whereColTwo($column1,$value1,$column2,$value2) //Getting single record
    {
        $column1 = addslashes($column1);
        $column2 = addslashes($column2);
        //echo $value1 . " " . $value2;
        $query = "SELECT * FROM $this->table WHERE $column1 = :value1 AND $column2 = :value2 ";

        //Here, supply query data seperately
        return $this->query($query,['value1' => $value1,'value2' => $value2] );
    }
    
    //kasun
    public function whereTreeOption($column1,$value1,$column2,$value2,$column3,$value3) //Getting single record
    {
        $column1 = addslashes($column1);
        $column2 = addslashes($column2);
        $column3 = addslashes($column3);

        $query = "SELECT * FROM $this->table WHERE $column1 = :value1 AND $column2 = :value2 AND $column3 = :value3";

        //Here, supply query data seperately
        return $this->query($query, ['value1' => $value1,'value2'=>$value2,'value3'=>$value3] );
    }

     //kasun
     public function whereTwoOption($column1,$value1,$column2,$value2) //Getting single record
     {
         $column1 = addslashes($column1);
         $column2 = addslashes($column2);
         
 
         $query = "SELECT * FROM $this->table WHERE $column1 = :value1 AND $column2 = :value2";
 
         //Here, supply query data seperately
         return $this->query($query, ['value1' => $value1,'value2'=>$value2] );
     }
    

    //Sandali

     //SELECT * FROM `rack` ORDER BY RackID DESC LIMIT 1;
    //get last row

    public function last($col1,$num) //Getting single record
    {
        $query = "SELECT * FROM $this->table ORDER BY $col1 DESC LIMIT $num"; 

        return $this->query($query);
    }

    public function findAll() //Getting all records(rows)
    {
        
        $query = "SELECT * FROM $this->table";

        return $this->query($query);
    }

    public function insert($data)
    {
        
        //Getting all the keys of associative array($data)
        $keys = array_keys($data);
        $columns = implode(',', $keys); //(FirstName,MiddleName ...)
        $values = implode(',:', $keys); //(FirstName,:MiddleName ...)

        $query = "INSERT INTO $this->table ($columns) values (:$values)";

        
        //Here, supply query data seperately
        return $this->query($query, $data);
    }

    public function update($column,$id,$data)
    {
        //$column contains column that check with id (eg: UserID)
        
        $str = "";

        //$data is an associative array that contain post data
        foreach ($data as $key => $value){
            $str .= $key . "=:" . $key . ","; 
        }

        //Example: $str = FirstName=:FirstName,MiddleName=:MiddleName,

        $str = trim($str, ","); //Remove "," in start and end of string

        $data['id'] = $id;
        
        
        $query = "UPDATE $this->table SET $str WHERE $column = :id";
       
        

        //UPDATE user SET FirstName=:FirstName,MiddleName=:MiddleName WHERE id = :id;

        //Here, supply query data seperately
        return $this->query($query, $data);
    }

    public function delete($column,$id)
    {
        
        $query = "DELETE FROM $this->table WHERE $column = :id";

        //Here, supply query data seperately
        $data['id'] = $id;
        return $this->query($query, $data);
    }

      //sandali

      public function deleteRow($column1,$column2,$id1,$id2)
      {
          
          $query = "DELETE FROM $this->table WHERE $column1 = :id1 AND $column2 = :id2";
  
          //Here, supply query data seperately
          $data['id1'] = $id1;
          $data['id2'] = $id2;
          return $this->query($query, $data);
      }
      
    //kasun

    public function findLimit($start,$end) //Getting specific number of rows
    {
        
        $query = "SELECT * FROM $this->table LIMIT $start,$end";

        return $this->query($query);
    }

}

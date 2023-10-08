<?php 
    class LendingCategory extends Model
    {
  
 
     //Validation is differ from one model to another
     public function validate($name)
     {
          
          $this->errors = array();
          
          if(!preg_match('/^[a-zA-Z-, ]*$/',$name))
          {
               $this->errors['lendingCategoryName'] = "Only letters and white space are allowed";
               //"Only letters allowed in category  name";
          }

          if($this->where('CategoryName',($name)))
          {
               $this->errors['lendingCategoryName'] = "This Category is already exists.";
          }

          if(!preg_match('/^(?!.*\s{2}).+$/',$name))
          {
               $this->errors['lendingCategoryName'] = "Canno't use double spaces";
               //"Only letters allowed in category  name";
          }





          if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
     }


     public function validateEdit($name,$id)
     {
          
          $this->errors = array();
         
          if(!preg_match('/^[a-zA-Z-, ]*$/',$name))
          {
               $this->errors['lendingCategoryName'] = "Only letters and white space are allowed";
               //"Only letters allowed in category name";
          }
          if(!preg_match('/^(?!.*\s{2}).+$/',$name))
          {
               $this->errors['lendingCategoryName'] = "Cann't use double spaces";
               //"Only letters allowed in category  name";
          }

          $data=new LendingCategory();

          $category = $data->findAll();

          foreach($category as $row):
               if($row->LendingID!=$id && $row->CategoryName==$name){
                    $this->errors['lendingCategoryName'] = "This Category is already exists.";

               }
          endforeach;

        
          if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
     }

    }
    
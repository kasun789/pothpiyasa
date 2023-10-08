<?php 
    class BookCategory extends Model
    {
  
 
     //Validation is differ from one model to another
     public function validate($name)
     {
          $this->errors = array();
          
          
          if(!preg_match('/^[a-zA-Z-, ]*$/',$name))
          {
               $this->errors['bookCategoryName'] = "Only letters and white space are allowed";
               //"Only letters allowed in category  name";
          }

          if($this->where('Name',($name)))
          {
               $this->errors['bookCategoryName'] = "This Category is already exists.";
          }
          if(!preg_match('/^(?!.*\s{2}).+$/',$name))
          {
               $this->errors['bookCategoryName'] = "Can n't use double spaces";
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
               $this->errors['bookCategoryName'] = "Only letters and white space are allowed";
               //"Only letters allowed in category name";
          }
          if(!preg_match('/^(?!.*\s{2}).+$/',$name))
          {
               $this->errors['bookCategoryName'] = "Cann't use double spaces";
               //"Only letters allowed in category  name";
          }
           
          $data=new BookCategory();

          $category = $data->findAll();

          foreach($category as $row):



               if($row->CategoryID!=$id && $row->Name==$name){
                    $this->errors['bookCategoryName'] = "This Category is already exists.";

               }
          endforeach;
        
          if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
     }

    }
    
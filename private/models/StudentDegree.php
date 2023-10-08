<?php

class StudentDegree extends Model
{



    public function validate($DATA)
    {
         $this->errors = array();
         
         
         if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['Name']))
         {
              $this->errors['bookCategoryName'] = "Only letters and white space are allowed";
              //"Only letters allowed in category  name";
         }

         if($this->where('Name',($DATA['Name'])))
         {
              $this->errors['bookCategoryName'] = "This Subject is already exists.";
         }

         if(!preg_match('/^(?!.*\s{2}).+$/',$DATA['Name']))
         {
              $this->errors['bookCategoryName'] = "Canno't use double spaces";
              //"Only letters allowed in category  name";
         }



         if(count($this->errors) == 0)
         {
              return true;
         }

         return false;
    }



    public function validateEdit($DATA,$id)
    {
         $this->errors = array();
         
         
         if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['Name']))
         {
              $this->errors['bookCategoryName'] = "Only letters and white space are allowed";
              //"Only letters allowed in category  name";
         }
         
         if(!preg_match('/^(?!.*\s{2}).+$/',$DATA['Name']))
         {
              $this->errors['bookCategoryName'] = "Cann't use double spaces";
              //"Only letters allowed in category  name";
         }
         
         $data=new StudentDegree();

          $category = $data->findAll();

          foreach($category as $row):
               if($row->ID!=$id && $row->Name==$name){
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
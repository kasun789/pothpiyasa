<?php 
    class RequestBooks  extends Model
    {

 
        public function validateRequestBooks($DATA,$id){
        
               print_r($DATA);
            $this->errors = array();
            
           
            if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['bookTitle']))
            {
                 $this->errors['bookTitle'] = "Only letters and white space are allowed";
                 //"Only letters allowed in name";
            }
            if(empty($DATA['bookTitle']))
                {
                        $this->errors['bookTitle'] = "Please Enter Book Title.";

                }

           if(!preg_match('/^(?!.*\s{2}).+$/',$DATA['bookTitle']))
                {
                     $this->errors['bookTitle'] = "Canno't use double spaces";
                     //"Only letters allowed in category  name";
                }
            
          
  
            //check Author

            if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['bookAuthor']))
            {
                 $this->errors['bookAuthor'] = "Only letters and white space are allowed";
                 //"Only letters allowed in name";
            }

            if(empty($DATA['bookAuthor']))
            {
                 $this->errors['bookAuthor'] = "Please Enter Author.";
  
            }

            if(!preg_match('/^(?!.*\s{2}).+$/',$DATA['bookAuthor']))
            {
                 $this->errors['bookAuthor'] = "Canno't use double spaces";
                 //"Only letters allowed in category  name";
            }

            //check already request that book
            $book=new Book();
            $rows=$book->where('Title',($DATA['bookTitle']));
            if($rows){
               foreach ($rows as $row) {

                    if (($row->AuthorName == $DATA['bookAuthor']) && ($row->Edition == $DATA['bookEdition'])) {
                         $this->errors['bookTitle'] = "This book already is in the UCSC library.";

                    }

            }
            
          }
            // //check published year
           

            if(!empty($DATA['bookPublishedYear']) && ((!is_numeric($DATA['bookPublishedYear'])) || ($DATA['bookPublishedYear']<=1995 || $DATA['bookPublishedYear']>=date("Y"))))
            {
                 $this->errors['bookPublishedYear'] = "Please Enter Correct Year.";
            }

            // //check edition
           

            if(!empty($DATA['bookEdition']) && ((!is_numeric($DATA['bookEdition'])) || ($DATA['bookEdition']>20 || $DATA['bookEdition']<1)))
            {
                 $this->errors['bookEdition'] = "Please Enter correct Edition.";
            }


            
          if (count($this->errors) == 0) {

            return true;


       }

       return false;
  
      
  
         
  
            
  }
    }
    ?>
    
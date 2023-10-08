<?php 
    class ReceivedBookList extends Model
    {
        public function validateReceivedBookListBulkAdd($row)
        {
    
            $this->errors = array();
    
            //Check for first name
    
            if (empty(trim($row[0]))) {
                $this->errors['BookTitle'] = "There are one or more empty book title(s). Kindly review the book titles for accuracy.";
            }

            if (empty(trim($row[1]))) {
                $this->errors['AuthorName'] = "There are one or more empty author name(s). Kindly review the author names for accuracy.";
            }
    
            if (empty(trim($row[2]))) {
                $this->errors['Edition'] = "There are one or more empty edition(s). Kindly review the edition for accuracy.";
            }

            if (empty(trim($row[3]))) {
                $this->errors['PublishedYear'] = "There are one or more empty published year(s). Kindly review the published years for accuracy.";
            }
    
    
            if (count($this->errors) == 0) {
    
                return true;
            }
    
            return false;
    
        }
    }
    
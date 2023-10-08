<?php

class Holiday extends Model
{
    public function validateHolidayBulkAdd($row)
    {

        $this->errors = array();

        //Check for first name

        if (empty(trim($row[0]))) {
            $this->errors['Holiday_title'] = "There are one or more empty holiday title(s). Kindly review the holiday title for accuracy ";
        }

        if (empty(trim($row[2]))) {
            $this->errors['Holiday_start'] = "There are one or more empty holiday start(s). Kindly review the holiday start for accuracy";
        }


        if (count($this->errors) == 0) {

            return true;
        }

        return false;

    }

}
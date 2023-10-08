<?php

class Holidays extends Controller
{
    
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
        
        $holiday = new Holiday();

        $data = $holiday->findAll();

        //$data comes as array of items (Array ( [0] => stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212....)
    
        //In view method, it extract the data (['rows'] => $data; --> $rows = $data;)
        $this->view('admin/holidays', ['rows' => $data]);


    }

    public function getHolidayDetails(){
        
        $holiday = new Holiday();


        $data = $holiday->findAll();
        header_remove();
        header('Content-Type: application/json;');
        echo json_encode($data);
    }

    public function add()
    {
        
        $holiday = new Holiday();

        $data = $holiday->findAll();

        if (isset($_POST['addHoliday'])) {

            if (count($_POST) > 0) {

                $holidayData['Holiday_title'] = $_POST['Holiday_title'];
                $holidayData['Holiday_description'] = $_POST['Holiday_description'];
                $holidayData['Holiday_start'] = $_POST['Holiday_start'];
                $holidayData['Holiday_end'] = $_POST['Holiday_end'];

                print_r($holidayData);

                $holiday->insert($holidayData);
                $this->redirect('holidays');

            }
        }

    }

    public function edit($id = null)
    {
        if (isset($_POST['editHoliday'])) {

            // echo json_encode($_POST);


            $holiday = new Holiday();

            $holidayData['Holiday_title'] = $_POST['Holiday_title'];
            $holidayData['Holiday_description'] = $_POST['Holiday_description'];
            $holidayData['Holiday_start'] = $_POST['Holiday_start'];
            $holidayData['Holiday_end'] = $_POST['Holiday_end'];

            $holiday->update('HolidayID',$id, $holidayData);

            $this->redirect('holidays');

        }
    }

    public function delete($id = null)
    {
        if (isset($_POST['deleteHoliday'])) {
            
            $holiday = new Holiday();

            $holiday->delete('HolidayID',$id);

            $this->redirect('holidays');


        }

    }

    public function getCalendarDetails(){
        
        $holiday = new Holiday();

        $data = $holiday->findAll();
        
        header_remove();
        header('Content-Type: application/json;');
        echo json_encode($data);
    }


}
<?php

class ConfigSettings extends Controller
{
    public function index(){

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }
        
    }
    public function fineSettings()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $flag = array(0);


        $fine = new FineCalculation();

        $data = $fine->findAll();

        if (count($_POST) > 0) {

            if (isset($_POST['saveChanges'])) {

                $fineData['FineForFirstDay'] = $_POST['FineForFirstDay'];
                $fineData['FinePerDay'] = $_POST['FinePerDay'];
                $fineData['FinePerHour'] = $_POST['FinePerHour'];
                $fineData['WorkableHoursPerDay'] = $_POST['WorkableHoursPerDay'];

                $fine->update('ID', 1, $fineData);

                $flag[0] = 1;

            }
 
        }

        if (isset($_POST['resetFine'])) {

            $fineData['FineForFirstDay'] = 20;
            $fineData['FinePerDay'] = 8;
            $fineData['FinePerHour'] = 1;
            $fineData['WorkableHoursPerDay'] = 8;

            $fine->update('ID', 1, $fineData);

            $this->redirect('configsettings/fineSettings');

        }

        //Recording the particular event
        record_Events(Auth::profileID(),"VIEW_CONFIG_SETTINGS");

        $this->view('admin/configSettings', ['rows' => $data , 'flag' => $flag]);

    }

    public function privilegeSettings()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $flag = array(0);


        $configuration = new Configuration();

        $data = $configuration->findAll();

        if (count($_POST) > 0) {

            if (isset($_POST['saveChanges'])) {

                $privilegeData['NoOfBooksPL'] = $_POST['BooksForLecturers'];
                $privilegeData['NoOfDaysPL'] = $_POST['DaysForLecturers'];
                $privilegeData['NoOfBooksAC'] = $_POST['BooksForAcademic'];
                $privilegeData['NoOfDaysAC'] = $_POST['DaysForAcademic'];
                $privilegeData['NoOfBooksNONAC'] = $_POST['BooksForNonacademic'];
                $privilegeData['NoOfDaysNONAC'] = $_POST['DaysForNonacademic'];

                $configuration->update('ID', 1, $privilegeData);

                $flag[0] = 1;

            }
 
        }

        if (isset($_POST['resetFine'])) {

            $privilegeData['NoOfBooksPL'] = 4;
            $privilegeData['NoOfBooksAC'] = 2;
            $privilegeData['NoOfDaysAC'] = 14;
            $privilegeData['NoOfBooksNONAC'] = 2;
            $privilegeData['NoOfDaysNONAC'] = 14;
            $privilegeData['NoOfDaysPL'] = 20;

            $configuration->update('ID', 1, $privilegeData);

            $this->redirect('configsettings/privilegeSettings');

        }

        //Recording the particular event
        record_Events(Auth::profileID(),"VIEW_PRIVILEGE_CONFIG_SETTINGS");

        $this->view('admin/configSettingsNext', ['rows' => $data , 'flag' => $flag]);

    }




}
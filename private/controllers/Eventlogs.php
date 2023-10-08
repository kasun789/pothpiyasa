<?php

class Eventlogs extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $eventlog = new EventLog();

        //Pagination start ---------------------------------

        //Getting total number of records
        $queryRecords = "SELECT COUNT(ID) AS total_rows FROM eventlog";
        $totalRows = $eventlog->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 20;
        $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;

        $offset = ($page_number - 1) * $rows_per_page;

        //Finding page numbers
        $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

        //Search page
        if (isset($_POST['page_search_button'])) {

            //Eg: (Location: http://localhost/pothpiyasa/public/home)
            header("Location: " . ROOT . "/eventlogs?page=" . $_POST['go_to_page']);
            die;
        }

        //Pagination end ------------------------------------

        //Default query (Without filtering)
        $query = "SELECT * FROM eventlog ORDER BY Date DESC LIMIT $rows_per_page OFFSET $offset";


        if (isset($_POST['filter_typo_search'])) {


            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];

            $column = $_POST['logevents_filter_typo'];
            $value = $_POST['logevents_filter_typo_input'];


            //Pagination start ---------------------------------

            //Getting total number of records
            $queryRecords = sprintf("SELECT COUNT(ID) AS total_rows FROM eventlog WHERE DATE(Date) BETWEEN '%s' AND '%s'", $from_date, $to_date);
            $totalRows = $eventlog->query($queryRecords);
            $totalRows = $totalRows[0]->total_rows;

            $rows_per_page = 100;
            $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $page_number = $page_number < 1 ? 1 : $page_number;

            $offset = ($page_number - 1) * $rows_per_page;

            //Finding page numbers
            $page_numbers = pagination_finder($totalRows, $rows_per_page, $page_number);

            //Search page
            if (isset($_POST['page_search_button'])) {

                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: " . ROOT . "/eventlogs?page=" . $_POST['go_to_page']);
                die;
            }

            //Pagination end ------------------------------------


            if ($column == 'UserID') {
                $queryDate = sprintf("SELECT * FROM eventlog WHERE DATE(Date) BETWEEN '%s' AND '%s' AND UserID = $value ORDER BY Date ASC LIMIT $rows_per_page OFFSET $offset", $from_date, $to_date);
                $data = $eventlog->query($queryDate);


            } elseif ($column == 'UserName') {
                $queryDate = sprintf("SELECT * FROM eventlog WHERE DATE(Date) BETWEEN '%s' AND '%s' AND UserName = '%s' ORDER BY Date ASC LIMIT $rows_per_page OFFSET $offset", $from_date, $to_date, $value);
                $data = $eventlog->query($queryDate);

            } elseif ($column == 'MemberType') {
                $queryDate = sprintf("SELECT * FROM eventlog WHERE DATE(Date) BETWEEN '%s' AND '%s' AND MemberType = '%s' ORDER BY Date ASC LIMIT $rows_per_page OFFSET $offset", $from_date, $to_date, $value);
                $data = $eventlog->query($queryDate);

            } elseif ($column == 'Event') {
                $queryDate = sprintf("SELECT * FROM eventlog WHERE DATE(Date) BETWEEN '%s' AND '%s' AND Event = '%s' ORDER BY Date ASC LIMIT $rows_per_page OFFSET $offset", $from_date, $to_date, $value);
                $data = $eventlog->query($queryDate);

            } else {
                $data = $eventlog->query($query);
            }


        } else {
            $data = $eventlog->query($query);

        }


        //In view method, it extract the data (['rows'] => $data; --> $rows = $data;)
        $this->view('admin/eventlog', ['rows' => $data, 'page_numbers' => $page_numbers]);
    }

}
<?php

use Dompdf\Dompdf;
use Dompdf\Options;
require_once __DIR__ . '/../models/dompdf/autoload.php';

class Reports extends Controller
{
    
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
        
        $this->view('admin/reports/main.report');

    }

    public function issued_books()
    {
        
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $issuebook = new IssueBook();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(IssueKey) AS total_rows FROM issuebook";
        $totalRows = $issuebook->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/issued_books?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM issuebook ORDER BY IssuedDate DESC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end

        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                $data = $issuebook->where($column, $value);

            } elseif ($column == 'UserID') {
                $data = $issuebook->where($column, $value);

            } elseif ($column == 'StaffID') {
                $data = $issuebook->where($column, $value);

            } else {
                $data = $issuebook->query($query);
            }

        } else {

             $data = $issuebook->query($query);
            
        }

        
        $this->view('admin/reports/issued.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function damaged_books()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $book = new Book();

        //Pagination 

        $page_numbers = array();

        $conditionValue = "Damaged";

        //Getting total number of records
        $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book WHERE InventoryCondition = :conditionValue";
        $totalRows = $book->query($queryRecords,['conditionValue' => $conditionValue]);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/damaged_books?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        
        
        $query = "SELECT * FROM book WHERE InventoryCondition = :conditionValue ORDER BY Title ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end

        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                //Here when we passing data in sql query we have to give that as parameter to query function
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'ISBN') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'Title') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } else {
                $data = $book->query($query,['conditionValue' => $conditionValue]);
            }

        } else {

             $data = $book->query($query,['conditionValue' => $conditionValue]);
            
        }

        
        $this->view('admin/reports/damaged.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function returned_books()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $issuebook = new IssueBook();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(IssueKey) AS total_rows FROM issuebook";
        $totalRows = $issuebook->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/returned_books?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM issuebook ORDER BY IssuedDate DESC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                $data = $issuebook->where($column, $value);

            } elseif ($column == 'UserID') {
                $data = $issuebook->where($column, $value);

            } elseif ($column == 'StaffID') {
                $data = $issuebook->where($column, $value);

            } else {
                $data = $issuebook->query($query);
                
            }

        } else {

            $data = $issuebook->query($query);
            
        }
        
        $this->view('admin/reports/returned.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function withdrawn_books()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $book = new Book();

        //Pagination 

        $page_numbers = array();

        //Condition of book ************
        $conditionValue = "Withdrawn";

        //Getting total number of records
        $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book WHERE InventoryCondition = :conditionValue";
        $totalRows = $book->query($queryRecords,['conditionValue' => $conditionValue]);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/withdrawn_books?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        
        
        $query = "SELECT * FROM book WHERE InventoryCondition = :conditionValue ORDER BY Title ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end

        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                //Here when we passing data in sql query we have to give that as parameter to query function
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'ISBN') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'Title') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } else {
                $data = $book->query($query,['conditionValue' => $conditionValue]);
            }

        } else {

             $data = $book->query($query,['conditionValue' => $conditionValue]);
            
        }

        
        $this->view('admin/reports/withdrawn.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function lost_books()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $book = new Book();

        //Pagination 

        $page_numbers = array();

        $conditionValue = "Lost";

        //Getting total number of records
        $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book WHERE InventoryCondition = :conditionValue";
        $totalRows = $book->query($queryRecords,['conditionValue' => $conditionValue]);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/lost_books?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        
        
        $query = "SELECT * FROM book WHERE InventoryCondition = :conditionValue ORDER BY Title ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end

        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                //Here when we passing data in sql query we have to give that as parameter to query function
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'ISBN') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } elseif ($column == 'Title') {
                $query = "SELECT * FROM book WHERE $column = :value AND InventoryCondition = :conditionValue ";
                $data = $book->query($query, ['value' => $value,'conditionValue' => $conditionValue]);

            } else {
                $data = $book->query($query,['conditionValue' => $conditionValue]);
            }

        } else {

             $data = $book->query($query,['conditionValue' => $conditionValue]);
            
        }

        
        $this->view('admin/reports/lost.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function fine_report()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $issuebook = new IssueBook();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(IssueKey) AS total_rows FROM issuebook WHERE FineStatus = 1";
        $totalRows = $issuebook->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/fine_report?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM issuebook WHERE FineStatus = 1 ORDER BY IssuedDate DESC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND FineStatus = 1 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } elseif ($column == 'UserID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND FineStatus = 1 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } elseif ($column == 'StaffID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND FineStatus = 1 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } else {
                $data = $issuebook->query($query);
                
            }

        } else {

            $data = $issuebook->query($query);
            
        }
        
        $this->view('admin/reports/fine.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }


    public function inventory_report()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $issuebook = new IssueBook();
        $book = new Book();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book";
        $totalRows = $issuebook->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/inventory_report?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM book ORDER BY Title ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                $query = "SELECT * FROM book WHERE $column = :value";
                $data = $book->query($query, ['value' => $value]);

            } elseif ($column == 'UserID') {
                $query = "SELECT * FROM book WHERE $column = :value";
                $data = $book->query($query, ['value' => $value]);

            } elseif ($column == 'StaffID') {
                $query = "SELECT * FROM book WHERE $column = :value";
                $data = $book->query($query, ['value' => $value]);

            } else {
                $data = $book->query($query);
                
            }

        } else {

            $data = $book->query($query);
            
        }
        
        $this->view('admin/reports/inventory.report',['rows' => $data,'page_numbers' =>$page_numbers]);
        

    }

    
    public function fine_payment()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $issuebook = new IssueBook();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(IssueKey) AS total_rows FROM issuebook WHERE ReturnStatus = 1 AND FineStatus = 0";
        $totalRows = $issuebook->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/fine_payment?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM issuebook WHERE ReturnStatus = 1 AND FineStatus = 0 ORDER BY IssuedDate DESC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'BookID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND ReturnStatus = 1 AND FineStatus = 0 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } elseif ($column == 'UserID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND ReturnStatus = 1 AND FineStatus = 0 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } elseif ($column == 'StaffID') {
                $query = "SELECT * FROM issuebook WHERE $column = :value AND ReturnStatus = 1 AND FineStatus = 0 ";
                $data = $issuebook->query($query, ['value' => $value]);

            } else {
                $data = $issuebook->query($query);
                
            }

        } else {

            $data = $issuebook->query($query);
            
        }
        
        $this->view('admin/reports/finePayment.report',['rows' => $data,'page_numbers' =>$page_numbers]);

        

    }


    public function donors()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $donor = new Donor();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(DonorID) AS total_rows FROM donor";
        $totalRows = $donor->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/donors?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM donor ORDER BY Name ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'Name') {
                $data = $donor->where($column, $value);

            } elseif ($column == 'Email') {
                $data = $donor->where($column, $value);

            } else {
                $data = $donor->query($query);
                
            }

        } else {

            $data = $donor->query($query);
            
        }
        
        $this->view('admin/reports/donors.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }

    public function vendors()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $vendor = new Vendor();

        //Pagination 

        $page_numbers = array();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(VendorID) AS total_rows FROM vendor";
        $totalRows = $vendor->query($queryRecords);
        $totalRows = $totalRows[0]->total_rows;

        $rows_per_page = 8;
        $page_number = isset($_GET['page']) ? (int)$_GET['page']:1;
        $page_number = $page_number <1 ? 1:$page_number;
        $offset = ($page_number -1)*$rows_per_page;

        //First page
        $page_numbers['first_page_no'] = 1;

        //Last page
        $last_page_no = ceil($totalRows/$rows_per_page);
        $page_numbers['last_page_no'] = $last_page_no;

        //Next page
        if($page_number >=$last_page_no ){
            $page_numbers['next_page_no'] = NULL;

        }else{
            $next_page_no = $page_number+1;
            $page_numbers['next_page_no'] = $next_page_no;
        }

        //previous page
        if($page_number <=1 ){
            $page_numbers['previous_page_no'] = NULL;

        }else{
            $previous_page_no = $page_number-1;
            $page_numbers['previous_page_no'] = $previous_page_no;
        }

        //Current page
        $page_numbers['current_page_no'] = $page_number;

        //Search page

        // $page_numbers['search_page_no'] = 1;

            if(isset($_POST['page_search_button'])){
                
                //Eg: (Location: http://localhost/pothpiyasa/public/home)
                header("Location: ". ROOT . "/reports/vendors?page=".$_POST['go_to_page']);
                die;
            }

            // print_r($page_numbers);
        
        

        $query = "SELECT * FROM vendor ORDER BY Name ASC LIMIT $rows_per_page OFFSET $offset";

        //Pagination end


        if (isset($_POST['issue_filter_typo_search'])) {

            $column = $_POST['issue_user_filter_typo'];

            $value = $_POST['issue_user_filter_typo_input'];

            if ($column == 'Name') {
                $data = $vendor->where($column, $value);

            } elseif ($column == 'Email') {
                $data = $vendor->where($column, $value);

            } else {
                $data = $vendor->query($query);
                
            }

        } else {

            $data = $vendor->query($query);
            
        }
        
        $this->view('admin/reports/vendors.report',['rows' => $data,'page_numbers' =>$page_numbers]);

    }
    
    

}
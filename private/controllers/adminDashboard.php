<?php

class AdminDashboard extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        
        $books = new Book();
        $users = new User();
        $issueBooks = new IssueBook();
        $bookCopies = new BookCopy();

        // $bookCategories = new BookCategory();

        //Getting total number of records
        $queryRecords = "SELECT COUNT(UserID) AS total_rows FROM user";
        $totalUsers = $users->query($queryRecords);
        $totalUsers = $totalUsers[0]->total_rows;
        $data['totalUsers'] = $totalUsers;

        // $queryRecords = "SELECT COUNT(BookID) AS total_rows FROM book";
        // $totalBooks = $books->query($queryRecords);
        // $totalBooks = $totalBooks[0]->total_rows;
        $data['totalBooks'] = sizeof($books->findAll())+sizeof($bookCopies->findAll());
        
        $date = date("Y-m-d");

        $userData['date'] = $date;
        
        $queryRecords = "SELECT COUNT(UserID) AS total_today_rows FROM user WHERE DATE(AddDate) = :date";
        $totaTodaylUsers = $users->query($queryRecords,$userData);
        $totaTodaylUsers = $totaTodaylUsers[0]->total_today_rows;
        $data['totaTodaylUsers'] = $totaTodaylUsers;

        $queryRecords = "SELECT COUNT(IssueKey) AS total_today_rows FROM issuebook WHERE DATE(IssuedDate) = :date";
        $totaTodaylBooks = $issueBooks->query($queryRecords,$userData);
        $totaTodaylBooks = $totaTodaylBooks[0]->total_today_rows;
        $data['totaTodaylBooks'] = $totaTodaylBooks;



        // $data['noBooks']= sizeof($books->findAll());
        // $data['Users'] = $users->findAll();


        $onlineuser = new OnlineUser();


        $queryUser = "SELECT * FROM onlineuser ORDER BY Date ASC ";
        $onlineuserdata = $onlineuser->query($queryUser);

        
        $this->view('admin/adminDashboard',['rows'=>$data,'online_user_rows' => $onlineuserdata]);
    }
}
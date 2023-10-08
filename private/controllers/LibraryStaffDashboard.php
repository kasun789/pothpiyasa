<?php

class LibraryStaffDashboard extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
        $data = array();
        $books = new Book();
        $users = new User();
        $issueBooks = new IssueBook();
        $bookCategories = new BookCategory();
        $bookCopies = new BookCopy();
        
        $data['noBooks']= sizeof($books->findAll())+sizeof($bookCopies->findAll());
        $data['noUsers'] = sizeof($users->findAll());
        $data['noIssue'] = sizeof($issueBooks->findAll());
        $data['categories'] = $bookCategories->findAll();
        $data['twbooks'] = get_bookCount('InventoryCondition','T-Withdrawn')+ get_book_copy_Count('InventoryCondition','T-Withdrawn');
        $data['dbooks'] = get_bookCount('InventoryCondition','Damaged') + get_book_copy_Count('InventoryCondition','Damaged');
        $data['wbooks'] = get_bookCount('InventoryCondition','Withdrawn') + get_book_copy_Count('InventoryCondition','Withdrawn');

        $onlineuser = new OnlineUser();

        $queryUser = "SELECT * FROM onlineuser ORDER BY Date ASC ";
        $onlineuserdata = $onlineuser->query($queryUser);

        $this->view('librarystaff\home',['rows'=>$data, 'online_user_rows'=>$onlineuserdata]);
    }
}

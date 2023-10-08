<?php

//book categories controller
class BookCategories extends Controller
{

    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $category = new BookCategory();
        $data = $category->findAll();
        
        record_Events(Auth::profileID(),"VIEW_DEFINE_CATEGORIES");

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/bookcategories.add');
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bookcategories.add');
        } 
    }

   

    public function add($name="")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);
        $errorcontent=array();

       // print_r($name);
         
        if(!empty($name))
        {

            //print_r($name."    hi");

            
            $category = new BookCategory();
           
            if($category->validate($name))
            {
               
                
                $categoryData['Name'] = $name;
                
                //get staffid from userid
                $value = Auth::profileID();
                $categoryData['AddStaffID'] = get_staffid('UserID', $value);
            
                
                $category->insert($categoryData);

                $flag[0] = 1;

           
            }else{
                
                $errors = $category->errors;
                $errorcontent[0]=$name;

                //print_r($errors);
                
            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/bookcategories.add', ['errors' => $errors, 'flag' => $flag, 'errorcontent'=>$errorcontent]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bookcategories.add', ['errors' => $errors, 'flag' => $flag, 'errorcontent'=>$errorcontent]);
        } 

    }

    public function edit($id = null,$name="")
    {

        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

       
        $errors = array();
        $flag = array(0);
        $errorcontent=array();


        $category = new BookCategory();

       
        //Getting existing data from database
        $row = $category->where('CategoryID', $id);

        if(!empty($name)){
           
            
            if ($category->validateEdit($name,$id)) {

                $categoryData['Name'] = $name;
               
                 //get staffid from userid
                 $value = Auth::profileID();
                 $categoryData['AddStaffID'] = get_staffid('UserID', $value);
 

                

                //Insert data to user table
                $category->update('CategoryID',$id, $categoryData);

                


                
               $this->redirect('bookcategories/add');
               $flag[0] = 1;





            } else {
                $errors = $category->errors;
                $errorcontent[0]=$name;

                //print_r($errors);

            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/bookcategories.edit', ['row' => $row,'errors' => $errors, 'flag' => $flag, 'errorcontent'=>$errorcontent]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/bookcategories.edit', ['row' => $row,'errors' => $errors, 'flag' => $flag, 'errorcontent'=>$errorcontent]);
        } 
        // $this->view('librarian/bookcategories.edit',['row' => $row,'errors'=>$errors,'flag'=>$flag]);
    }

    public function delete($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $category = new BookCategory();

        //Getting existing data from database
        $row = $category->where('CategoryID', $id);

      
          
            //Delete data from user table
            $category->delete('CategoryID',$id);
           $this->redirect('bookcategories/add');

    } 
    
    

}


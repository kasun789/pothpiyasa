<?php


//Lending categories controller
class LendingCategories extends Controller
{

    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $category = new LendingCategory();
        

        $this->view('librarian/lendingcategories.add');
    }

  public function add($name="",$description="")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        
        $errors = array();
        $flag = array(0);
        $errorcontent=array();

    
        if(!empty($name))
        {
            $category = new LendingCategory();
           
            if($category->validate($name))
            {
                

                $categoryData['CategoryName'] = $name;
                $categoryData['Description'] = $description;

                //get staffid from userid
                $value = Auth::profileID();
                $categoryData['AddStaffID'] = get_staffid('UserID', $value);


                $category->insert($categoryData);

                //$this->redirect('librariandashboard/home');
                $flag[0] = 1;

           


            }else{
                
                $errors = $category->errors;
                $errorcontent[0]=$name;
                $errorcontent[1]=$description;


                //print_r($errors);
                
            }
        }
        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/lendingcategories.add',['errors' => $errors,'errorcontent'=>$errorcontent]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/lendingcategories.add',['errors' => $errors,'errorcontent'=>$errorcontent]);
        } 
    }


    
    public function edit($id = null,$name="",$description="")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

       
        $errors = array();
        $flag = array(0);
        $errorcontent=array(0);


        $category = new LendingCategory();

       
        //Getting existing data from database
        $row = $category->where('LendingID', $id);

        if (!empty($name)) {

           
            
            if ($category->validateEdit($name,$id)) {

                $categoryData['CategoryName'] = $name;
                $categoryData['Description'] = $description;

                 //get staffid from userid
                 $value = Auth::profileID();
                 $categoryData['AddStaffID'] = get_staffid('UserID', $value);
 

                

                //Insert data to user table
                $category->update('LendingID',$id, $categoryData);

                


                $this->redirect("lendingcategories/add");
               $flag[0] = 1;





            } else {
                $errors = $category->errors;
                $errorcontent[0]=$name;
                $errorcontent[1]=$description;

                //print_r($errors);

            }
        }

        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/lendingcategories.edit',['row' => $row,'errors'=>$errors,'flag'=>$flag,'errorcontent'=>$errorcontent]);
        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/lendingcategories.edit',['row' => $row,'errors'=>$errors,'flag'=>$flag,'errorcontent'=>$errorcontent]);
        } 

        // $this->view('librarian/lendingcategories.edit',['row' => $row,'errors'=>$errors,'flag'=>$flag]);
    }

    public function delete($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $category = new LendingCategory();

        //Getting existing data from database
        $row = $category->where('LendingID', $id);

      
          
            //Delete data from user table
            $category->delete('LendingID',$id);
           $this->redirect('lendingcategories/add');

    } 
    
    
}
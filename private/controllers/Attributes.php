<?php

//PatronCategories controller
class Attributes extends Controller
{

  // viewtable

    public function lectureradd($type=" ")
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);
        $errorcontent=array();
   
        if(count($_POST) > 0)
        {
           

            if(  $_POST['Description']=="type"){

                $lectype = new LecturerType();   


                
                   if($_POST['Name'] && isset($_POST['paadd'])){

                    if($lectype->validate($_POST))
                       {

                            $lectypeData['Name'] = $_POST['Name'];
                        
            
                            
                            //get staffid from userid
                        
            
                            $lectype->insert($lectypeData);
                            $rows= $lectype->findAll();


                   }
                    else{
                    
                        $errors = $lectype->errors;
                        $rows= $lectype->findAll();

                        //print_r($errors);
                        
                    
                        
                        } 
                    }
                 else{
                    if(isset($_POST['paadd1'])){
                        $rows= $lectype->findAll();

                    }
                    else{
                        $rows= $lectype->findAll();

                    }
                   }
                 
              
                   
                    //$this->redirect('librariandashboard/home');
                    
    
               
    
    
              
        }else if($_POST['Description']=="subject"){
                $lecsubject = new LecSubject();
     
                if($_POST['Name'] && isset($_POST['paadd'])){

                        if($lecsubject->validate($_POST))
                            {
                        
                 
              
                                $lecsubjectData['Name'] = $_POST['Name'];
                            
                
                                
                                //get staffid from userid
                            
                
                                $lecsubject->insert($lecsubjectData);
                                $rows= $lecsubject->findAll();
                   }
                    else{
                        
                        $errors = $lecsubject->errors;
                        $rows= $lecsubject->findAll();

                        //print_r($errors);
                        
                    }
        }
    
                    //$this->redirect('librariandashboard/home');
                    else{
                        if(isset($_POST['paadd1'])){
                            $rows= $lecsubject->findAll();

                        }
                        else{
                            $rows= $lecsubject->findAll();

                        }

                    }
    
               
    
    
              

            }
            else{
                $lecdepart = new LecturerDepartment();
     
                if($_POST['Name'] && isset($_POST['paadd'])){

                        if($lecdepart->validate($_POST))
                        {
                   
                 
              
                    $lecdepartData['Name'] = $_POST['Name'];
                  
    
                    
                    //get staffid from userid
                   
    
                    $lecdepart->insert($lecdepartData);
                    $rows= $lecdepart->findAll();
                   
                }else{
                    
                    $errors = $lecdepart->errors;
                    $rows= $lecdepart->findAll();

                    //print_r($errors);
                    
                }

    
                    //$this->redirect('librariandashboard/home');
                }else{
                        if(isset($_POST['paadd1'])){
                            $rows= $lecdepart->findAll();

                        }
                        else{
                            $rows= $lecdepart->findAll();


                        }

                    }
    
               
    
    
               

            }
        }
        else{

            if($type==" " || $type=="Type"){
                $lectype = new LecturerType();   
                $rows= $lectype->findAll();
            }
    
            else if($type=="Sub"){
                $lectype = new LecSubject();
                $rows= $lectype->findAll();
    
            }
    
            else if($type=="Dep"){
                $lectype = new LecturerDepartment();
                $rows= $lectype->findAll();
    
            }
            
        }
           
        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        } else {
            // $this->view('librarian/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        }

    }

    public function lectureredit($type= "null",$id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $errors = array();
        $flag = array(0);

        if(  $type=="Type"){
            $ltype = new LecturerType();
            $rows= $ltype->findAll();


            $row = $ltype->where('ID', $id);

            if (count($_POST) > 0) {

           
            
                if ($ltype->validateEdit($_POST,$id)) {
    
                   
    
                    $ltypeData['Name'] = $_POST['Name'];
    
                    
                    //get staffid from userid
                   
    
     
    
                    
                        
                    //Insert data to user table
                    $ltype->update('ID',$id, $ltypeData);

                   $this->redirect('attributes/lectureradd/Type');
                  
    
    
    
    
    
                } else {
                    $errors = $ltype->errors;
                    //print_r($errors);
    
                }
            }

        }

       

        else if(  $type=="Sub"){
            $ltype = new LecSubject();
            $rows= $ltype->findAll();

         
            $row = $ltype->where('ID', $id);

            if (count($_POST) > 0) {

           
            
                if ($ltype->validateEdit($_POST,$id)) {
    
                   
    
                    $ltypeData['Name'] = $_POST['Name'];
    
                    
                    //get staffid from userid
                   
    
     
    
                    
                        
                    //Insert data to user table
                    $ltype->update('ID',$id, $ltypeData);
    
                
    
    
                    
                   $this->redirect('attributes/lectureradd/Sub');
                  
    
    
    
    
    
                } else {
                    $errors = $ltype->errors;
                    //print_r($errors);
    
                }
            }

        }


        else{
            $ltype = new LecturerDepartment();
            $rows= $ltype->findAll();


            $row = $ltype->where('ID', $id);

            if (count($_POST) > 0) {

           
            
                if ($ltype->validateEdit($_POST,$id)) {
    
                   
    
                    $ltypeData['Name'] = $_POST['Name'];
    
                    
                    //get staffid from userid
                   
    
     
    
                    
                        
                    //Insert data to user table
                    $ltype->update('ID',$id, $ltypeData);
    
                
    
    
                    
                   $this->redirect('attributes/lectureradd/Dep');
                  
    
    
    
    
    
                } else {
                    $errors = $ltype->errors;
                    //print_r($errors);
    
                }
            }

        }

        //Getting existing data from database

       
        if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
            $this->view('librarian/lecturerattributes.edit',['row' => $row,'rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
            $this->view('admin/lecturerattribute.edit',['rows' => $row,'rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        } else {
            // $this->view('librarian/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

        }
        
    }

    public function lecturerdelete($type= "null",$id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

      
        if(  $type=="Type"){
            $ltype = new LecturerType();

            $row = $ltype->where('ID', $id);
      
             
            //Delete data from user table
            $ltype->delete('ID',$id);
            $this->redirect('attributes/lectureradd/Type');

    } 
    
    else if(  $type=="Sub"){
        $ltype = new LecSubject();

        $row = $ltype->where('ID', $id);
  
         
        //Delete data from user table
        $ltype->delete('ID',$id);
        $this->redirect('attributes/lectureradd/Sub');

     } 

     else{
        $ltype = new LecturerDepartment();

        $row = $ltype->where('ID', $id);
  
         
        //Delete data from user table
        $ltype->delete('ID',$id);
        $this->redirect('attributes/lectureradd/Dep');

} 


    

}






public function studentadd($type=" ")
{
    if (!Auth::logged_in()) {
        $this->redirect('Login');
    }


    $errors = array();
    $flag = array(0);

    if(count($_POST) > 0)
    {
       

        if(  $_POST['Description']=="degree"){

            $lectype = new StudentDegree();   

            if(!empty($_POST['Name']) && isset($_POST['paadd112'])){

                if($lectype->validate($_POST))
                {

                    $lectypeData['Name'] = $_POST['Name'];
                

                    
                    //get staffid from userid
                

                    $lectype->insert($lectypeData);
                    $rows= $lectype->findAll();


                            }else{
                            
                                $errors = $lectype->errors;
                                $rows= $lectype->findAll();
                
                                //print_r($errors);
                                
                            
                                
                        } }
               else{
                if(isset($_POST['paadd11'])){
                    $rows= $lectype->findAll();

                }
                else{
                    $rows= $lectype->findAll();

                }
               }
             
          
               
                //$this->redirect('librariandashboard/home');
                

           


        
    }else if($_POST['Description']=="batch"){
            $lecsubject = new StudentBatch();
 
            if(!empty($_POST['Name']) && isset($_POST['paadd112'])){

                    if($lecsubject->validate($_POST))
                    {
                    
                    
                
                        $lecsubjectData['Name'] = $_POST['Name'];
                    

                        
                        //get staffid from userid
                    

                        $lecsubject->insert($lecsubjectData);
                        $rows= $lecsubject->findAll();
                    
                    }else{
                
                        $errors = $lecsubject->errors;
                        $rows= $lecsubject->findAll();
        
                        //print_r($errors);
                        
                    }}

                //$this->redirect('librariandashboard/home');
                else{
                    if(isset($_POST['paadd11'])){
                        $rows= $lecsubject->findAll();

                    }

                    else{
                        $rows= $lecsubject->findAll();

                    }

                }

           


           

        }
       
        }
    
    else{

        if($type==" " || $type=="Degree"){
            $lectype = new StudentDegree();   
            $rows= $lectype->findAll();
        }

        else if($type=="Batch"){
            $lectype = new StudentBatch();
            $rows= $lectype->findAll();

        }

       
      

        
    }
       
    if (get_JobType("UserID", Auth::profileID()) == 'Librarian') {
            
        $this->view('librarian/studentattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);


    } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
        $this->view('admin/studentattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);


    } else {
        // $this->view('librarian/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

    }


}

//



public function studentedit($type=" ", $id="null")
{

    if (!Auth::logged_in()) {
        $this->redirect('Login');
    }


    $errors = array();
    $flag = array(0);

    if(  $type=="Degree"){
        $ltype = new StudentDegree();
        $rows= $ltype->findAll();


        $row = $ltype->where('ID', $id);

        if (count($_POST) > 0) {

       
        
            if ($ltype->validateEdit($_POST,$id)) {

               

                $studenttypeData['Name'] = $_POST['Name'];

                
                //get staffid from userid
               

 

                
                    
                //Insert data to user table
                $ltype->update('ID',$id, $studenttypeData);

            


                
               $this->redirect('attributes/studentadd/Degree');
              





            } else {
                $errors = $ltype->errors;
                //print_r($errors);

            }
        }

    }

   

    else if(  $type=="Batch"){
        $ltype = new StudentBatch();
        $rows= $ltype->findAll();

     
        $row = $ltype->where('ID', $id);

        if (count($_POST) > 0) {

       
        
            if ($ltype->validateEdit($_POST,$id)) {

               

                $studenttypeData['Name'] = $_POST['Name'];

                
                //get staffid from userid
               

 

                
                    
                //Insert data to user table
                $ltype->update('ID',$id, $studenttypeData);

            


                
               $this->redirect('attributes/studentadd/Batch');
              





            } else {
                $errors = $ltype->errors;
                //print_r($errors);

            }
        }

    }


    

    if (get_JobType("UserID", Auth::profileID()) == 'Librarian') { 
            
        $this->view('librarian/studentattributes.edit',['rows' => $rows,'row' => $row,'errors'=>$errors,'flag'=>$flag]);


    } elseif (get_JobType("UserID", Auth::profileID()) == 'Administrator') {
        $this->view('admin/studentattribute.edit',['rows' => $rows,'row' => $row,'errors'=>$errors,'flag'=>$flag]);


    } else {
        // $this->view('librarian/lecturerattribute.add',['rows' => $rows,'errors'=>$errors,'flag'=>$flag]);

    }


    }



    
    public function studentdelete($type= "null",$id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

      
        if(  $type=="Degree"){
            $ltype = new StudentDegree();

            $row = $ltype->where('ID', $id);
      
             
            //Delete data from user table
            $ltype->delete('ID',$id);
            $this->redirect('attributes/studentadd/Degree');

    } 
    
    else if(  $type=="Batch"){
        $ltype = new StudentBatch();

        $row = $ltype->where('ID', $id);
  
         
        //Delete data from user table
        $ltype->delete('ID',$id);
        $this->redirect('attributes/studentadd/Batch');

     } 

   


    

}









}
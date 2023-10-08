<?php 
class Notifications extends Controller
{
    
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }
        
        // Load the notification view
        $this->view('librarian/includes/notification.support');
    }

    public function removeNumber(){
        $notification= new Notification();

        $userID = Auth::profileID();
        $query = "UPDATE `notification` SET `Seen`='Seen' WHERE userID=$userID"; 
        try {
            $notification->query($query);
            echo json_encode(['success' => $userID]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
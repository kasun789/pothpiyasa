<?php

require("config.php");
require("helpers.php");
require("database.php");
require("controller.php");
require("model.php");
require("app.php");


//Every time a class is not found this function invoke
spl_autoload_register(function($class_name){

	require "../private/models/". ucfirst($class_name) . ".php";
});

// <!-- calculate fine -->

      date_default_timezone_set('Asia/Colombo');//time zone

	  $fineset=new IssueBook;
	  $rows= $fineset->findAll();
    
	  $currentDate = date('Y-m-d H:i:s'); // current date
	 $hours=date('H'); //get hours within the day
	 //print($hours);

	
	 
	  $currentDateTime = new DateTime($currentDate);
      
	  //get fine details
	  $fineamounts=new FineCalculation();
	  $amount = $fineamounts->where("ID", 1);
	  //print_r($amount);
	  $holiday=new Holiday();
	  $holidays= $holiday->findAll();
	  //print_r($holidays);
	 
	  foreach ($rows as $row):
		  $duedate = $row->DueDate; // date from the database
		  $duedateDateTime = new DateTime($duedate);
    
		  $holidaysCount=0;
		  $Specialholi=0;


		  


        if($currentDateTime>$duedateDateTime){

            //day difference
			$dayDifference = ($currentDateTime->diff($duedateDateTime))->days;
			     

		
			if( $dayDifference>0 && $row->ReturnStatus==0){

			

				//get saturdays and sundays

					// Create DateTime objects for the start and end dates
					$start_datetime = $duedateDateTime;
					$end_datetime = $currentDateTime;

					foreach ($holidays as $hday): 
						$startholi=new DateTime($hday->Holiday_start);
						$endholi=new DateTime($hday->Holiday_end);

				         if($endholi=='0000-00-00'){
							if($start_datetime<=$startholi && $end_datetime>=$startholi){
								$Specialholi=$Specialholi+1;
							}
						 }
						 else{
							if($start_datetime<=$startholi && $end_datetime>=$startholi && $endholi<=$end_datetime){
								$Specialholi=$Specialholi+$endholi->diff($startholi)->days+1;
							}
							else if($start_datetime<=$startholi && $end_datetime>=$startholi && $endholi>$end_datetime){
								$Specialholi=$Specialholi+($endholi->diff($startholi))->diff($end_datetime)->days+1;
							}

						 }
		
				


					  endforeach;


					// Create a DateInterval object representing a one day interval
					$interval = new DateInterval('P1D');

					// Create a DatePeriod object to iterate over the days between the start and end dates
					$date_range = new DatePeriod($start_datetime, $interval, $end_datetime);

					// Loop through the dates and do something with each one
					foreach ($date_range as $date) {
						

						$dateformat=$date->format('N');


						if ($dateformat == 6 || $dateformat == 7) {
						{
							$holidaysCount=$holidaysCount+1;
						}
					}



				}

              
			 if($hours>9 && $hours<17){

				$finedata['FineAmount']=$amount[0]->FineForFirstDay + ($dayDifference-($holidaysCount+$Specialholi+1))*$amount[0]->FinePerDay+($hours-9)*$amount[0]->FinePerHour;

	         }
			 else if($hours>17){
				$finedata['FineAmount']=$amount[0]->FineForFirstDay + ($dayDifference-($holidaysCount+$Specialholi))*$amount[0]->FinePerDay;
		
	         }
			 else{
				$finedata['FineAmount']=$amount[0]->FineForFirstDay + ($dayDifference-($holidaysCount+$Specialholi+1))*$amount[0]->FinePerDay;

			 }
  
				  
			    $finedata['FineStatus']=1;

				
          
				$fineset->update('IssueKey',$row->IssueKey, $finedata);
				
			}
		 }
		
		 
  
		

  
	  endforeach;

////delete receivedBookList

	  $receivedBookList = new ReceivedBookList();
	  $rows = $receivedBookList->findAll();
	  $current_date = date('Y-m-d');

	  $date = new DateTime($current_date);
	  $day = "-7 days";
      $day = $date->modify($day);
      $day = $day->format('Y-m-d');
	 // print_r($day );
	 if($rows){
		foreach($rows as $row){
			if($row->AddDate<$day){
				$query = "DELETE FROM `receivedbooklist` WHERE ID = $row->ID";
				$receivedBookList->query($query);
			}
		  }
		 

	 }



	 ///delete reservations


	 $reservation = new ReserveBook();
	 $rows = $reservation->findAll();
	 $current_date = date('Y-m-d');

	 $date = new DateTime($current_date);
	 $day = "-7 days";
	 $day = $date->modify($day);
	 $day = $day->format('Y-m-d');
	// print_r($day );
	if($rows){
	   foreach($rows as $row){
		   if($row->ReservedDate<$day){
			   $query = "DELETE FROM `reservebook` WHERE UserID = $row->UserID";
			   $reservation->query($query);

			   $book=new Book();
			   $book1=$book->where('BookID',$row->BookID);
			   $dataArray['AvailableCopies']=$book1[0]->AvailableCopies+1;
	           $fineset->update('BookID',$row->BookID, $dataArray);
		   }
		 }
		

	}

	  
	

	 




?>
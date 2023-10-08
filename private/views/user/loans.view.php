<?php include('../private/views/user/includes/header.view.php'); ?>

<body>
<div class="header">
        <p class="operation">My Loans</p>
        <?php include('../private/views/librarian/includes/header.view.php'); ?>
    </div>
    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>
        


<!-- navigation bar -->

<?php 
   include('../private/views/user/includes/nav.view.php');
 ?>

<!-- body -->



<div class="container_view_loans">

<h1>Returning Dates of the Books</h1>
        <h2>Please consider the following instructions</h2>

        <div class="loans_instruction_container">

            <ol>
                <li>The following information provides details regarding the return details for books that you have previously borrowed.</li>
                <li>Kindly be informed that there is a fine applicable for each book in the event of late return.</li>

            </ol>

        </div>


                <?php if ($rows):
                $countRows=0;
                foreach ($rows as $row): 
                        if($row->ReturnStatus==0):
                                $countRows=$countRows+1;
                        endif;
                endforeach;
               
                 if($countRows>0):
                 ?>
                     
                                <table class="loans_table" id="loans_table">

                                        <tr>
                                                <th width="100">No</th>
                                                <th width="300">Book Name</th>
                                                <th width="100">Borrowed Date</th>
                                                <th width="100">Due Date</th>
                                                <th width="100">Fine (Rs.)</th>

                                        </tr>
                                        <?php 
                                        $i=0;
                                        foreach ($rows as $row): 
                                                if($row->ReturnStatus==0):
                                                        ?>
                                                        <tr>
                                                                <td><?= ++$i; ?></td>
                                                                <td><?= get_bookname('BookID', $row->BookID, $row->Code) ?></td>
                                                                <td><?= date("Y-m-d", strtotime($row->IssuedDate)) ?></td>
                                                                <td><?= $row->DueDate ?></td>
                                                                <td id="fineshow"><?= get_fine('UserID',$row->UserID , $row->BookID, $row->Code )  ?></td>


                                                        </tr>
                
                                                <?php endif;?>

                                        <?php endforeach; ?>
                               </table>
                <?php else:?>
                       <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="loans_notfound_png">
                        <br>
                        <h4 class="loans_No_result">No Loans</h4>
                       
                </div>
                <?php endif;?> 

         <?php else: ?>

               <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="loans_notfound_png">
                        <br>
                        <h4 class="loans_No_result">No Loans</h4>
                       
                </div>


                
                <?php endif; ?>
        </div>
        <button class="backbtnloans"><a href="<?= ROOT ?>/userdashboard">Back</a></button>


 <script>
         x = document.getElementById("loans_table").rows.length;

       for(i=1;i<x;i++){
        var tr = document.getElementsByTagName("tr")[i];
        var td = tr.getElementsByTagName("td")[4];
        console.log(td.textContent.trim());
        if(td.textContent.trim()=="No Fine"){
               tr.style.background="";
        }
        else{
            
          tr.style.background="#F46155";
              
        }
}

</script>

<?php include('../private/views/user/includes/footer.view.php'); ?>

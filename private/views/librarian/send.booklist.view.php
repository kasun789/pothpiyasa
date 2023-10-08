<?php include('../private/views/librarian/includes/header.main.view.php'); ?>

<body>
  <div class="header">
    <p class="operation">Send Book List</p>
    <?php 
    include('../private/views/librarian/includes/header.view.php'); ?>
  </div>

  <!-- navigation bar -->

  <?php 
  include('../private/views/librarian/includes/nav.view.php'); ?>

  <!-- notification view -->
  <?php 
  include('../private/views/librarian/includes/notification.view.php'); ?>
  
  <!-- body -->
  <div class="sendMailContainer1" id="sendMailContainer1">

    <!-- todays book list that need to send -->
    <form action="" method="post">
      <div class="sendBookList">
        <h3 class="listOfBooksSendingEmail">List of Books</h3>
        <?php if ($rows) : ?>
          <table class="tableOfBooksSendingEmail">
            <?php foreach ($rows as $row) : ?>

              <tr>
                <td><i class="fa-solid fa-circle-check" id="tickSendingMail"></i></td>
                <td><?= get_user_name('UserID', $row->UserID) ?></td>
                <td><?= $row->BookTitle ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        <?php endif; ?>


      </div>
      <button class="sendBtn" name="sendBtn" type="submit" value="1">Send</button>
    </form>


    <!-- send book list table -->
    <div class="sendBookListTable">
      <?php if ($req) : ?>
        <table class="sendingBookListTableMain">
          <tr>
            <th>User Name</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Published Year</th>
            <th>Edition</th>
            <th>Request Status</th>
            <th>Mail Status</th>
            <th>Request Status</th>

          </tr>
          <?php foreach ($req as $reqitem) : ?>

            <tr>
              <td><?= get_user_name('UserID', $reqitem->UserID) ?></td>
              <td><?= $reqitem->BookTitle ?></td>
              <td><?= $reqitem->Author ?></td>
              <td><?= $reqitem->PublishedYear ?></td>
              <td><?= $reqitem->Edition ?></td>
              <td><?php if ($reqitem->requestStatus == 0) {
                    echo 'Conformed';
                  } else {
                    echo 'Failed';
                  }
                  ?></td>
              <td><?php if ($reqitem->mailStatus == 0) {
                    echo 'Pendding';
                  } else {
                    echo 'Mailed';
                  }
                  ?></td>
              <td><?= $reqitem->requestDate ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php endif; ?>


    </div>

    <?php if($errors):?>
  <div class="containerWarningEmail" id="containerWarning">
        <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
        <p class="warnningMsg"><?=$errors['email']?></p>
    </div>
    <?php endif?>





    <button class="sendMailCancel" name="sendMailCancel" id="sendMailCancel"><a href="<?= ROOT ?>/librariandashboard">Cancel</a></button>
  </div>

  <?php include('../private/views/includes/popup.sendMail.successfull.view.php'); ?>

  <?php include('../private/views/librarian/includes/footer.view.php'); ?>



  <?php if ($flag[0] == 1) {
    echo '<script type="text/javascript">openSendMail();</script>';
  }
    

  
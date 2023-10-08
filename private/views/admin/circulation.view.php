<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pothpiyasa</title>
  <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/viewBookCategory.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/circulation.css">
  <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>

<body>
  <div class="header">
    <p class="operation">Book Circulation</p>

    <div class="notificationIconBack"></div>
    <i class="fa-solid fa-bell" id="notificationIcon"></i>

    <div class="profile" id="profile">
      <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" class="profileImg" id="profileImg">
    </div>

    <div class="container_patron" id="container_patron">

      <div class="container_patron_details">
        <img src="<?= ROOT ?>/uploads/<?= Auth::profile() ?>" alt="" srcset="" id="profileImg">
        <p class="profileName" id="profileName">
          <?= Auth::profileName() ?>
        </p>
        <p class="profileEmail" id="profileEmail">
          @<?= Auth::profileEmail() ?>
        </p>
      </div>

      <ul>
        <li><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">Profile</a></li>
        <!-- <li><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li> -->
        <li><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My
            Reservation</a></li>
        <li><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a>
        </li>
        <li><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>

        <li><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>


      </ul>
    </div>
  </div>

  <!-- navigation bar -->

  <?php include('../private/views/includes/nav.view.php'); ?>

  <!-- notification view -->
  <?php include('../private/views/includes/notification.view.php'); ?>


  <!<!-- body -->

    <div class="container_book_search">
      <h1>View Borrowed Details and Returned Details</h1>
      <h2>Please follow the below instruction for book circulation</h2>

      <div class="circulation_instruction_container">

        <ol>
          <li>Type your search criteria in the search box (Detail) for particular book attribute.</li>
          <li>Press the Search button.</li>

        </ol>

      </div>

      <div class="con2">
        <form method="post" class="con2_form">
          
          <label for="searchValue" class="details">Detail</label>
          <input type="text" class="searchValue" name="searchValue" value="<?= get_var('searchValue') ?>">
          <div class="errorMesgSearchBook">
            <?php if (isset($errors['searchValue'])): ?>
              <p>
                <?= "*" . $errors['searchValue'] ?>
              </p>
            <?php endif; ?>
          </div>

          <button class="searchBookbtn" name="submit" type="submit">Search</button>
          <button class="circulation_backbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>
        </form>

      </div>




    </div>



    <?php include('../private/views/includes/footer.view.php'); ?>
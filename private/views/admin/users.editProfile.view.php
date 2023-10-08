<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PothPiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/addUser.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/calendar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/onlineUsers.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/editProfile.css">



</head>

<body>
    <div class="header">

        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon" onclick="showNotification()"></i>
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
                    @
                    <?= Auth::profileEmail() ?>
                </p>
            </div>

            <ul>
                <li><a href="<?= ROOT ?>/users/editProfile/<?= Auth::profileID() ?>" id="editprofile">My Profile</a>
                </li>
                <!-- <li><a href="<?= ROOT ?>/books/searchbookUsers">Search Book</a></li> -->
                <li><a href="<?= ROOT ?>/users/myreservations/<?= Auth::profileID() ?>">My
                        Reservation</a></li>
                <li><a href="<?= ROOT ?>/users/myhistory/<?= Auth::profileID() ?>">My History</a>
                </li>
                <li><a href="<?= ROOT ?>/users/myloans/<?= Auth::profileID() ?>">My Loans</a></li>

                <li><a href="<?= ROOT ?>/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>


            </ul>
        </div>

        <p class="operation">Profile</p>

    </div>

    <!-- navigation bar -->
    <?php include('../private/views/includes/nav.view.php'); ?>

    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>

    <!-- body -->

    <div class="bodyContainer01">

        <!-- form -->

        <div class="bodyContainer02" id="bodyContainer02">

            <?php if ($row): ?>
                <form method="POST" enctype="multipart/form-data">

                    <div class="edit_labels">

                        <label for="title" class="titleLabel">Title</label>
                        <select id="title" class="title" name="Title" id="title" required>
                            <option <?= get_select('Title', '', $row[0]->Title) ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('Title', 'Mr', $row[0]->Title) ?> value="Mr">Mr</option>
                            <option <?= get_select('Title', 'Mrs', $row[0]->Title) ?> value="Mrs">Mrs</option>
                            <option <?= get_select('Title', 'Ms', $row[0]->Title) ?> value="Ms">Ms</option>
                            <option <?= get_select('Title', 'Miss', $row[0]->Title) ?> value="Miss">Miss</option>
                            <option <?= get_select('Title', 'Dr', $row[0]->Title) ?> value="Dr">Dr</option>
                            <option <?= get_select('Title', 'Professor', $row[0]->Title) ?> value="Professor">Professor
                            </option>
                        </select>

                        <label for="reg" class="regLabel">Reg#</label>
                        <label name="RegistrationNo" class="reg_profile" id="reg">
                            <?= get_var('RegistrationNo', $row[0]->RegistrationNo) ?>
                        </label>

                        <label for="firstName" class="firstNameLabel">First Name</label>
                        <input type="text" name="FirstName" class="firstName" id="firstName"
                            value="<?= get_var('FirstName', $row[0]->FirstName) ?>" required>

                        <div class="errorFirstName">
                            <?php if (isset($errors['FirstName'])): ?>
                                <p>
                                    <?= "*" . $errors['FirstName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <label for="lastName" class="lastNameLabel">Last Name</label>
                        <input type="text" name="LastName" class="lastName" id="lastName"
                            value="<?= get_var('LastName', $row[0]->LastName) ?>" required>

                        <div class="errorLastName">
                            <?php if (isset($errors['LastName'])): ?>
                                <p>
                                    <?= "*" . $errors['LastName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <label for="phoneNo" class="phoneNoLabel">Phone No</label>
                        <input type="text" name="PhoneNo" class="phoneNo" id="phoneNo"
                            value="<?= get_var('PhoneNo', $row[0]->PhoneNo) ?>" required>

                        <div class="errorPhoneNo">
                            <?php if (isset($errors['PhoneNo'])): ?>
                                <p>
                                    <?= "*" . $errors['PhoneNo'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <label for="sex" class="sexLabel">Sex</label>
                        <select id="sex" class="sex" name="Sex" id="sex" required>
                            <option <?= get_select('Sex', '', $row[0]->Sex) ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('Sex', 'Male', $row[0]->Sex) ?> value="Male">Male</option>
                            <option <?= get_select('Sex', 'Female', $row[0]->Sex) ?> value="Female">Female</option>
                        </select>

                        <label for="birthday" class="birthdayLabel">Birthday</label>
                        <input type="date" name="Birthday" class="birthday" id="Birthday"
                            value="<?= get_var('Birthday', $row[0]->Birthday) ?>" required min="<?= min_year() ?>" required
                            max="<?= max_year() ?>" required>


                        <label for="address" class="addressLable">Address</label>
                        <input type="text" name="Address" class="address" id="address"
                            value="<?= get_var('Address', $row[0]->Address) ?>" required>


                        <label for="email" class="emailLable">Email</label>
                        <input type="email" name="Email" class="email" id="email"
                            value="<?= get_var('Email', $row[0]->Email) ?>" required>

                        <div class="errorEmail">
                            <?php if (isset($errors['Email'])): ?>
                                <p>
                                    <?= "*" . $errors['Email'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <label for="NIC" class="NICLable">NIC</label>
                        <input type="NIC" name="NIC" class="NIC" id="NIC" value="<?= get_var('NIC', $row[0]->NIC) ?>"
                            required>

                        <div class="errorNIC">
                            <?php if (isset($errors['NIC'])): ?>
                                <p>
                                    <?= "*" . $errors['NIC'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                    </div>

                    <button class="editAddmemberbtn" name="editAddmemberbtn">Save</button>


                    <div class="profilePic_set" id="profilePic_set">
                        <img src="<?= ROOT ?>/uploads/<?= get_var('Image', $row[0]->Image) ?>" id="imagepreview">


                        <!-- <input type="submit" value="Upload Image" name="submit"> -->
                        <button type="button" class="changePicturebtn" id="changePicturebtn"><i
                                class="fa-solid fa-camera-retro"></i>&nbsp;&nbsp;Change Profile
                            Picture</button>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="fileToUpload">

                    </div>

                </form>




                <button type="button" onclick="changePassword()" class="changePasswordbtn" id="changePasswordbtn"><i
                        class="fa-solid fa-key"></i>&nbsp;&nbsp;Change Password</button>

                <!-- Change Password -->
                <div class="changePasswordForm" id="changePasswordForm">

                    <form action="<?= ROOT ?>/users/changePassword/<?= Auth::profileID() ?>" method="POST" class="change_password_form">

                        <label for="currentPassword">Current Password</label>
                        <input type="text" name="currentPassword" required>

                        <div class="errorCurrentPass">
                            <?php if (isset($errors['currentPassword'])): ?>
                                <p>
                                    <?= "*" . $errors['currentPassword'] ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <br><br>
                        <label for="newPassword">New Password</label>
                        <input type="text" name="newPassword" required>
                        <br><br>
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="text" name="confirmPassword" required>

                        <div class="errorConfirmPass">
                            <?php if (isset($errors['confirmPassword'])): ?>
                                <p>
                                    <?= "*" . $errors['confirmPassword'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <br>

                        <button class="passwordsave" name="passwordSave">Save Password</button>
                        <button class="passwordcancel" onclick="changePassword_cancel()">Cancel</button>

                    </form>

                </div>

            <?php else: ?>
                <div class="result_notfound_container">
                    <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                    <br>
                    <h4 class="No_result">No results found</h4>
                    <br>
                    <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching again!</h5>
                </div>

            <?php endif; ?>

        </div>

        <button class="editBackbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>

        <?php include('../private/views/includes/popup.edit.user.profile.php'); ?>


    </div>

    <!-- Footer -->

</body>
<script src="<?=ROOT?>/js/admin/includes/nav.js"></script>
<script src="<?=ROOT?>/js/includes/notification.js"></script>
<script src="<?=ROOT?>/js/admin/addUser.js"></script>
<script src="<?=ROOT?>/js/includes/popup.js"></script>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/includes/editProfile.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>



</html>
 

    <!-- This function exist in popup.js -->
    <?php if ($flag[0] == 1) {
        echo '<script type="text/javascript">openEditUserProfilePopup()</script>';
    }

    
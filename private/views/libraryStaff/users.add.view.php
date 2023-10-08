<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PothPiyasa</title>
    <link rel="stylesheet" href="<?=ROOT?>/css/libraryStaff/includes/header.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/libraryStaff/includes/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/addUser.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/admin/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">



</head>


<body>
    <div class="header">
        <p class="operation">Add Member</p>
        <?php include('../private/views/libraryStaff/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/libraryStaff/includes/nav.view.php'); ?>

    <!-- notification view -->
    <?php include('../private/views/libraryStaff/includes/notification.view.php'); ?>
    
    <!-- body -->

    <div class="bodyContainer01">

    <!-- form -->

    <div class="bodyContainer02">


        <form method="POST">

            <div class="edit_labels">

                <label for="title" class="titleLabel">Title</label>
                <select id="title" class="title" name="Title" id="title" required>
                    <option <?= get_select('Title', '') ?> value="">--- Choose Type ---</option>
                    <option <?= get_select('Title', 'Mr') ?> value="Mr">Mr</option>
                    <option <?= get_select('Title', 'Mrs') ?> value="Mrs">Mrs</option>
                    <option <?= get_select('Title', 'Ms') ?> value="Ms">Ms</option>
                    <option <?= get_select('Title', 'Miss') ?> value="Miss">Miss</option>
                    <option <?= get_select('Title', 'Dr') ?> value="Dr">Dr</option>
                    <option <?= get_select('Title', 'Professor') ?> value="Professor">Professor</option>
                </select>

                <label for="reg" class="regLabel">Reg#</label>
                <input type="text" name="RegistrationNo" class="reg" id="reg" value="<?= get_var('RegistrationNo') ?>"
                    required>

                <div class="errorRegistrationNo">
                    <?php if (isset($errors['RegistrationNo'])): ?>
                        <p>
                            <?= "*" . $errors['RegistrationNo'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="firstName" class="firstNameLabel">First Name</label>
                <input type="text" name="FirstName" class="firstName" id="firstName" value="<?= get_var('FirstName') ?>"
                    required>

                <div class="errorFirstName">
                    <?php if (isset($errors['FirstName'])): ?>
                        <p>
                            <?= "*" . $errors['FirstName'] ?>
                        </p>
                    <?php endif; ?>
                </div>



                <label for="lastName" class="lastNameLabel">Last Name</label>
                <input type="text" name="LastName" class="lastName" id="lastName" value="<?= get_var('LastName') ?>"
                    required>

                <div class="errorLastName">
                    <?php if (isset($errors['LastName'])): ?>
                        <p>
                            <?= "*" . $errors['LastName'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="phoneNo" class="phoneNoLabel">Phone No</label>
                <input type="text" name="PhoneNo" class="phoneNo" id="phoneNo" value="<?= get_var('PhoneNo') ?>"
                    required>

                <div class="errorPhoneNo">
                    <?php if (isset($errors['PhoneNo'])): ?>
                        <p>
                            <?= "*" . $errors['PhoneNo'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="sex" class="sexLabel">Sex</label>
                <select id="sex" class="sex" name="Sex" id="sex" required>
                    <option <?= get_select('Sex', '') ?> value="">--- Choose Type ---</option>
                    <option <?= get_select('Sex', 'Male') ?> value="Male">Male</option>
                    <option <?= get_select('Sex', 'Female') ?> value="Female">Female</option>
                </select>

                <label for="birthday" class="birthdayLabel">Birthday</label>
                <input type="date" name="Birthday" class="birthday" id="Birthday" value="<?= get_var('Birthday') ?>"
                    required min="<?= min_year() ?>" required max="<?= max_year() ?>" required>


                <label for="address" class="addressLable">Address</label>
                <input type="text" name="Address" class="address" id="address" value="<?= get_var('Address') ?>"
                    required>

                <div class="errorAddress">
                    <?php if (isset($errors['Address'])): ?>
                        <p>
                            <?= "*" . $errors['Address'] ?>
                        </p>
                    <?php endif; ?>
                </div>


                <label for="email" class="emailLable">Email</label>
                <input type="email" name="Email" class="email" id="email" value="<?= get_var('Email') ?>" required>

                <div class="errorEmail">
                    <?php if (isset($errors['Email'])): ?>
                        <p>
                            <?= "*" . $errors['Email'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="NIC" class="NICLable">NIC</label>
                <input type="NIC" name="NIC" class="NIC" id="NIC" value="<?= get_var('NIC') ?>" required>

                <div class="errorNIC">
                    <?php if (isset($errors['NIC'])): ?>
                        <p>
                            <?= "*" . $errors['NIC'] ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <label for="memberType" class="memberTypeLabel">Patron Type</label>
            <select id="memberType" class="memberType" name="MemberType" onchange="enableButton()" required>
                <option <?= get_select('MemberType', '') ?> value="">--- Choose Type ---</option>
                <option <?= get_select('MemberType', 'Administrator') ?> value="Administrator">Administrator
                </option>
                <option <?= get_select('MemberType', 'Librarian') ?> value="Librarian">Librarian</option>
                <option <?= get_select('MemberType', 'Library-Staff') ?> value="Library-Staff">Library-Staff
                </option>
                <option <?= get_select('MemberType', 'Lecturer') ?> value="Lecturer">Lecturer</option>
                <option <?= get_select('MemberType', 'Student') ?> value="Student">Student</option>
                <option <?= get_select('MemberType', 'Non-Academic') ?> value="Non-Academic">Non-Academic</option>
            </select>

            <!-- Lecture/Student -->
            <div class="form-box" id="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button class="toggle-btn" id="lecturebtn" type="button" value="Lecture" onclick="getLecture()"
                        disabled>Lecturer</button>
                    <button class="toggle-btn" id="studentbtn" type="button" value="Student" onclick="getStudent()"
                        disabled>Student</button>
                </div>

                <div id="lectureForm" class="toggleForm">
                    <label for="type" class="lecTypeLabel">Type</label>
                    <select id="lecType" class="lecType" name="LecType" disabled>
                        <option <?= get_select('LecType', '') ?> value="">--- Choose Type ---</option>
                        <option <?= get_select('LecType', 'Permanent Lecturer') ?> value="Permanent
                                Lecturer">Permanent
                            Lecturer</option>
                        <option <?= get_select('LecType', 'Assistance Lecturer') ?> value="Assistance
                                Lecturer">Assistance Lecturer</option>
                        <option <?= get_select('LecType', 'Instructor') ?> value="Instructor">Instructor</option>
                    </select>

                    <label for="subject" class="subjectLabel">Subject</label>
                    <select id="subject" class="subject" name="Subject" disabled>
                        <option <?= get_select('Subject', '') ?> value="">--- Choose Type ---</option>
                        <option <?= get_select('Subject', 'Operating System') ?> value="Operating System">Operating
                            System</option>
                        <option <?= get_select('Subject', 'Computer System') ?> value="Computer System">Computer
                            System
                        </option>
                        <option <?= get_select('Subject', 'Computer Network') ?> value="Computer Network">Computer
                            Network</option>
                        <option <?= get_select('Subject', 'Artificial Intelligence') ?> value="Artificial
                                Intelligence">Artificial Intelligence</option>
                        <option <?= get_select('Subject', 'Programming Language C') ?> value="Programming Language
                                C">Programming Language C</option>
                    </select>

                    <label for="department" class="departmentLabel">Department</label>
                    <input type="text" name="Department" class="department" id="Department" disabled>

                    <div class="errorDepartment">
                        <?php if (isset($errors['Department'])): ?>
                            <p>
                                <?= "*" . $errors['Department'] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="studentForm" class="toggleForm">
                    <label for="type" class="stuTypeLabel">Type</label>
                    <select id="stuType" class="stuType" name="StudentType" disabled>
                        <option <?= get_select('StudentType', '') ?> value="">--- Choose Type ---</option>
                        <option <?= get_select('StudentType', '1-3 Year Student') ?> value="1-3 Year Student">1-3
                            Year
                            Student</option>
                        <option <?= get_select('StudentType', '4th Year Student') ?> value="4th Year Student">4th
                            Year
                            Student</option>
                        <option <?= get_select('StudentType', 'Research Student') ?> value="Research
                                Student">Research
                            Student</option>
                    </select>

                    <label for="degree" class="degreeLabel">Degree</label>
                    <!-- <input type="text" name="degree" class="degree" id="degree" disabled> -->
                    <select id="degree" class="degree" name="Degree" disabled>
                        <option <?= get_select('Degree', '') ?> value="">--- Choose Type ---</option>
                        <option <?= get_select('Degree', 'Computer Science (CS)') ?> value="Computer Science
                                (CS)">Computer Science (CS)</option>
                        <option <?= get_select('Degree', 'Information System (IS)') ?> value="Information System
                                (IS)">Information System (IS)</option>
                        <option <?= get_select('Degree', 'BIT') ?> value="BIT">BIT</option>
                        <option <?= get_select('Degree', 'MCS') ?> value="MCS">MCS</option>
                        <option <?= get_select('Degree', 'MIT') ?> value="MIT">MIT</option>
                        <option <?= get_select('Degree', 'MSIS') ?> value="MSIS">MSIS</option>
                    </select>

                    <label for="batch" class="batchLabel">Batch</label>
                    <!-- <input type="text" name="batch" class="batch" id="batch" disabled> -->
                    <select id="batch" class="batch" name="Batch" disabled>
                        <option <?= get_select('Batch', '') ?> value="">--- Choose Type ---</option>
                        <option <?= get_select('Batch', '13th Batch') ?> value="13th Batch">13th Batch(CS)</option>
                        <option <?= get_select('Batch', '14th Batch') ?> value="14th Batch">14th Batch(CS)</option>
                        <option <?= get_select('Batch', '15th Batch') ?> value="15th Batch">15th Batch(CS)</option>
                        <option <?= get_select('Batch', '16th Batch') ?> value="16th Batch">16th Batch(CS)</option>
                        <option <?= get_select('Batch', '17th Batch') ?> value="17th Batch">17th Batch(CS)</option>
                        <option <?= get_select('Batch', '18th Batch') ?> value="18th Batch">18th Batch(CS)</option>
                        <option <?= get_select('Batch', '19th Batch') ?> value="19th Batch">19th Batch(CS)</option>
                        <option <?= get_select('Batch', '20th Batch') ?> value="20th Batch">20th Batch(CS)</option>

                    </select>
                </div>
            </div>
            <button class="addmemberbtn" name="addMember">Add Member</button>

        </form>
    </div>
    <button class="backbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>

</div>


    <?php include('../private/views/includes/popup.add.view.php'); ?>


    <?php include('../private/views/libraryStaff/includes/footer.view.php'); ?>

    <!-- set the popup msg -->
    <?php if ($flag[0] == 1) {
    echo '<script type="text/javascript">openPopup("http://localhost/pothpiyasa/public/users");</script>';
    } ?>
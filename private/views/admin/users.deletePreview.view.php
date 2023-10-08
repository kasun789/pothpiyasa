<?php include('../private/views/includes/header.view.php'); ?>


        <p class="operation">Delete Patron</p>
        
    </div>

    <!-- navigation bar -->

    <?php include('../private/views/includes/nav.view.php'); ?>

    <!-- body -->

    <div class="bodyContainer01">

        <!-- form -->

        <div class="bodyContainer02">

            <?php if($rowUser):?>
            <form method="POST">
                <label for="title" class="titleLabel">Title</label>
                <select id="title" class="title" name="Title" id="title" required disabled>
                    <option <?= get_select('Title', '',$rowUser[0]->Title) ?> value="">--- Choose Type ---</option>
                    <option <?= get_select('Title', 'Mr',$rowUser[0]->Title) ?> value="Mr">Mr</option>
                    <option <?= get_select('Title', 'Mrs',$rowUser[0]->Title) ?> value="Mrs">Mrs</option>
                    <option <?= get_select('Title', 'Ms',$rowUser[0]->Title) ?> value="Ms">Ms</option>
                    <option <?= get_select('Title', 'Miss',$rowUser[0]->Title) ?> value="Miss">Miss</option>
                    <option <?= get_select('Title', 'Dr',$rowUser[0]->Title) ?> value="Dr">Dr</option>
                    <option <?= get_select('Title', 'Professor',$rowUser[0]->Title) ?> value="Professor">Professor</option>
                </select>

                <label for="reg" class="regLabel">Reg#</label>
                <input type="text" name="RegistrationNo" class="reg" id="reg" value="<?=get_var('RegistrationNo',$rowUser[0]->RegistrationNo) ?>"
                    required disabled>

                <label for="firstName" class="firstNameLabel">First Name</label>
                <input type="text" name="FirstName" class="firstName" id="firstName" value="<?= get_var('FirstName',$rowUser[0]->FirstName) ?>"
                    required disabled>

            
                <label for="lastName" class="lastNameLabel">Last Name</label>
                <input type="text" name="LastName" class="lastName" id="lastName" value="<?= get_var('LastName',$rowUser[0]->LastName) ?>"
                    required disabled>

                <label for="phoneNo" class="phoneNoLabel">Phone No</label>
                <input type="text" name="PhoneNo" class="phoneNo" id="phoneNo" value="<?= get_var('PhoneNo',$rowUser[0]->PhoneNo) ?>"
                    required disabled>


                <label for="sex" class="sexLabel">Sex</label>
                <select id="sex" class="sex" name="Sex" id="sex" required disabled>
                    <option <?= get_select('Sex', '', $rowUser[0]->Sex) ?> value="">--- Choose Type ---</option>
                    <option <?= get_select('Sex', 'Male', $rowUser[0]->Sex) ?> value="Male">Male</option>
                    <option <?= get_select('Sex', 'Female', $rowUser[0]->Sex) ?> value="Female">Female</option>
                </select>

                <label for="birthday" class="birthdayLabel">Birthday</label>
                <input type="date" name="Birthday" class="birthday" id="Birthday" value="<?= get_var('Birthday', $rowUser[0]->Birthday) ?>"
                    required disabled>


                <label for="address" class="addressLable">Address</label>
                <input type="text" name="Address" class="address" id="address" value="<?= get_var('Address', $rowUser[0]->Address) ?>" 
                    required disabled>


                <label for="email" class="emailLable">Email</label>
                <input type="email" name="Email" class="email" id="email" value="<?= get_var('Email', $rowUser[0]->Email) ?>" required disabled>


                <label for="memberType" class="memberTypeLabel">Patron Type</label>
                <select id="memberType" class="memberType" name="MemberType" required disabled>
                    <option <?= get_select('MemberType', '', $rowUser[0]->MemberType) ?> value="">--- Choose Type ---</option>
                    <option <?= get_select('MemberType', 'Administrator', $rowUser[0]->JobType) ?> value="Administrator">Administrator
                    </option>
                    <option <?= get_select('MemberType', 'Librarian', $rowUser[0]->JobType) ?> value="Librarian">Librarian</option>
                    <option <?= get_select('MemberType', 'Library-Staff', $rowUser[0]->JobType) ?> value="Library-Staff">Library-Staff
                    </option>
                    <option <?= get_select('MemberType', 'Lecturer', $rowUser[0]->Type) ?> value="Lecturer">Lecturer</option>
                    <option <?= get_select('MemberType', 'Student', $rowUser[0]->Type) ?> value="Student">Student</option>
                    <option <?= get_select('MemberType', 'Non-Academic', $rowUser[0]->AcademicType) ?> value="Non-Academic">Non-Academic</option>
                </select>

                <!-- Lecture/Student -->
                <div class="form-box">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button class="toggle-btn" id="lecturebtn" type="button" value="Lecture"
                            onclick="getLecture()" disabled>Lecturer</button>
                        <button class="toggle-btn" id="studentbtn" type="button" value="Student"
                            onclick="getStudent()" disabled>Student</button>
                    </div>

                    <div id="lectureForm" class="toggleForm">
                        <label for="type" class="lecTypeLabel">Type</label>
                        <select id="lecType" class="lecType" name="LecType" disabled>
                            <option <?= get_select('LecType', '', $rowLecturer[0]->LecType ?? "") ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('LecType', 'Permanent Lecturer', $rowLecturer[0]->LecType ?? "") ?> value="Permanent Lecturer">Permanent Lecturer</option>
                            <option <?= get_select('LecType', 'Assistance Lecturer',$rowLecturer[0]->LecType ?? "") ?> value="Assistance Lecturer">Assistance Lecturer</option>
                            <option <?= get_select('LecType', 'Instructor',$rowLecturer[0]->LecType ?? "") ?> value="Instructor">Instructor</option>
                        </select>

                        <label for="subject" class="subjectLabel">Subject</label>
                        <select id="subject" class="subject" name="Subject" disabled>
                            <option <?= get_select('Subject', '', $rowLecturer[0]->Subject ?? "") ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('Subject', 'Operating System', $rowLecturer[0]->Subject ?? "") ?> value="Operating System">Operating
                                System</option>
                            <option <?= get_select('Subject', 'Computer System', $rowLecturer[0]->Subject ?? "") ?> value="Computer System">Computer
                                System
                            </option>
                            <option <?= get_select('Subject', 'Computer Network', $rowLecturer[0]->Subject ?? "") ?> value="Computer Network">Computer
                                Network</option>
                            <option <?= get_select('Subject', 'Artificial Intelligence', $rowLecturer[0]->Subject ?? "") ?> value="Artificial Intelligence">Artificial Intelligence</option>
                            <option <?= get_select('Subject', 'Programming Language C', $rowLecturer[0]->Subject ?? "") ?> value="Programming Language C">Programming Language C</option>
                        </select>

                        <label for="department" class="departmentLabel">Department</label>
                        <input type="text" name="Department" class="department" id="Department" value="<?= get_var('Department', $rowLecturer[0]->Department ?? "")?>" disabled>

                    </div>

                    <div id="studentForm" class="toggleForm">
                        <label for="type" class="stuTypeLabel">Type</label>
                        <select id="stuType" class="stuType" name="StudentType" disabled>
                            <option <?= get_select('StudentType', '', $rowStudent[0]->StudentType ?? "") ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('StudentType', '1-3 Year Student', $rowStudent[0]->StudentType ?? "") ?> value="1-3 Year Student">1-3
                                Year
                                Student</option>
                            <option <?= get_select('StudentType', '4th Year Student', $rowStudent[0]->StudentType ?? "") ?> value="4th Year Student">4th
                                Year
                                Student</option>
                            <option <?= get_select('StudentType', 'Research Student', $rowStudent[0]->StudentType ?? "") ?> value="Research
                                Student">Research
                                Student</option>
                        </select>

                        <label for="degree" class="degreeLabel">Degree</label>
                        <input type="text" name="degree" class="degree" id="degree" disabled>
                        <select id="degree" class="degree" name="Degree">
                            <option <?= get_select('Degree', '' ,$rowStudent[0]->Degree ?? "") ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('Degree', 'Computer Science (CS)' ,$rowStudent[0]->Degree ?? "") ?> value="Computer Science (CS)">Computer Science (CS)</option>
                            <option <?= get_select('Degree', 'Information System (IS)' ,$rowStudent[0]->Degree ?? "") ?> value="Information System (IS)">Information System (IS)</option>
                            <option <?= get_select('Degree', 'BIT', $rowStudent[0]->Degree ?? "") ?> value="BIT">BIT</option>
                            <option <?= get_select('Degree', 'MCS', $rowStudent[0]->Degree ?? "") ?> value="MCS">MCS</option>
                            <option <?= get_select('Degree', 'MIT', $rowStudent[0]->Degree ?? "") ?> value="MIT">MIT</option>
                            <option <?= get_select('Degree', 'MSIS', $rowStudent[0]->Degree ?? "") ?> value="MSIS">MSIS</option>
                        </select>

                        <label for="batch" class="batchLabel">Batch</label>
                        <input type="text" name="batch" class="batch" id="batch" disabled>
                        <select id="batch" class="batch" name="Batch">
                            <option <?= get_select('Batch', '') ?> value="">--- Choose Type ---</option>
                            <option <?= get_select('Batch', '13th Batch', $rowStudent[0]->Batch ?? "") ?> value="13th Batch">13th Batch(CS)</option>
                            <option <?= get_select('Batch', '14th Batch', $rowStudent[0]->Batch ?? "") ?> value="14th Batch">14th Batch(CS)</option>
                            <option <?= get_select('Batch', '15th Batch', $rowStudent[0]->Batch ?? "") ?> value="15th Batch">15th Batch(CS)</option>
                            <option <?= get_select('Batch', '16th Batch', $rowStudent[0]->Batch ?? "") ?> value="16th Batch">16th Batch(CS)</option>
                            <option <?= get_select('Batch', '17th Batch', $rowStudent[0]->Batch ?? "") ?> value="17th Batch">17th Batch(CS)</option>
                            <option <?= get_select('Batch', '18th Batch', $rowStudent[0]->Batch ?? "") ?> value="18th Batch">18th Batch(CS)</option>
                            <option <?= get_select('Batch', '19th Batch', $rowStudent[0]->Batch ?? "") ?> value="19th Batch">19th Batch(CS)</option>
                            <option <?= get_select('Batch', '20th Batch', $rowStudent[0]->Batch ?? "") ?> value="20th Batch">20th Batch(CS)</option>

                        </select>
                    </div>
                </div>
                <button class="deletememberbtn" name="deleteMember" type="submit" style="text-decoration: none; color: white;"><a href="<?=ROOT?>/users/delete/<?= $rowUser[0]->UserID?>">Delete</a></button>
                

            </form>
            <?php else:?>
                <div class="result_notfound_container">
                        <img src="<?= ROOT ?>/img/notfound.png" class="notfound_png">
                        <br>
                        <h4 class="No_result">No results found</h4>
                        <br>
                        <h5 class="No_result_para">We couldn't find what you search for. <br>Try searching again!</h5>
                </div>
            <?php endif;?>

        </div>
        <button class="backbtn"><a href="<?= ROOT?>/users">Back</a></button>

    </div>

    <?php include('../private/views/includes/popup.delete2.view.php'); ?>
    
    <!-- Footer -->

</body>
<script src="<?=ROOT?>/js/admin/includes/nav.js"></script>
<script src="<?=ROOT?>/js/includes/notification.js"></script>
<script src="<?=ROOT?>/js/admin/addUser.js"></script>
<script src="<?=ROOT?>/js/includes/popup.js"></script>
<script src="<?=ROOT?>/js/includes/popupLocate.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>



</html>

<?php include('../private/views/includes/header.view.php'); ?>

<p class="operation">Config Settings</p>

</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- body -->


<div class="config_container_view" id="config_container_view">
        <div class="fine_container_privilege" id="config_container_view">
                <h2>User Privilege Settings</h2>
                <div class="fine_in_container_privilege">

                        <?php if ($rows): ?>
                                <form method="POST">
                                        <label class="lending_col">Lending Category</label>
                                        <label class="books_col">No.of Books Allowed</label>
                                        <label class="days_col">No.of Days Allowed</label>

                                        <label for="BooksForLecturers" class="PrivilegeForLecturersLabel">Permanent
                                                Lecturer</label>

                                        <input type="text" name="BooksForLecturers" class="BooksForLecturers"
                                                id="FineForFirstDay"
                                                value="<?= get_var('BooksForLecturers', $rows[0]->NoOfBooksPL) ?>" required>

                                        <input type="text" name="DaysForLecturers" class="DaysForLecturers" id="FineForFirstDay"
                                                value="<?= get_var('DaysForLecturers', $rows[0]->NoOfDaysPL) ?>" required>


                                        <label for="BooksForAcademic" class="PrivilegeForAcademicLabel">Academic</label>

                                        <input type="text" name="BooksForAcademic" class="BooksForAcademic"
                                                id="FineForFirstDay"
                                                value="<?= get_var('BooksForAcademic', $rows[0]->NoOfBooksAC) ?>" required>

                                        <input type="text" name="DaysForAcademic" class="DaysForAcademic" id="FineForFirstDay"
                                                value="<?= get_var('DaysForAcademic', $rows[0]->NoOfDaysAC) ?>" required>


                                        <label for="BooksForNonacademic" class="PrivilegeForNonacademicLabel">Non-Academic</label>

                                        <input type="text" name="BooksForNonacademic" class="BooksForNonacademic"
                                                id="FineForFirstDay"
                                                value="<?= get_var('BooksForNonacademic', $rows[0]->NoOfBooksNONAC) ?>" required>

                                        <input type="text" name="DaysForNonacademic" class="DaysForNonacademic" id="FineForFirstDay"
                                                value="<?= get_var('DaysForNonacademic', $rows[0]->NoOfDaysNONAC) ?>" required>



                                        <input type="submit" class="saveChangesbtnprivilege" name="saveChanges" value="Save Changes">

                                        <input type="submit" class="resetbtnprivilege" name="resetFine" value="Reset">


                                </form>
                        <?php else: ?>

                                <label class="lending_col">Lending Category</label>
                                <label class="books_col">No.of Books Allowed</label>
                                <label class="days_col">No.of Days Allowed</label>

                                <label for="BooksForLecturers" class="PrivilegeForLecturersLabel">Permanent
                                                Lecturer</label>

                                        <input type="text" name="BooksForLecturers" class="BooksForLecturers"
                                                id="FineForFirstDay"
                                                value="Not Defined" required>

                                        <input type="text" name="DaysForLecturers" class="DaysForLecturers" id="FineForFirstDay"
                                                value="Not Defined" required>


                                        <label for="BooksForAcademic" class="PrivilegeForAcademicLabel">Academic</label>

                                        <input type="text" name="BooksForAcademic" class="BooksForAcademic"
                                                id="FineForFirstDay"
                                                value="Not Defined" required>

                                        <input type="text" name="DaysForAcademic" class="DaysForAcademic" id="FineForFirstDay"
                                                value="Not Defined" required>


                                        <label for="BooksForNonacademic" class="PrivilegeForNonacademicLabel">Non-Academic</label>

                                        <input type="text" name="BooksForNonacademic" class="BooksForNonacademic"
                                                id="FineForFirstDay"
                                                value="Not Defined" required>

                                        <input type="text" name="DaysForNonacademic" class="DaysForNonacademic" id="FineForFirstDay"
                                                value="Not Defined" required>

                              
                                <!-- <button class="saveChangesbtnprivilege" name="saveChanges">Save Changes</button> -->
                                <input type="submit" class="saveChangesbtnprivilege" name="saveChanges" value="Save Changes">

                                <input type="submit" class="resetbtnprivilege" name="resetFine" value="Reset">

                        <?php endif; ?>

                </div>
        </div>

        <!-- <button class="fine_backbtn"><a href="<?= ROOT ?>/adminDashboard">Back</a></button> -->
        <button class="privilege_backbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>


        <!-- <button class="fine_nextbtn"><a href="<?= ROOT ?>/ConfigSettings/configSettingsNext">Next</a></button> -->

</div>

<!-- Popup -->
<div class="container_popup">
        <div class="fine_container_popup" id="popup">
                <img src="<?= ROOT ?>/img/check.png">
                <h2>Changed!</h2>
                <p>Your details has been successfully changed.</p>
                <button type="button" onclick="closePopup()">OK</button>
        </div>
</div>


<!-- Footer -->

</body>
<script src="<?= ROOT ?>/js/admin/includes/nav.js"></script>
<script src="<?= ROOT ?>/js/admin/configSettings.js"></script>
<script src="<?= ROOT ?>/js/includes/header.js"></script>
<script src="<?= ROOT ?>/js/includes/pagination.js"></script>

</html>

<?php if ($flag[0] == 1) {
        echo '<script type="text/javascript">openPopup("http://localhost/Pothpiyasa/public/configsettings/privilegeSettings")</script>';
}
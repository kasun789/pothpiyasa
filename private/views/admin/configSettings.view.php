<?php include('../private/views/includes/header.view.php'); ?>

<p class="operation">Config Settings</p>

</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- body -->


<div class="config_container_view" id="config_container_view">
        <div class="fine_container" id="config_container_view">
                <h2>Fine Payment Settings</h2>
                <div class="fine_in_container">

                        <?php if ($rows): ?>
                                <form method="POST">

                                        <label for="FineForFirstDay" class="fine_for_first_dayLabel">Fine For First
                                                Day(Rs)</label>
                                        <input type="text" name="FineForFirstDay" class="fine_for_first_day"
                                                id="FineForFirstDay"
                                                value="<?= get_var('FineForFirstDay', $rows[0]->FineForFirstDay) ?>" required>

                                        <label for="FinePerDay" class="fine_per_dayLabel">Fine Per
                                                Day(Rs)</label>
                                        <input type="text" name="FinePerDay" class="fine_per_day" id="FinePerDay"
                                                value="<?= get_var('FinePerDay', $rows[0]->FinePerDay) ?>" required>

                                        <label for="FinePerHour" class="fine_per_hourLabel">Fine Per
                                                Hour(Rs)</label>
                                        <input type="text" name="FinePerHour" class="fine_per_hour" id="FinePerHour"
                                                value="<?= get_var('FinePerHour', $rows[0]->FinePerHour) ?>" required>

                                        <label for="WorkableHoursPerDay" class="workable_hours_per_dayLabel">Workable
                                                Hours Per Day</label>
                                        <input type="text" name="WorkableHoursPerDay" class="workable_hours_per_day"
                                                id="WorkableHoursPerDay"
                                                value="<?= get_var('WorkableHoursPerDay', $rows[0]->WorkableHoursPerDay) ?>"
                                                required>

                                        <!-- <button class="saveChangesbtn" name="saveChanges">Save Changes</button> -->

                                        <input type="submit" class="saveChangesbtn" name="saveChanges" value="Save Changes">

                                        <input type="submit" class="resetbtn" name="resetFine" value="Reset">


                                </form>
                        <?php else: ?>
                                <label for="FineForFirstDay" class="fine_for_first_dayLabel">Fine For First
                                        Day(Rs)</label>
                                <input type="text" name="FineForFirstDay" class="fine_for_first_day" id="FineForFirstDay"
                                        value="Not Defined" required>

                                <label for="FinePerDay" class="fine_per_dayLabel">Fine Per
                                        Day(Rs)</label>
                                <input type="text" name="FinePerDay" class="fine_per_day" id="FinePerDay" value="Not Defined"
                                        required>

                                <label for="FinePerHour" class="fine_per_hourLabel">Fine Per
                                        Hour(Rs)</label>
                                <input type="text" name="FinePerHour" class="fine_per_hour" id="FinePerHour" value="Not Defined"
                                        required>

                                <label for="WorkableHoursPerDay" class="workable_hours_per_dayLabel">Workable
                                        Hours Per Day</label>
                                <input type="text" name="WorkableHoursPerDay" class="workable_hours_per_day"
                                        id="WorkableHoursPerDay" value="Not Defined" required>

                                <!-- <button class="saveChangesbtn" name="saveChanges">Save Changes</button> -->
                                <input type="submit" class="saveChangesbtn" name="saveChanges" value="Save Changes">

                                <input type="submit" class="resetbtn" name="resetFine" value="Reset">

                        <?php endif; ?>

                </div>
        </div>

        <!-- <button class="fine_backbtn"><a href="<?= ROOT ?>/adminDashboard">Back</a></button> -->
        <button class="fine_backbtn"><a href="<?= ROOT ?>/AdminDashboard">Back</a></button>


        <!-- <button class="fine_nextbtn"><a href="<?= ROOT ?>/ConfigSettings/privilegeSettings">Next</a></button> -->

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
<script src="<?=ROOT?>/js/admin/includes/nav.js"></script>
<script src="<?=ROOT?>/js/admin/configSettings.js"></script>
<script src="<?=ROOT?>/js/includes/header.js"></script>
<script src="<?=ROOT?>/js/includes/pagination.js"></script>

</html>

<?php if ($flag[0] == 1) {
        echo '<script type="text/javascript">openPopup("http://localhost/Pothpiyasa/public/configsettings/fineSettings")</script>';
}
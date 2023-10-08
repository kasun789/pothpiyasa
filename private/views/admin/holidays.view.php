<?php include('../private/views/includes/header.view.php'); ?>

<p class="operation">Holidays</p>

</div>

<!-- navigation bar -->

<?php include('../private/views/includes/nav.view.php'); ?>

<!-- body -->

<button class='bulkaddholidaybtn'><i class="fa-solid fa-plus"></i>&nbsp;<a
        href='<?= ROOT ?>/BulkAdd/holiday_add'>
        Bulk Holiday Add</a></button>
<div class="container_calendar_holidays" id="container_calendar_holidays">
    <div class="calendar_holidays">
        <div class="month_holidays">
            <i class="fas fa-angle-left prev"></i>
            <div class="date_holidays">
                <h1></h1>
                <p></p>
            </div>
            <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays_holidays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days_holidays"></div>
    </div>
</div>
<div id="holidays_form1" class="holidays_form1">
    <div class="FormHeader">
        <i onclick="closeForm1()" class="fas fa-window-close"></i>
        <h3>Schedule Form</h3>
    </div>
    <form action="<?= ROOT ?>/holidays/add" method="POST">
        <label class="holiday_Label" for="holiday_title">Title</label>
        <input class="holiday_input" type="text" id="Holiday_title1" name="Holiday_title" required>
        <br><br>

        <label class="holiday_Label" for="holiday_description">Description</label>
        <input class="holiday_input" type="text" id="Holiday_description1" name="Holiday_description">
        <br><br>

        <label class="holiday_Label" for="holiday_start">Start</label>
        <input class="holiday_input" type="date" id="Holiday_start1" name="Holiday_start" required>
        <br><br>

        <label class="holiday_Label" for="holiday_end">End</label>
        <input class="holiday_input" type="date" id="Holiday_end1" name="Holiday_end">

        <button class="addholidaybtn" name="addHoliday">Save</button>
        <button onclick="closeForm1()" class="cancelholidaybtn" name="cancelHoliday">Cancel</button>

    </form>
</div>

<div id="holidays_form2" class="holidays_form2">
    <div class="FormHeader">
        <i onclick="closeForm2()" class="fas fa-window-close"></i>
        <h3>Schedule Form</h3>
    </div>
    <form method="POST" id="editHolidayForm" action="<?= ROOT ?>/holidays/">

        <input name="holidayID" hidden id="Holiday_id2">

        <label class="holiday_Label" for="Holiday_title">Title</label>
        <input class="holiday_input" type="text" id="Holiday_title2" name="Holiday_title" required>
        <br><br>

        <label class="holiday_Label" for="Holiday_description">Description</label>
        <input class="holiday_input" type="text" id="Holiday_description2" name="Holiday_description" >
        <br><br>

        <label class="holiday_Label" for="Holiday_start">Start</label>
        <input class="holiday_input" type="date" id="Holiday_start2" name="Holiday_start">
        <br><br>

        <label class="holiday_Label" for="Holiday_end">End</label>
        <input class="holiday_input" type="date" id="Holiday_end2" name="Holiday_end">

        <button onclick="saveForm2()" class='editholidaybtn' id='editholidaybtn' name="editHoliday">Save</button>
        <button onclick="deleteForm2()" class="deleteholidaybtn" name="deleteHoliday">Delete</button>

    </form>
</div>

<div class="holiday_details">
    <div class="today_holiday">
        <i class="fas fa-square"></i>
        <p>Today</p>
    </div>
    <div class="poya_holiday">
        <i class="fas fa-square"></i>
        <p>Poya Holiday</p>
    </div>
    <div class="academic_holiday">
        <i class="fas fa-square"></i>
        <p>Academic Holiday</p>
    </div>
    <div class="other_holiday">
        <i class="fas fa-square"></i>
        <p>Other Holiday</p>
    </div>
</div>

</body>
<script src="<?= ROOT ?>/js/admin/includes/nav.js"></script>
<script src="<?= ROOT ?>/js/includes/header.js"></script>
<script src="<?= ROOT ?>/js/admin/holidays.js"></script>

</html>
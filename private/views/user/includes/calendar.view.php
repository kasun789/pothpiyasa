<div class="container_calendar">
    <div class="calendar" id="calendar">
        <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">
                <h1></h1>
                <p></p>
            </div>
            <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days"></div>

    </div>

    <div id="calendar_popup" class="calendar_popup">
        <div class="FormHeader_calendar">
            <i onclick="closeForm2()" class="fas fa-window-close"></i>
            <h3>Holiday Details</h3>

        </div>
        <form method="POST" id="editHolidayForm">

            <input name="holidayID" hidden id="Holiday_id2">

            <label class="calendar_Label" for="Holiday_title">Title</label>
            <input class="calendar_input" type="text" id="Holiday_title2" name="Holiday_title" disabled>
            <br><br>

            <label class="calendar_Label" for="Holiday_description">Description</label>
            <input class="calendar_input" type="text" id="Holiday_description2" name="Holiday_description" disabled>
            <br><br>

        </form>
    </div>

    <div class="calendar_details">
        <div class="calendar_today_holiday">
            <i class="fas fa-square"></i>
            <p>Today</p>
        </div>
        <div class="calendar_poya_holiday">
            <i class="fas fa-square"></i>
            <p>Poya Holiday</p>
        </div>
        <div class="calendar_academic_holiday">
            <i class="fas fa-square"></i>
            <p>Academic Holiday</p>
        </div>
        <div class="calendar_other_holiday">
            <i class="fas fa-square"></i>
            <p>Other Holiday</p>
        </div>
    </div>

</div>
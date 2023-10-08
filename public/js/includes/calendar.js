let date = new Date();
let calendar_popup = document.getElementById("calendar_popup");
let calendar = document.getElementById("calendar");

const ROOT_URL = "http://localhost/pothpiyasa/public";

let holidaysArr = [];

// function checkURL() {
//   if (!document.URL.includes("pothpiyasa/public/holidays")) {
//     return false;
//   } else {
//     return true;
//   }
// }

const renderCalendar = (renderingMonth) => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  //Last day of current month
  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();
  //Last day of previous month
  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  const dateHeader = document.querySelector(".date h1");
  dateHeader.innerHTML = months[date.getMonth()];

  const dateParagraph = document.querySelector(".date p");
  dateParagraph.innerHTML = new Date().toDateString();

  fetch("http://localhost/pothpiyasa/public/holidays/getCalendarDetails")
    .then((res) => res.json())
    .then((data) => {
      let days = "";

      //days = previous month's days
      for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date" id="${new Date(
          date.getFullYear(),
          date.getMonth() - 1,
          prevLastDay - x + 1
        ).toDateString()}">${prevLastDay - x + 1}</div>`;
      }

      //days = current month's days
      for (let i = 1; i <= lastDay; i++) {
        if (
          i === new Date().getDate() &&
          date.getMonth() === new Date().getMonth() &&
          date.getFullYear() === new Date().getFullYear()
        ) {
          //Here given id to the divs (id = particular date)
          days += `<div class = "today" id="${new Date(
            date.getFullYear(),
            date.getMonth(), i).toDateString()}">${i}</div>`;
        } else {
          days += `<div id="${new Date(
            date.getFullYear(),
            date.getMonth(), i).toDateString()}">${i}</div>`;
        }
      }

      //days = next month's days
      for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date" id="${new Date(
          date.getFullYear(),
          date.getMonth() + 1,j).toDateString()}">${j}</div>`;
      }

      monthDays.innerHTML = days;

      //Getting holidays from database
      for (let i = 0; i < data.length; i++) {

        //Getting the div id of holidays from database (Above we given start date as the div id)
        const holidayDateObj = new Date(data[i].Holiday_start);
        const holidayDateEndObj = new Date(data[i].Holiday_end);
        if(holidayDateEndObj == "Invalid Date"){  //only one day
          if(holidayDateObj.getMonth() !== renderingMonth){
            continue;
          }
        }
        else{ //more than one day
          if(!(holidayDateObj.getMonth() <= renderingMonth && holidayDateEndObj.getMonth() >= renderingMonth)){
            continue;
          }
        }

        const holidayStartDateID = holidayDateObj.toDateString();

        //holidayStartDateID is the id of div element that we create above

        //Getting the particular div using that id
        const holidayStartDateDiv = document.getElementById(holidayStartDateID);

        //This divs create for particular holidays
        const holidayDivRow = document.createElement("div");

        holidayDivRow.id = data[i].HolidayID;
        
        //This is an associative array
        holidaysArr[data[i].HolidayID] = {
          Holiday_title : data[i].Holiday_title,
          Holiday_start : data[i].Holiday_start,
          Holiday_end : data[i].Holiday_end,
          Holiday_description : data[i].Holiday_description
        };

        const holidayEndDate = new Date(data[i].Holiday_end);
        let diff = ((((holidayEndDate - holidayDateObj)/1000)/60)/60)/24;

        console.log(holidayEndDate);
        if(holidayEndDate == "Invalid Date"){
          diff = 0;

        }
        let k = 0;
        while(k <= diff){
          const tempDate = new Date(holidayDateObj.toLocaleDateString());
          tempDate.setDate(holidayDateObj.getDate() + k);
          const appendingDiv = document.getElementById(tempDate.toDateString());
          if(appendingDiv === null){
            //div not found in calendar
            k++;
            continue;
          }
          const holidayDivRow = document.createElement("div");

          holidayDivRow.className = data[i].HolidayID;
  
          if (data[i].Holiday_title == "Poya Holiday" || data[i].Holiday_title == "Poya" || data[i].Holiday_title == "poya holiday" || data[i].Holiday_title == "poya") {
            holidayDivRow.style.backgroundColor = "Yellow";
          } else if (data[i].Holiday_title == "Academic Holiday" || data[i].Holiday_title == "Academic" || data[i].Holiday_title == "academic holiday" || data[i].Holiday_title == "academic") {
            holidayDivRow.style.backgroundColor = "Green";
          } else {
            holidayDivRow.style.backgroundColor = "Orange";
          }
  
          //holidayDivRow is particular div for holiday
  
          holidayDivRow.style.width = "100%";
          holidayDivRow.style.height = "50%";
          holidayDivRow.style.border = "none";

          holidayDivRow.addEventListener("click", (e) => {
            
            e.stopPropagation();
  
  
            calendar_popup.classList.add("calendar_popup_popup");
  
            //Displaying data in the form (Assigning data to the input values )
            const holidayID = document.getElementById("Holiday_id2");
            holidayID.value = data[i].HolidayID;
  
            const Holiday_title = document.getElementById("Holiday_title2");
            Holiday_title.value = holidaysArr[data[i].HolidayID].Holiday_title;
  
            const Holiday_description = document.getElementById("Holiday_description2");
            Holiday_description.setAttribute("value", holidaysArr[data[i].HolidayID].Holiday_description);
  
  
            calendar.classList.add("container_calendar_blur");
  
          });
  
          appendingDiv.appendChild(holidayDivRow);
          //This div is which we create div element for days
          appendingDiv.style.display = "flex";
          appendingDiv.style.textAlign = "center";
          appendingDiv.style.flexDirection = "column";
          k++;
        };

      }
    });

};
document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar(date.getMonth());
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar(date.getMonth());
});

function closeForm2() {
  calendar_popup.classList.remove("calendar_popup_popup");
  calendar.classList.remove("container_calendar_blur");
}

// var currURL = checkURL();
// if (currURL === true) {
//   renderCalendar(date.getMonth());
// }

renderCalendar(date.getMonth());


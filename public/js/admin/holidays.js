let date_holidays = new Date();
const ROOT_URL = "http://localhost/pothpiyasa/public";

let holidays_form1 = document.getElementById("holidays_form1");
let holidays_form2 = document.getElementById("holidays_form2");
let container_calendar_holidays = document.getElementById("container_calendar_holidays");

let holidaysArr = [];

function checkURL() {
  if (!document.URL.includes("pothpiyasa/public/holidays")) {
    return false;
  } else {
    return true;
  }
}

const renderHolidayCalendar = (renderingMonth) => {
  date_holidays.setDate(1);

  const monthDays = document.querySelector(".days_holidays");

  //Last day of current month
  const lastDay = new Date(
    date_holidays.getFullYear(),
    date_holidays.getMonth() + 1,
    0
  ).getDate();
  //Last day of previous month
  const prevLastDay = new Date(
    date_holidays.getFullYear(),
    date_holidays.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date_holidays.getDay();

  const lastDayIndex = new Date(
    date_holidays.getFullYear(),
    date_holidays.getMonth() + 1,
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

  const dateHeader = document.querySelector(".date_holidays h1");
  dateHeader.innerHTML = months[date_holidays.getMonth()];

  const dateParagraph = document.querySelector(".date_holidays p");
  dateParagraph.innerHTML = new Date().toDateString();

  fetch("http://localhost/pothpiyasa/public/holidays/getHolidayDetails")
    .then((res) => res.json())
    .then((data) => {
      let days = "";



      //days = previous month's days + current month's days + next month's days

      //days = previous month's days
      for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date_holidays" id="${new Date(
          date_holidays.getFullYear(),
          date_holidays.getMonth() - 1,
          prevLastDay - x + 1
        ).toDateString()}">${prevLastDay - x + 1}</div>`;
      }

      //days = current month's days
      for (let i = 1; i <= lastDay; i++) {
        if (
          i === new Date().getDate() &&
          date_holidays.getMonth() === new Date().getMonth() &&
          date_holidays.getFullYear() === new Date().getFullYear()
        ) {
          //Here given id to the divs (id = particular date)
          days += `<div onclick="openForm1(event)" class = "today_holidays" id="${new Date(
            date_holidays.getFullYear(),
            date_holidays.getMonth(), i).toDateString()}">${i}</div>`;
        } else {
          days += `<div onclick="openForm1(event)" id="${new Date(
            date_holidays.getFullYear(),
            date_holidays.getMonth(), i).toDateString()}">${i}</div>`;
        }
      }

      //days = next month's days
      for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date_holidays" id="${new Date(
          date_holidays.getFullYear(),
          date_holidays.getMonth() + 1,j).toDateString()}">${j}</div>`;
      }

      //Showing the days
      monthDays.innerHTML = days;

      console.log(data);
      //Getting holidays from database
      for (let i = 0; i < data.length; i++) {
        

        //Getting the div id of holidays from database (Above we given start date as the div id)
        const holidayDateObj = new Date(data[i].Holiday_start);
        const holidayDateEndObj = new Date(data[i].Holiday_end);
        console.log(holidayDateEndObj);

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

      
        //This is an associative array
        holidaysArr[data[i].HolidayID] = {
          Holiday_title : data[i].Holiday_title,
          Holiday_start : data[i].Holiday_start,
          Holiday_end : data[i].Holiday_end,
          Holiday_description : data[i].Holiday_description
        };

        console.log(data[i].HolidayID);

        //This divs create for particular holidays
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
  
          // For delete & edit holidays
          holidayDivRow.addEventListener("click", (e) => {
            
            e.stopPropagation();
            const editBtn = document.getElementById("editholidaybtn");
  
            editBtn.lastChild.href = editBtn.lastChild.href + data[i].HolidayID;
  
            holidays_form2.classList.add("holidays_form2_popup");
  
            //Displaying data in the form (Assigning data to the input values )
            const holidayID = document.getElementById("Holiday_id2");
            holidayID.value = data[i].HolidayID;
  
            const Holiday_title = document.getElementById("Holiday_title2");
            Holiday_title.value = holidaysArr[data[i].HolidayID].Holiday_title;
  
            const Holiday_description = document.getElementById("Holiday_description2");
            Holiday_description.setAttribute("value", holidaysArr[data[i].HolidayID].Holiday_description);
  
            const Holiday_start = document.getElementById("Holiday_start2");
            Holiday_start.setAttribute("value", holidaysArr[data[i].HolidayID].Holiday_start);
  
            const Holiday_end = document.getElementById("Holiday_end2");
            Holiday_end.setAttribute("value", holidaysArr[data[i].HolidayID].Holiday_end);
  
            container_calendar_holidays.classList.add("container_calendar_holidays_blur");
  
          });
          
          appendingDiv.appendChild(holidayDivRow);
          //This div is which we create div element for days
          appendingDiv.style.display = "flex";
          appendingDiv.style.textAlign = "center";
          appendingDiv.style.flexDirection = "column";
          k++;
        }

      }
    });

    
    
};

document.querySelector(".prev").addEventListener("click", () => {
  date_holidays.setMonth(date_holidays.getMonth() - 1);
  renderHolidayCalendar(date_holidays.getMonth());
});

document.querySelector(".next").addEventListener("click", () => {
  date_holidays.setMonth(date_holidays.getMonth() + 1);
  renderHolidayCalendar(date_holidays.getMonth());
});

function addLeadingZeros(x){
  if(x < 10){
    return "0" + x;
  }
  return x;
}


function openForm1(event) {
  const holidayDivID = event.currentTarget.id;

  const holidayStartInput = document.getElementById("Holiday_start1");
  const holidate=  new Date(holidayDivID).toLocaleDateString();
  const dateArr = holidate.split("/");
  console.log(dateArr);


  console.log(holidate);
  holidayStartInput.value = dateArr[2] + "-" + addLeadingZeros(dateArr[0]) + "-" + addLeadingZeros(dateArr[1]);

  holidays_form1.classList.add("holidays_form1_popup");
  container_calendar_holidays.classList.add("container_calendar_holidays_blur");

}

function closeForm1() {
  holidays_form1.classList.remove("holidays_form1_popup");
  container_calendar_holidays.classList.remove("container_calendar_holidays_blur");

}

function closeForm2() {
  holidays_form2.classList.remove("holidays_form2_popup");
  container_calendar_holidays.classList.remove("container_calendar_holidays_blur");
}

var currURL = checkURL();
if (currURL === true) {
  renderHolidayCalendar(date_holidays.getMonth());
}


const editForm = document.querySelector("#editHolidayForm");

function saveForm2() {
  
  const formData = new FormData(editForm); 
  const holidayID = formData.get("holidayID");

  formData.append("editHoliday", "edited");

  editForm.action = editForm.action + "edit/" + holidayID;
}

function deleteForm2() {
  
  const formData = new FormData(editForm); 
  const holidayID = formData.get("holidayID");

  formData.append("editHoliday", "deleted");

  editForm.action = editForm.action + "delete/"  + holidayID;
}


// editForm.addEventListener("submit", ()=>{

//     const formData = new FormData(editForm); 
//     const holidayID = formData.get("holidayID");

//     formData.append("editHoliday", "edited");

//     editForm.action = editForm.action + holidayID;
//     //editForm.submit();
    
// /*     console.log(ROOT_URL + "/holidays/edit/" + holidayID);
//     fetch(ROOT_URL + "/holidays/edit/" + holidayID, {
//       method : 'POST',
//       body : formData
//     }).then(res => res.json())
//     .then(data => {
//       console.log(data);
//     }) */
// });

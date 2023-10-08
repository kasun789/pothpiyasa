
var btn1 = document.getElementById("btn");
var lectureForm = document.getElementById("lectureForm");
var studentForm = document.getElementById("studentForm");
var studentbtn = document.getElementById("studentbtn");
var lecturebtn = document.getElementById("lecturebtn");



function getStudent() {
  studentForm.style.left = "10px";
  lectureForm.style.left = "-400px";
  btn1.style.left = "125px";
  lecturebtn.style.color = "black";
  studentbtn.style.color = "white";
  

}


function getLecture(){
  studentForm.style.left = "400px";
  lectureForm.style.left = "10px";
  btn1.style.left = "0px";
  studentbtn.style.color = "black";
  lecturebtn.style.color = "white";

}



function enableButton() {


  var memberType = document.getElementById("memberType");
  var lecturebtn = document.getElementById("lecturebtn");
  var studentbtn = document.getElementById("studentbtn");

  var lecType = document.getElementById("lecType");
  var subject = document.getElementById("subject");
  var Department = document.getElementById("Department");

  var stuType = document.getElementById("stuType");
  var degree = document.getElementById("degree");
  var batch = document.getElementById("batch");


  var form_box = document.getElementById("form-box");



  if (memberType.value == "Lecturer") {
    lecturebtn.disabled = false;
    studentbtn.disabled = false;

    lecType.disabled = false;
    subject.disabled = false;
    Department.disabled = false;

    stuType.disabled = false;
    degree.disabled = false;
    batch.disabled = false;

    form_box.classList.add("form-box_enabled");
    document.getElementById("lecturebtn").click();


  }else if(memberType.value == "Student"){
    lecturebtn.disabled = false;
    studentbtn.disabled = false;

    stuType.disabled = false;
    degree.disabled = false;
    batch.disabled = false;

    lecType.disabled = false;
    subject.disabled = false;
    Department.disabled = false;

    form_box.classList.add("form-box_enabled");
    document.getElementById("studentbtn").click();
 
  } else if(memberType.value == "Administrator" || memberType.value == "Librarian" || memberType.value == "Library-Staff" || memberType.value == "Non-Academic") {
    lecturebtn.disabled = true;
    studentbtn.disabled = true;

    lecType.disabled = true;
    degree.disabled = true;
    batch.disabled = true;

    stuType.disabled = true;
    subject.disabled = true;
    Department.disabled = true;

    form_box.classList.add("form-box");
    form_box.classList.remove("form-box_enabled");


  }
}




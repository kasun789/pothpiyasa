
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




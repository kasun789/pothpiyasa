let Locatepopup1 = document.getElementById('LocatepopupOPAC');
let containerFine1 = document.getElementById('bodyContainer01');
let containerFine2 = document.getElementById('header_bar_login');
let button = document.getElementById('backbtnBookInfo');
let options = document.getElementById('options');
let Rbutton = document.getElementById('reserve');




//let containerAnimation = document.getElementById('containerAnimation');
// let payfine = document.getElementById('payFine');
// let okbtn1 = document.getElementById('okbtn');
// let fineID;

function openLocatePopup(){
    Locatepopup1.classList.remove('locatePopupOPAC');
    Locatepopup1.classList.add('locatePopupDisplay');
    containerFine1.classList.add('blur');
    containerFine2.classList.add('blur');
    options.classList.add('blur');
    Rbutton.classList.add('blur');
    button.classList.add('blur');

 }
 function directBookLocatePage(){
    Locatepopup1.classList.remove('locatePopupDisplay');
    Locatepopup1.classList.add('locatePopupOPAC');
    window.location.href = "http://localhost/Pothpiyasa/public/login";




 }
 function closeLocatePopup(){
   Locatepopup1.classList.remove('locatePopupDisplay');
   Locatepopup1.classList.add('locatePopupOPAC');
   containerFine1.classList.remove('blur');
   containerFine2.classList.remove('blur');
   button.classList.remove('blur');
   options.classList.remove('blur');
   Rbutton.classList.remove('blur');



 }

























 
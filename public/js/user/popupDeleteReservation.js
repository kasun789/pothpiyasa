
let locatepopupReserve=document.getElementById('Locatepopup');
let containerFine = document.getElementById('container_view_reservations');
let Locatepopupmsg2 = document.getElementById('Locatepopup1');

function openReserveLocatePopup(){
 
     locatepopupReserve.classList.remove('locatePopup');
     locatepopupReserve.classList.add('locatePopupDisplay');
    containerFine.classList.add('blur');
    // containerFine.style.webkitFilter= "blur(5px)";
    // containerFine3.classList.add('blur');
   //  button.classList.add('blur');
  

 }

 function openReserveLocatePopup1(){
   Locatepopupmsg2.classList.remove('locatePopup1');
   Locatepopupmsg2.classList.add('locatePopupDisplay');
    containerFine.classList.add('blur');
    // containerFine3.classList.add('blur');

   //  button.classList.add('blur');

 }
 function directReserveLocatePage(){
    locatepopupReserve.classList.remove('locatePopupDisplay');
  locatepopupReserve.classList.add('locatePopup');
    openReserveLocatePopup1();
    //window.location.href = "http://localhost/Pothpiyasa/public/users/addreservation/"+reservebookid+"/"+userid;




 }
 function directReserveLocatePage1(){
   locatepopupReserve.classList.remove('locatePopupDisplay');
    locatepopupReserve.classList.add('locatePopup1');
   window.location.href = "http://localhost/Pothpiyasa/public/users/removeReservations/"+userid+"/"+reservebookid;




}


 function closeReserveLocatePopup(){
    locatepopupReserve.classList.remove('locatePopup');
    locatepopupReserve.classList.add('locatePopupRemove');
    locatepopupReserve.classList.remove('locatePopupDisplay');
    locatepopupReserve.classList.add('locatePopup');
   // containerFine1.classList.remove('blur');
   // containerFine2.classList.remove('blur');
   // button.classList.remove('blur');
   window.location.href = "http://localhost/Pothpiyasa/public/users/myreservations/"+userid;


 }

























 

window.onload = openReserveLocatePopup;
let Locatepopupmsg1 = document.getElementById('Locatepopup');//bookInfo imageProfile
let containerFineReserve = document.getElementById('bodyContainer01');
// let containerFine3 = document.getElementById('imageProfile');
let Locatepopupmsg2 = document.getElementById('Locatepopup1');//bookInfo imageProfile



function openReserveLocatePopup(){
   if(Locatepopupmsg1!=null){
      Locatepopupmsg1.classList.remove('locatePopup');
    Locatepopupmsg1.classList.add('locatePopupDisplay');
      // containerFine.classList.add('blur');
      // containerFine.style.webkitFilter= "blur(5px)";
      // containerFine3.classList.add('blur');
    //  button.classList.add('blur');

   }
   

 }

 function openReserveLocatePopup1(){
   Locatepopupmsg2.classList.remove('locatePopup1');
   Locatepopupmsg2.classList.add('locatePopupDisplay');
   containerFineReserve.classList.add('blur');
    // containerFine3.classList.add('blur');

   //  button.classList.add('blur');

 }
 function directReserveLocatePage(){
  Locatepopupmsg1.classList.remove('locatePopupDisplay');
  Locatepopupmsg1.classList.add('locatePopup');
    openReserveLocatePopup1();
    //window.location.href = "http://localhost/Pothpiyasa/public/users/addreservation/"+reservebookid+"/"+userid;




 }
 function directReserveLocatePage1(){
   Locatepopup1.classList.remove('locatePopupDisplay');
    Locatepopup1.classList.add('locatePopup1');
   window.location.href = "http://localhost/Pothpiyasa/public/users/addreservation/"+reservebookid+"/"+userid;




}


 function closeReserveLocatePopup(){
   Locatepopup1.classList.remove('locatePopup');
   Locatepopup1.classList.add('locatePopupRemove');
   Locatepopup1.classList.remove('locatePopupDisplay');
   Locatepopup1.classList.add('locatePopup');
   // containerFine1.classList.remove('blur');
   // containerFine2.classList.remove('blur');
   // button.classList.remove('blur');
   window.location.href = "http://localhost/Pothpiyasa/public/books/viewSpecific/"+reservebookid;


 }

























 
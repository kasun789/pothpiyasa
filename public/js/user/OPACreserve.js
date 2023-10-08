

let Locatepopupmsg1 = document.getElementById('LocatepopupOPAC');//bookInfo imageProfile
let containerFine = document.getElementById('bodyContainer01');
 let reservebtn = document.getElementById('reserve');
 let backinfobtn =document.getElementById('backbtnBookInfo');





function openReserveLocatePopup(){
   console.log("hri");
   Locatepopupmsg1.classList.remove('locatePopup');
   Locatepopupmsg1.classList.add('locatePopupDisplay');
    containerFine.classList.add('blur');
    reservebtn.classList.add('blur');
    backinfobtn.classList.add('blur');

    // containerFine.style.webkitFilter= "blur(5px)";
    // containerFine3.classList.add('blur');
   //  button.classList.add('blur');

 }

 
 function directReserveLocatePage(){
  Locatepopupmsg1.classList.remove('locatePopupDisplay');
  Locatepopupmsg1.classList.add('locatePopup');
  window.location.href = "http://localhost/Pothpiyasa/public/login";




 }
 


 function closeReserveLocatePopup(){
    Locatepopupmsg1.classList.remove('locatePopup');
    Locatepopupmsg1.classList.add('locatePopupRemove');
    Locatepopupmsg1.classList.remove('locatePopupDisplay');
    Locatepopupmsg1.classList.add('locatePopup');
    containerFine.classList.remove('blur');
    reservebtn.classList.remove('blur');
    backinfobtn.classList.remove('blur');
//containerFine2.classList.remove('blur');
   // button.classList.remove('blur');
   window.location.href = "http://localhost/Pothpiyasa/public/books/viewSpecificnewarrival/"+reservebookid;


 }

























 
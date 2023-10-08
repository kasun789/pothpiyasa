
window.onload = openReserveLocatePopup2;
let Locatepopupmsg3 = document.getElementById('Locatepopup');//bookInfo imageProfile
let containerFine1 = document.getElementById('bookInfo');
let containerFine4 = document.getElementById('imageProfile');
let Locatepopupmsg4 = document.getElementById('Locatepopup1');//bookInfo imageProfile







 
function openReserveLocatePopup2(){
    console.log("came");
    Locatepopupmsg4.classList.remove('locatePopup1');
    Locatepopupmsg4.classList.add('locatePopupDisplay');
     containerFine1.classList.add('blur');
     containerFine4.classList.add('blur');
 

 }

 
 

function directReserveLocatePage2(){
    Locatepopupmsg4.classList.remove('locatePopupDisplay');
    Locatepopupmsg4.classList.add('locatePopup1');
   window.location.href = "http://localhost/Pothpiyasa/public/books/viewSpecific/"+reservebookid;




}

 

























 
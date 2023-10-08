
let Invetorypopupmsg = document.getElementById('Locatepopup');//bookInfo imageProfile
let containerinventory = document.getElementById('bodyContainer2');
let containerinventory1 = document.getElementById('container_book_search');
let resetbtn = document.getElementById('reset');
let image = document.getElementById('imageinventory');

// let Locatepopupmsg2 = document.getElementById('Locatepopup1');//bookInfo imageProfile
// reset
// bodyContainer2


function openInventoryPopup(){
    console.log("here");
     Invetorypopupmsg.classList.remove('locatePopup');
     Invetorypopupmsg.classList.add('locatePopupDisplay');
     containerinventory.classList.add('blur');
     containerinventory1.classList.add('blur');
     resetbtn.classList.add('blur');
    

 }

 
 function directInventoryPage(){
     Invetorypopupmsg.classList.remove('locatePopupDisplay');
     Invetorypopupmsg.classList.add('locatePopup');
     window.location.href = "http://localhost/Pothpiyasa/public/books/reset";
     window.location.href = "http://localhost/Pothpiyasa/public/books/checkBook";



    

 

}
 function closeInventoryPopup(){
  Invetorypopupmsg.classList.remove('locatePopupDisplay');
     Invetorypopupmsg.classList.add('locatePopup');
   containerinventory.classList.remove('blur');
     containerinventory1.classList.remove('blur');
     resetbtn.classList.remove('blur');
  //  window.location.href = "http://localhost/Pothpiyasa/public/books/checkBook";


 }

























 
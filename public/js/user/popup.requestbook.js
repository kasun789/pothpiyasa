let Locatepopupmsg4 = document.getElementById('Locatepopup1');//bookInfo imageProfile
let abb=document.getElementById('requestBodyContainer01');

function openReserveLocatePopup2(){
    Locatepopupmsg4.classList.remove('locatePopup1');
    Locatepopupmsg4.classList.add('locatePopupDisplay');
    abb.classList.add('baground_filter');
 }

 function directReserveLocatePage2(){
    Locatepopupmsg4.classList.remove('locatePopupDisplay');
    Locatepopupmsg4.classList.add('locatePopup1');
    window.location.href = "http://localhost/Pothpiyasa/public/users/requestbooks";
  }























 
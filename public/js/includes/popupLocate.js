let Locatepopup01 = document.getElementById('Locatepopup');
let popupbookCopy = document.getElementById('popup');
let containerFine1 = document.getElementById('containerFine');
let issueBookContainer01 = document.getElementById('issueBookContainer1');
let containerAnimation = document.getElementById('containerAnimation');
let renew_sucess_Locatepopup = document.getElementById('renew_sucess_Locatepopup');
let payfine = document.getElementById('payFine');
let okbtn1 = document.getElementById('okbtn');
let next2 = document.getElementById('Next');
let renewbtn = document.getElementById('renewbtn');
let bodyContainer2 = document.getElementById('renew_book_container');
let sendMail_sucess_Locatepopup = document.getElementById('sendMail_sucess_Locatepopup');
let sendMailContainer1 = document.getElementById('sendMailContainer1');
let bookCopypopup = document.getElementById('bookCopypopup');
let bookCopyContainer1 = document.getElementById('bookCopyContainer1');
let bookAddContainer1 = document.getElementById('bookAddContainer1');
let popupaddBook = document.getElementById('popup');
let delete2Popup = document.getElementById('delete2Popup');
let bookDeleteContainer = document.getElementById('bookDeleteContainer');
let delete1Popup = document.getElementById('delete1Popup'); 
let bodyContainer01ViewBook = document.getElementById('bodyContainer01ViewBook');
let popupEdit = document.getElementById('popupEdit');
let patron_table_container_view = document.getElementById('patron_table_container_view');
let addpopup = document.getElementById('addpopup');
let editbookContainer = document.getElementById('editbookContainer');
let book_copy_Popup = document.getElementById('book_copy_Popup');
let returnPopup = document.getElementById('returnPopup');
let bodyContainerReturn = document.getElementById('bodyContainer01');
let renew_book_container = document.getElementById('renew_book_container');
let renew_sucess_issue_Popup = document.getElementById('renew_sucess_issue_Popup');
let locateBookContainer1 = document.getElementById('locateBookContainer1');
let fineID;
let visitUrl2;
let id2;

function openaddBookPopup(val){
   visitUrl2 = val;
   console.log('a');
   popupaddBook.classList.remove('popup');
   popupaddBook.classList.add('popupView');
   bookAddContainer1.classList.add('baground_filter');
   

}

function openaddCopyViewBookPopup(val){
   visitUrl2 = val;
   book_copy_Popup.classList.remove('book_copy_Popup');
   book_copy_Popup.classList.add('book_copy_Popup_view');
   bookAddContainer1.classList.add('baground_filter');
}

function closeBookCopyPopup(){
   popupaddBook.classList.add('book_copy_Popup');
   popupaddBook.classList.remove('book_copy_Popup_view');
   
    window.location.href = visitUrl2;
}

function closePopup(){
    popupaddBook.classList.add('popup');
    popupaddBook.classList.remove('popupView');
    window.location.href = visitUrl2;
}

// delete book popup
function openDelete1Popup(val){
   id2 = val;
   delete1Popup.classList.add('delete1PopupView');
   delete1Popup.classList.remove('delete1Popup');
   bodyContainer01ViewBook.classList.add('baground_filter');
}

function directPreviewPage(){
   delete1Popup.classList.remove('delete1PopupView');
   delete1Popup.classList.add('delete1Popup');
   window.location.href = "http://localhost/Pothpiyasa/public/books/deletePreview/"+id2;
}

function closeDeletePopup(){
   delete1Popup.classList.remove('delete1PopupView');
   delete1Popup.classList.add('delete1Popup');
   bodyContainer01ViewBook.classList.remove('baground_filter');
}

function openDelete2Popup(val){
   visitUrl2=val;
   delete2Popup.classList.add('delete2PopupView');
   delete2Popup.classList.remove('delete2Popup');
   bookDeleteContainer.classList.add('baground_filter');
  
}

function closeDelete2Popup(){
   delete2Popup.classList.add('delete2Popup');
   delete2Popup.classList.remove('delete2PopupView');
   bookDeleteContainer.classList.remove('baground_filter');
   window.location.href = visitUrl2;
}


function openLocatePopup(val){
    fineID = val;
    Locatepopup01.classList.remove('locatePopup');
    Locatepopup01.classList.add('locatePopupDisplay');
    containerFine1.classList.add('baground_filter');
 }

//  edit book popup
function openEditPopup(val){
   visitUrl2 = val;
   popupEdit.classList.add('popupEditView');
   popupEdit.classList.remove('popupEdit');
   editbookContainer.classList.add('baground_filter')
}

function closeEditPopup(){
   popupEdit.classList.add('popupEdit');
   popupEdit.classList.remove('popupEditView');
   window.location.href = visitUrl2;
}

// for return book
function openLocateReturnBookPopup(val){
   fineID = val;
   Locatepopup01.classList.remove('locatePopup');
   Locatepopup01.classList.add('locatePopupDisplay');
   containerFine1.classList.add('blur');
   
}

// for rene book
function openLocateRenewBookPopup(val){
   fineID = val;
   Locatepopup01.classList.remove('locatePopup');
   Locatepopup01.classList.add('locatePopupDisplay');
   containerFine1.classList.add('blur');
   
}

 function directBookLocatePage(){
   Locatepopup01.classList.remove('locatePopupDisplay');
   Locatepopup01.classList.add('locatePopup');

    fetch('http://localhost/Pothpiyasa/public/books/changeFineStatus/'+fineID)
    .then(response => response.text())
    .then(data => console.log(data))

    containerFine1.classList.remove('blur');
    containerAnimation.classList.remove('containerAnimation');
    containerAnimation.classList.add('containerAnimationDisplay');
    payfine.classList.remove('payFine');
    payfine.classList.add('payFineRemove');
    okbtn1.classList.remove('disabled');
    okbtn1.classList.add('okbtn');
    containerFine1.classList.remove('baground_filter');
    okbtn1.disabled = false;

 }

 function cancelFineDetails(){
   containerFine1.classList.remove('baground_filter');
 }
 function closeLocatePopup(){
   Locatepopup01.classList.remove('locatePopupDisplay');
   Locatepopup01.classList.add('locatePopup');
   containerFine1.classList.remove('baground_filter');
 }

//  close renew successful popup msg
function closeRenewSuccessPopup(){
   renew_sucess_Locatepopup.classList.remove('renew_sucess_locatePopup_view');
   renew_sucess_Locatepopup.classList.add('renew_sucess_locatePopup');
   renew_book_container.classList.remove('baground_filter');
 }

 //  open renew successful popup msg
function openRenewSuccessPopup(){
   renew_sucess_Locatepopup.classList.remove('renew_sucess_locatePopup');
   renew_sucess_Locatepopup.classList.add('renew_sucess_locatePopup_view');
   renew_book_container.classList.add('baground_filter');
 }

//  sending email popup msg
function openSendMail(){
   sendMail_sucess_Locatepopup.classList.add('sendMail_sucess_locatePopup_visible');
   sendMail_sucess_Locatepopup.classList.remove('sendMail_sucess_Locatepopup');
   sendMailContainer1.classList.add('baground_filter');
}
function closeSendMailSuccessPopup(){
   sendMail_sucess_Locatepopup.classList.remove('sendMail_sucess_locatePopup_visible');
   sendMail_sucess_Locatepopup.classList.add('sendMail_sucess_Locatepopup');
   window.location.href = "http://localhost/Pothpiyasa/public/librariandashboard";
   
 }

// open book copy add popup
function openBookCopy(){
   bookCopypopup.classList.remove('bookCopypopup');
   bookCopypopup.classList.add('bookCopypopupView');
   bookCopyContainer1.classList.add('baground_filter');

}

function closeBookCopy(){
   bookCopypopup.classList.add('bookCopypopup');
   bookCopypopup.classList.remove('bookCopypopupView');
   bookCopyContainer1.classList.remove('baground_filter');
}



// edit user
function editUserPopup(val){
   console.log("here");
   popupEdit.style.visibility = "visible";
   patron_edit_container_view.classList.add("bodyContainer02_blur");
   visitUrl2 = val;
   console.log(visitUrl2);
}

// delete user
function openDeleteUserPopup(val){
   id2 = val;
   delete1Popup.classList.add('delete1PopupView');
   delete1Popup.classList.remove('delete1Popup');
   patron_table_container_view.classList.add("patron_table_container_view_blur");
}

function directUserPreviewPage(){
   delete1Popup.classList.remove('delete1PopupView');
   delete1Popup.classList.add('delete1Popup');
   window.location.href = "http://localhost/Pothpiyasa/public/users/deletePreview/"+id2;
}

function closeUserPopup(){
   delete1Popup.classList.remove('delete1PopupView');
   delete1Popup.classList.add('delete1Popup');
   patron_table_container_view.classList.remove("patron_table_container_view_blur");

   // window.location.href = visitUrl2;
}

// add user

let bodyContainer02user = document.getElementById('bodyContainer02user');

function addUserPopup(val){
   addpopup.style.visibility = "visible";
   bodyContainer02user.classList.add('bodyContainer02_blur');
   visitUrl2 = val;
}


function closeUserAddPopup(){
   addpopup.style.visibility = "hidden";

   addpopup.classList.add('popup');
   bodyContainer02user.classList.remove('bodyContainer02_blur');

   addpopup.classList.remove('popupView');
   window.location.href = visitUrl2;
}

function openReturnViewBookPopup(val){
   visitUrl2 = val;
   console.log('hri');
   returnPopup.classList.remove('container_popup_return_book');
   returnPopup.classList.add('container_popup_return_book_view');
   bodyContainerReturn.classList.add('baground_filter');
}

function closeReturnPopup(){
   returnPopup.classList.add('container_popup_return_book');
   returnPopup.classList.remove('container_popup_return_book_view');
   bodyContainerReturn.classList.remove('baground_filter');
   window.location.href = visitUrl2;
}

// open issue book popup
function openIssueViewBookPopup(val){
   visitUrl2 = val;
   console.log('hri');
   renew_sucess_issue_Popup.classList.remove('renew_sucess_issue_Popup');
   renew_sucess_issue_Popup.classList.add('renew_sucess_issue_Popup_view');
   locateBookContainer1.classList.add('baground_filter');
}

// close issue book popup
function closeIssueViewBookPopup(val){
   renew_sucess_issue_Popup.classList.add('renew_sucess_issue_Popup');
   renew_sucess_issue_Popup.classList.remove('renew_sucess_issue_Popup_view');
   locateBookContainer1.classList.remove('baground_filter');
   window.location.href = visitUrl2;
}




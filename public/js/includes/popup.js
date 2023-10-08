
let popup = document.getElementById("popup");
let popup1=document.getElementById("popupEdit");
let bodyContainer02 = document.getElementById("bodyContainer02");

let visitUrl;
let id;

function openPopup(url){
    // popup.classList.add("open_popup");

    popupEdit.style.visibility = "visible";
    patron_edit_container_view.classList.add("bodyContainer02_blur");
    visitUrl = url;
    console.log(visitUrl);
  
}

function openEditUserProfilePopup(){
    bodyContainer02.classList.add("bodyContainer02_blur");
    // popup.classList.add("open_popup");
    popup1.style.visibility = "visible";
    
  
}

// i edited some parts
function closeEditUserPopup(){
    // popup.classList.remove("open_popup");
    popup1.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/AdminDashboard";

}

// i edited some parts
// function closePopup(){
//     // popup.classList.remove("open_popup");
//     popup.style.visibility = "hidden";
//     window.location.href = visitUrl;
// }

function openDeletePopup(val){
    // popup.classList.add("open_popup");
    patron_table_container_view.classList.add("patron_table_container_view_blur");
    popup.style.visibility = "visible";
    id = val; 
}

function closeDeletePopup(){
    // popup.classList.remove("open_popup");
    patron_table_container_view.classList.remove("patron_table_container_view_blur");
    popup.style.visibility = "hidden";
    
}

function openDelete2Popup(){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
}

function directPreviewPage(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/books/deletePreview/"+id;
}

function directPreviewPageAuthor(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/authors/deletePreview/"+id;
}

 







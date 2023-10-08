
let popup = document.getElementById("popup");
let visitUrl;
let id;

function openPopup(url){
    // popup.classList.add("open_popup");
   
    popup.style.visibility = "visible";
    visitUrl = url;
    
}

// i edited some parts
function closePopup(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = visitUrl;
}

function openDeletePopup(val){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    id = val; 
}

function openDelete2Popup(){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    
}

// function directPreviewPage(){
//     // popup.classList.remove("open_popup");
//     popup.style.visibility = "hidden";
//     window.location.href = "http://localhost/Pothpiyasa/public/books/deletePreview/"+id;
// }
function directPreviewPageAuthor(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/authors/deletePreview/"+id;
}

function changeFineStatus(){
    window.location.href = "http://localhost/Pothpiyasa/public/"+id;
    
}


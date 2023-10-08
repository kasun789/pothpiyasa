
let popup = document.getElementById("popup");
let bodyContainer02 = document.getElementById("bodyContainer02");
let fine_container01 = document.getElementById("fine_container01");
let container_view = document.getElementById("container_view");
let visitUrl;
let id;

function openPopup(url){
    popup.style.visibility = "visible";
    visitUrl = url;
    bodyContainer02.classList.add("bodyContainer02_blur");
    fine_container01.classList.add("fine_container_blur");
    container_view.classList.add("container_view_blur");


    
}

// i edited some parts
function closePopup(){
    popup.style.visibility = "hidden";
    window.location.href = visitUrl;
    bodyContainer02.classList.remove("bodyContainer02_blur");
    fine_container01.classList.remove("fine_container_blur");
    container_view.classList.remove("container_view_blur");



}

function openDeletePopup(val){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    id = val;
}

function closeDeletePopup(){
    popup.style.visibility = "hidden";
}

function openDelete2Popup(){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
}

function directPreviewPage(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/users/deletePreview/"+id;
}




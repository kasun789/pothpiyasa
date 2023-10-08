let visitUrl;
let config_container_view = document.getElementById("config_container_view");

function openPopup(url){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    config_container_view.classList.add("config_container_view_blur");
    visitUrl = url;
    // console.log(visitUrl);
  
}

// i edited some parts
function closePopup(){
    // popup.classList.remove("open_popup");
    // console.log("Here");
    // console.log(visitUrl);

    popup.style.visibility = "hidden";
    config_container_view.classList.remove("config_container_view_blur");
    window.location.href = visitUrl;
}
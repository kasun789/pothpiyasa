
let click_to_view_example_button = document.getElementById("click_to_view_example_button");
let example_popup = document.getElementById("example_popup");

let bulkaddpopup = document.getElementById('bulkaddpopup');
let bulkadd_container = document.getElementById('bulkadd_container');

let bulkadderrorpopup = document.getElementById('bulkadderrorpopup');


function show_example_popup(){
    example_popup.classList.add("example_popup_show");
    click_to_view_example_button.classList.add("hidden_click_view_button");
}

function bulkAddPopup(){
    bulkaddpopup.style.visibility = "visible";
    bulkadd_container.classList.add("bulkadd_container_blur");
 
}
 
function bulkAddErrorPopup(){
    bulkadderrorpopup.style.visibility = "visible";
    bulkadd_container.classList.add("bulkadd_container_blur");
 
}

function closeBulkAddPopup(){
    bulkaddpopup.style.visibility = "hidden";
    bulkadderrorpopup.style.visibility = "hidden";
    bulkadd_container.classList.remove("bulkadd_container_blur");
 
}
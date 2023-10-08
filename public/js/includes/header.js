
let profileImg = document.getElementById("profileImg");
let container_patron = document.getElementById("container_patron");


// function profilePopup(){
//     container_patron.classList.add("container_patron_popup");
// }

// Add a click event listener to the button
profileImg.addEventListener("click", function() {
    // Display the popup
    container_patron.classList.add("container_patron_popup");

    // container_patron.style.visibility = "visible";
    
  });

// Add a click event listener to the document
document.addEventListener("click", function(event) {

    // Check if the click target is outside the button and popup
    if (event.target !== profileImg && !container_patron.contains(event.target)) {
      // Hide the popup
      container_patron.classList.remove("container_patron_popup");
    
      
    }
  });

const addBtn = document.getElementById("addBtn");
const myForm = document.getElementById("myForm");

addBtn.addEventListener("click", function() {
  myForm.style.display = "flex";
  addBtn.classList.remove("addBtn");
  addBtn.classList.add("addbtnPreview");

  
});

// myForm.addEventListener("submit", function(event) {
//   event.preventDefault();
//   var p = document.getElementById("myParagraph");
//      if (!p) {
//             console.log("no exits")
//             myForm.style.display = "none";
//         } 
// });
let table = document.getElementById("category_table");



const submitButton = document.getElementById("addcategorybtn");

if (submitButton.disabled === false) {
    var p = document.getElementById("myParagraph");
    if(!p){

        myForm.style.display = "none";
        document.getElementById("BookCategoryName").value = "";


    }

    else{
        myForm.style.display = "flex";
        addBtn.classList.remove("addbtnPreview");
        addBtn.classList.add("addBtn");

    }

} 

const backButton = document.getElementById("backbtncatecagory");

    backButton.addEventListener("click", function() {
    myForm.style.display = "none";
    addBtn.classList.remove("addbtnPreview");
    addBtn.classList.add("addBtn");
    document.getElementById("BookCategoryName").value = "";

    unset(this.$errors);
    

  });



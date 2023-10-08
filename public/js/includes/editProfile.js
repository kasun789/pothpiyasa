
let changePasswordForm = document.getElementById("changePasswordForm");

function changePassword() {
    changePasswordForm.classList.add("changePasswordForm_popup");

}


function changePassword_cancel() {
    changePasswordForm.classList.remove("changePasswordForm_popup");

}

//sandali
//imgepreview
let preview=document.getElementById("imagepreview");
const changePicturebtn=document.querySelector(".changePicturebtn");
const fileToUpload=document.querySelector(".fileToUpload");

changePicturebtn.addEventListener('click',function(){
    fileToUpload.click();
});



fileToUpload.addEventListener("change", function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        preview.style.display ="block";

        reader.addEventListener("load", function(){
        // console.log(this);
        preview.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    }
});





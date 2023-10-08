//preview of the upload image

const image_input = document.getElementById("imagefile");
const container = document.getElementById("imagecontainer");
const preview = document.getElementById("imagepreview");


image_input.addEventListener("change", function(){
  const file = this.files[0];
  if(file){
    const reader = new FileReader();
    preview.style.display ="block";

    reader.addEventListener("load", function(){
      console.log(this);
      preview.setAttribute("src", this.result);
    });

    reader.readAsDataURL(file);
  }
});

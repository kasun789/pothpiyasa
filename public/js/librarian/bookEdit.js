let vendorRBtn = document.getElementById('Vendor');
let donorRBtn = document.getElementById('Donor');
let option1 = document.getElementById('option1');
let option2 = document.getElementById('option2');
let option3 = document.getElementById('option3');

let imgInput = document.getElementById('imagefile');
let previewImg = document.getElementById('imgPreview');

imgInput.addEventListener("change", function(){
    const file = this.files[0];
    if(file){
      const reader = new FileReader();
      previewImg.style.display ="block";
  
      reader.addEventListener("load", function(){
        previewImg.setAttribute("src", this.result);
      });
  
      reader.readAsDataURL(file);
    }
  });


function choseVendor(){
    option1.style.visibility = 'hidden';
    option2.style.visibility = 'visible';
    option3.style.visibility = 'hidden';
    
}
function choseDonor(){
    option1.style.visibility = 'hidden';
    option2.style.visibility = 'hidden';
    option3.style.visibility = 'visible';
    
}
`
`


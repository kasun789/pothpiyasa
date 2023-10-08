let btn = document.getElementById('btn');
let vendorBtn = document.getElementById('vendorbtn');
let donorBtn = document.getElementById('donorbtn');
let vendor = document.getElementById('vendor');
let donor = document.getElementById('donor');
let addbtn = document.getElementById('addbookbtn');
// let addpopup = document.getElementById('container_popup');
let check = document.getElementById('check');
// vendor donor box
let VendorDefineBtn = document.getElementById('VendorDefineBtn');
let vendorNameLable = document.getElementById('vendorNameLable');
let vendorName = document.getElementById('vendorName');
let vendorEmailLable = document.getElementById('vendorEmailLable');
let vendorEmail = document.getElementById('vendorEmail');
let vendorAddressLable = document.getElementById('vendorAddressLable');
let vendorbtn = document.getElementById('vendorSelect');


let vendorAddress = document.getElementById('vendorAddress');
let vendorTelLable = document.getElementById('vendorTelLable');
let vendorTel = document.getElementById('vendorTel');

let DonorDefineBtn = document.getElementById('DonorDefineBtn');
let DonorNameLable = document.getElementById('DonorNameLable');
let DonorName = document.getElementById('DonorName');
let DonorEmailLable = document.getElementById('DonorEmailLable');
let DonorEmail = document.getElementById('DonorEmail');
let DonorAddressLable = document.getElementById('DonorAddressLable');
let DonorAddress = document.getElementById('DonorAddress');
let DonorTelLable = document.getElementById('DonorTelLable');
let DonorTel = document.getElementById('DonorTel');
let DonerBtn = document.getElementById('DonorSelect');

// let defaultTask = document.getElementById('defaultTask');

function showVendorDetail(){
  vendorNameLable.style.opacity = '1';
  vendorName.style.opacity = '1';
  vendorEmail.style.opacity = '1';
  vendorEmailLable.style.opacity = '1';
  vendorAddressLable.style.opacity = '1';
  vendorAddress.style.opacity = '1';
  vendorTelLable.style.opacity = '1';
  vendorTel.style.opacity = '1';
  vendorbtn.style.opacity = '0.5';


  vendorNameLable.disabled = false;
  vendorName.disabled = false;
  vendorEmail.disabled = false;
  vendorEmailLable.disabled = false;
  vendorAddressLable.disabled = false;
  vendorAddress.disabled = false;
  vendorTelLable.disabled = false;
  vendorTel.disabled = false;
  vendorbtn.disabled = true;

}

function showDonorDetail(){
  DonorNameLable.style.opacity = '1';
  DonorName.style.opacity = '1';
  DonorEmailLable.style.opacity = '1';
  DonorEmail.style.opacity = '1';
  DonorAddressLable.style.opacity = '1';
  DonorAddress.style.opacity = '1';
  DonorTelLable.style.opacity = '1';
  DonorTel.style.opacity = '1';
  DonerBtn.style.opacity = '0.5';


  DonorNameLable.disabled = false;
  DonorName.disabled = false;
  DonorEmailLable.disabled = false;
  DonorEmail.disabled = false;
  DonorAddressLable.disabled = false;
  DonorAddress.disabled = false;
  DonorTelLable.disabled = false;
  DonorTel.disabled = false;
  DonerBtn.disabled = true;

}
function getVendor() {
  vendor.style.visibility='visible';
  donor.style.visibility = 'hidden';
  // defaultTask.style.visibility = 'hidden';
  btn.style.left = "0px";
  donorBtn.style.color = "black";
  vendorBtn.style.color = "white";
  vendorbtn.disabled = false;
  DonerBtn.disabled = true;
  
  

}

function getDonor(){
  vendor.style.visibility = "hidden";
  donor.style.visibility = "visible";
  // defaultTask.style.visibility = 'hidden';
  btn.style.left = "125px";
  vendorBtn.style.color = "black";
  donorBtn.style.color = "white";
  vendorbtn.disabled = true;
  DonerBtn.disabled = false;
  
  

}
check.addEventListener('click',function(){
  let isbn =document.getElementById('isbn').value;
  fetch('http://localhost/pothpiyasa/public/books/add',{
      method:'POST',
      headers:{
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body : 'value='+isbn
  })
  .then(res => console.log(res.text()))
  .then(result =>{
    
  })
})
  


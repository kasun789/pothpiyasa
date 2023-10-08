let errors = document.getElementById('errors');
let forgetPasswordCon1 = document.getElementById('forgetPasswordCon1');
let forgetPasswordH2 = document.getElementById('forgetPasswordH2');
// let forgetPasswordlable1 = document.getElementById('forgetPasswordlable1');
let forgetPasswordInput1 = document.getElementById('forgetPasswordInput1');
let forgetPasswordbtn1 = document.getElementById('forgetPasswordbtn1');
let errorsCon1 = document.getElementById('errorsCon1');

// forget password section 2
let forgetPasswordCon2 = document.getElementById('forgetPasswordCon2');
let forgetPasswordInput2 = document.getElementById('forgetPasswordInput2');
let forgetPasswordBtn2 = document.getElementById('forgetPasswordBtn2');

// forget password section 3
let forgetPasswordCon3 = document.getElementById('forgetPasswordCon3');
let newPasswordInput2 = document.getElementById('newPasswordInput2');
let conformPasswordInput2 = document.getElementById('conformPasswordInput2');
let changebtn = document.getElementById('changebtn');

function moveLables(){
    
    forgetPasswordH2.style.paddingBottom = '50px';
    // forgetPasswordlable1.style.paddingBottom = '50px';
    forgetPasswordCon1.style.height = '268px';
    forgetPasswordInput1.style.marginTop = '40px';
    forgetPasswordbtn1.style.marginTop = '30px';
    errorsCon1.style.marginTop= '10px';
}
function moveLablesSecretCode(){
    forgetPasswordCon2.style.height = '300px';
    forgetPasswordInput2.style.marginTop = '40px';
    forgetPasswordBtn2.style.marginTop = '30px';
}

function moveLablesSection3(){
    forgetPasswordCon3.style.height = '300px';
    newPasswordInput2.style.marginTop = '40px';
    conformPasswordInput2.style.marginTop = '40px';
    changebtn.style.marginTop = '30px';
}
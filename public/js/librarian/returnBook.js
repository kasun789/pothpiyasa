let form = document.getElementById('form');
let plusbtn = document.getElementById('plus');
let icon2 = document.getElementById('icon');
let errormesg = document.getElementById('errorMesg');
let returnbtn = document.getElementById('returnBookbtn');
let inputNic = document.getElementById('nic');



let i=0;
let count=0;
// event listener for accept btn
returnbtn.addEventListener('click',()=>{
    inputNic.value = ' ';
})

plusbtn.addEventListener('click',function A(){
    const input = document.createElement('input');
    input.type='text';
    input.name='text'+count;
    input.className ='text'+count;
    form.appendChild(input);
    i= i+1;
    count=count+1;

    const icon2 = document.createElement('i');
    icon2.className="fa-solid fa-square-xmark";
    icon2.id='icon'+count;
    console.log(input.className);
    errormesg.style.display = 'none';

    form.appendChild(icon2);
    if(i==3){
        form.appendChild(document.createElement("br"));
        i=0;
    }
    else if(i==1){
        input.style.marginLeft='50px'
    }
    if(count==9){
        plusbtn.removeEventListener("click",A);
    }
    

    icon2.addEventListener('click',function(){
        form.removeChild(input);
        form.removeChild(icon2);
        count=count-1;
        plusbtn.addEventListener("click",A);
        
        
    })
});

let arrow = document.getElementById('arrow');
let con1 = document.getElementById('containerWarning');
let containerFine = document.getElementById('containerFine');
let bodyContainer = document.getElementById('bodyContainer01');
let Locatepopup = document.getElementById('Locatepopup');
let cancel = document.getElementById('cancel');
let okbtn = document.getElementById('okbtn');
let contAnimi = document.getElementById('containerAnimation');



arrow.addEventListener('click',function () {
   con1.classList.remove('containerWarning');
   con1.classList.add('containerDisable');
   containerFine.classList.remove('containerFine');
   containerFine.classList.add('containerFineDisplay');
   okbtn.classList.add('disabled');
//    bodyContainer.classList.remove('bodyContainer01');
   bodyContainer.classList.add('bodyContainer');

   

})

cancel.addEventListener('click',function (){
   containerFine.classList.remove('containerFineDisplay');
   containerFine.classList.add('containerFine');
   issueBookContainer1.classList.remove('blur');
   issueBookContainer1.classList.add('issueBookContainer1');
   contAnimi.style.visibility = 'hidden';
})

function directNextPage(id){
   window.location.href = "http://localhost/Pothpiyasa/public/books/bookLocate/"+id;
}

function okbtnFun(){
    containerFine.classList.remove('containerFineDisplay');
    containerFine.classList.add('containerFine');
    bodyContainer.classList.remove('bodyContainer');
    bodyContainer.classList.add('bodyContainer01');
    contAnimi.style.visibility = 'hidden';
}


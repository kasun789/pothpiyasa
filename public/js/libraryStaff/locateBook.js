let form = document.getElementById('form');
let plusbtn = document.getElementById('plus');
let icon2 = document.getElementById('icon');
let date2 = document.getElementById('returnDate');
let togglebtn = document.getElementById('togglebtn');
let errormesg = document.getElementById('errorMesg');


let i=0;
let count=0;

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

togglebtn.addEventListener('change',function displayDate(){
    if(togglebtn.checked){
       date2.disabled = false;
    }
    else{
        date2.disabled = true; 
    }
});



let navbar = document.querySelector("#nav").querySelectorAll("a");
let about = document.getElementById('about');
let id = document.getElementById('id');

console.log(navbar);
navbar.forEach(element => {
    element.addEventListener("click", function(){
        navbar.forEach(nav=>nav.classList.remove("active"))
        this.classList.add("active");
    })
});


$(document).ready(function(){
    //set trigger and container variables

    var trigger =$('#nav ul li a'),
    container = $('#content');


    //fire onclick

    trigger.on('click',function(){
        //set this for reuse. set target from data attribute

        var $this = $(this),
        target = $this.data('target'); console.log(target);
    
       //load target page into container
       container.load('http://localhost/pothpiyasa/private/views/user/'+target+'.html');

       //stop normal  link behavior (refresh page)
       return false;
    
    
    });


});

// id.getElementById('click',()=>{
//     submenu.style.display = 'flex';
// })











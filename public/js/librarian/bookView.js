let activeItem = document.getElementById("activeItem");
let con = document.getElementById("activeA");
let previous = document.getElementById("previous");
let next = document.getElementById("next");

//get current url parameters
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const currentPage = urlParams.get('page');
const pages = urlParams.get('pages');

if(currentPage== 1){
    previous.style.color='gray';
}
else if(currentPage == pages){
    next.style.color = 'gray';
}
if(pages == 1){
    previous.style.color='gray';
    next.style.color = 'gray';
}

activeItem.style.background= '#0d6efd';
con.style.color = 'white';

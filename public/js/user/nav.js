// intialize navigation field
let toggelBar = document.getElementById("toggelBar");
let mainForm = document.getElementById("mainForm");

let dashboard_nav = document.getElementById('dashboard_nav');
let dashboardLabel = document.getElementById('dashbordLabel');

dashboard_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "237px";
  toggelBar.style.visibility = 'visible';
});


// console.log(window.location);
if (window.location.href === 'http://localhost/pothpiyasa/public/UserDashboard') {
  console.log("here");
  toggelBar.style.top = "237px";
  toggelBar.style.visibility = 'visible';
}


let profile_nav = document.getElementById('profile_nav');

// let editprofile = document.getElementById('editprofile');

profile_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
  accountlist.style.visibility ='visible';
  
});

 let url = window.location.href;
 let parameters  = url.split('/');
 let uid = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/editProfile/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}


let book_nav = document.getElementById('book_nav');


book_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
  booklist.style.visibility ='visible';
});

book_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  booklist.style.visibility ='hidden';
  
});

if (window.location.href === 'http://localhost/pothpiyasa/public/books/searchbookUsers') {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewSearchBookList') {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

 let url1 = window.location.href;
 let parameters1  = url.split('/');
 let uid1 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewSpecific/'+uid1) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

let reservation_nav = document.getElementById('reservation_nav');


reservation_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
 
});

reservation_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  
});

let url2 = window.location.href;
 let parameters2  = url.split('/');
 let uid2 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myreservations/'+uid2) {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}


let loan_nav = document.getElementById('loan_nav');

loan_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "437px";
  toggelBar.style.visibility = 'visible';
});

let url3 = window.location.href;
 let parameters3  = url.split('/');
 let uid3 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myloans/'+uid3) {
  toggelBar.style.top = "437px";
  toggelBar.style.visibility = 'visible';
}

let history_nav = document.getElementById('history_nav');


history_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "487px";
  toggelBar.style.visibility = 'visible';
  
});

history_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  
});

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myhistory/'+uid3) {
  toggelBar.style.top = "487px";
  toggelBar.style.visibility = 'visible';
}

let requestBook_nav = document.getElementById('requestBook_nav');


requestBook_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
  ;
});

requestBook_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  // categorylist.style.visibility ='hidden';
});

if (window.location.href === 'http://localhost/pothpiyasa/public/users/requestbooks') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}


let receivedbook_nav = document.getElementById('receivedbook_nav');


receivedbook_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "587px";
  toggelBar.style.visibility = 'visible';
  ;
});

receivedbook_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  // categorylist.style.visibility ='hidden';
});

if (window.location.href === 'http://localhost/pothpiyasa/public/users/receivedBookList') {
  toggelBar.style.top = "587px";
  toggelBar.style.visibility = 'visible';
}





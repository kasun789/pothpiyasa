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
if (window.location.href === 'http://localhost/pothpiyasa/public/LibrarianDashboard') {
  toggelBar.style.top = "237px";
  toggelBar.style.visibility = 'visible';
}


let account_nav = document.getElementById('account_nav');
let accountlist = document.getElementById('accountlist');
// let editprofile = document.getElementById('editprofile');

account_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
  accountlist.style.visibility ='visible';
  
});

account_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  accountlist.style.visibility ='hidden';
  
});

 let url = window.location.href;
 let parameters  = url.split('/');
 let uid = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/editProfile/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/searchbookUsers') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myreservations/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myloans/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/editProfile/requestbooks') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewSearchBookList') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewSpecific/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myhistory/'+uid) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/requestbooks') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/receivedBookList') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}
// 

let book_nav = document.getElementById('book_nav');
let booklist = document.getElementById('booklist');

book_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
  booklist.style.visibility ='visible';
});

book_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  booklist.style.visibility ='hidden';
  
});

if (window.location.href === 'http://localhost/pothpiyasa/public/books/add') {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books') {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/AddbookCopy/'+uid) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

let url2 = window.location.href;
let parameters2  = url.split('?');
let uid2 = parameters[parameters.length -1];
console.log(uid2);

if (window.location.href === 'http://localhost/pothpiyasa/public/books/'+uid2) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/edit/'+uid) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/bookLocate/'+uid) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}


if (window.location.href === 'http://localhost/pothpiyasa/public/books/bookLocateUsingUserName/'+uid) {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewReturnFrontPage') {
  toggelBar.style.top = "337px";
  toggelBar.style.visibility = 'visible';
}


let member_nav = document.getElementById('member_nav');
let memberlist = document.getElementById('memberlist');

member_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
  memberlist.style.visibility ='visible';
});

member_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  memberlist.style.visibility ='hidden';
});

if (window.location.href === 'http://localhost/pothpiyasa/public/users/add') {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users') {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/'+uid2) {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/users/edit/'+uid) {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}


let circulation_nav = document.getElementById('circulation_nav');

circulation_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "437px";
  toggelBar.style.visibility = 'visible';
});


if (window.location.href === 'http://localhost/pothpiyasa/public/books/circulation') {
  toggelBar.style.top = "437px";
  toggelBar.style.visibility = 'visible';
}


let inventory_nav = document.getElementById('inventory_nav');


inventory_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "487px";
  toggelBar.style.visibility = 'visible';
  ;
});

inventory_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  // categorylist.style.visibility ='hidden';
});

if (window.location.href === 'http://localhost/pothpiyasa/public/books/checkBook') {
  toggelBar.style.top = "487px";
  toggelBar.style.visibility = 'visible';
}



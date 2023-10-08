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
if (window.location.href === 'http://localhost/pothpiyasa/public/AdminDashboard') {
  console.log("here");
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

if (window.location.href === 'http://localhost/pothpiyasa/public/books/viewSearchBookList') {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

let url2 = window.location.href;
 let parameters2  = url.split('/');
 let uid2 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myreservations/'+uid2) {
  toggelBar.style.top = "287px";
  toggelBar.style.visibility = 'visible';
}

let url3 = window.location.href;
 let parameters3  = url.split('/');
 let uid3 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/myloans/'+uid3) {
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

let url4 = window.location.href;
 let parameters4  = url.split('/');
 let uid4 = parameters[parameters.length -1];
//  console.log("http://localhost/pothpiyasa/public/users/deletePreview/"+uid4);

 if (window.location.href === 'http://localhost/pothpiyasa/public/users/viewusers') {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
 }
if (window.location.href === 'http://localhost/pothpiyasa/public/users/edit/'+uid4) {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

let url5 = window.location.href;
 let parameters5  = url.split('/');
 let uid5 = parameters[parameters.length -1];

if (window.location.href === 'http://localhost/pothpiyasa/public/users/deletePreview/'+uid5) {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/BulkAdd/student_add') {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/BulkAdd/lecturer_add') {
  toggelBar.style.top = "387px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/BulkAdd/nonacademic_add') {
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
});

// inventory_nav.addEventListener("mouseout", () => {
//   toggelBar.style.visibility = 'hidden';
// });

if (window.location.href === 'http://localhost/pothpiyasa/public/books/checkBook') {
  toggelBar.style.top = "487px";
  toggelBar.style.visibility = 'visible';
}


let report_nav = document.getElementById('report_nav');

report_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
});

// author_nav.addEventListener("mouseout", () => {
//   toggelBar.style.visibility = 'hidden';
// });

if (window.location.href === 'http://localhost/pothpiyasa/public/reports') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/issued_books') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/returned_books') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/withdrawn_books') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/lost_books') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/damaged_books') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/fine_report') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/fine_payment') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/donors') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/vendors') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/reports/inventory_report') {
  toggelBar.style.top = "537px";
  toggelBar.style.visibility = 'visible';
}

let holiday_nav = document.getElementById('holiday_nav');

holiday_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "587px";
  toggelBar.style.visibility = 'visible';
});

// author_nav.addEventListener("mouseout", () => {
//   toggelBar.style.visibility = 'hidden';
// });

if (window.location.href === 'http://localhost/pothpiyasa/public/holidays') {
  toggelBar.style.top = "587px";
  toggelBar.style.visibility = 'visible';
}

let event_nav = document.getElementById('event_nav');

event_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "637px";
  toggelBar.style.visibility = 'visible';
});

// author_nav.addEventListener("mouseout", () => {
//   toggelBar.style.visibility = 'hidden';
// });

if (window.location.href === 'http://localhost/pothpiyasa/public/eventlogs') {
  toggelBar.style.top = "637px";
  toggelBar.style.visibility = 'visible';
}



let admin_nav = document.getElementById('admin_nav');
let adminlist = document.getElementById('adminlist');

admin_nav.addEventListener("mouseover", () => {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
  adminlist.style.visibility ='visible';
});

admin_nav.addEventListener("mouseout", () => {
  // toggelBar.style.visibility = 'hidden';
  adminlist.style.visibility ='hidden';
});

if (window.location.href === 'http://localhost/pothpiyasa/public/BookCategories/add') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/lendingcategories/add') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/attributes/lectureradd') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/attributes/studentadd') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/configSettings') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}

if (window.location.href === 'http://localhost/pothpiyasa/public/configSettings/privilegeSettings') {
  toggelBar.style.top = "687px";
  toggelBar.style.visibility = 'visible';
}


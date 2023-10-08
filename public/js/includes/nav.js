// intialize navigation field
let toggelBar = document.getElementById("toggelBar");
let mainForm = document.getElementById("mainForm");


let dashbordIconBack = document.getElementById("dashbordIconBack");
let dashbordIcon = document.getElementById("dashbordIcon");
let dashbordLabel = document.getElementById("dashbordLabel");

let accountIconBack = document.getElementById("accountIconBack");
let accountIcon = document.getElementById("accountIcon");
let accountLabel = document.getElementById("accountLabel");

let bookIconBack = document.getElementById("bookIconBack");
let bookIcon = document.getElementById("bookIcon");
let bookLabel = document.getElementById("bookLabel");

let memberIconBack = document.getElementById("memberIconBack");
let memberIcon = document.getElementById("memberIcon");
let memberLabel = document.getElementById("memberLabel");

let circulationIconBack = document.getElementById("circulationIconBack");
let circulationIcon = document.getElementById("circulationIcon");
let circulationLabel = document.getElementById("circulationLabel");

let bookCategoryIconBack = document.getElementById("bookCategoryIconBack");
let bookCategoryIcon = document.getElementById("bookCategoryIcon");
let bookCategoryLabel = document.getElementById("bookCategoryLabel");

let inventoryIconBack = document.getElementById("inventoryIconBack");
let inventoryIcon = document.getElementById("inventoryIcon");
let inventoryLabel = document.getElementById("inventoryLabel");

let authorIconBack = document.getElementById("authorIconBack");
let authorIcon = document.getElementById("authorIcon");
let authorLabel = document.getElementById("authorLabel");

let adminTaskIconBack = document.getElementById("rackIconBack");
let adminTaskIcon = document.getElementById("rackIcon");
let rackLabel = document.getElementById("rackLabel");

let booklist = document.getElementById('booklist');
//let bookArrow = document.getElementById('bookArrow');

let memberlist = document.getElementById('memberlist');
//let memberArrow = document.getElementById('memberArrow');

let racklist = document.getElementById('racklist');
//let memberArrow = document.getElementById('memberArrow');


dashbordLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "237px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
  
});

accountLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "287px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
  
 
});

bookLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "337px";
  booklist.style.visibility ='visible';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden'; 

});

memberLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "387px";
  memberlist.style.visibility ='visible';
  booklist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
  
});

circulationLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "437px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
 
});

bookCategoryLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "487px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
 
});

inventoryLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "537px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';
 
});

authorLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "587px";
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';
  racklist.style.visibility ='hidden';

});

adminTaskLabel.addEventListener("mouseover", () => {
  toggelBar.style.top = "637px";
  racklist.style.visibility ='visible';
  booklist.style.visibility ='hidden';
  memberlist.style.visibility ='hidden';

});

let popup1=document.getElementById('Locatepopup1');
let popup2=document.getElementById('Locatepopup2');
let popup3=document.getElementById('Locatepopup3');
let popup4=document.getElementById('Locatepopup4');
let popup5=document.getElementById('Locatepopup5');
let popup6=document.getElementById('Locatepopup6');
let BookCategoryName = document.getElementById('BookCategoryName');
let Description = document.getElementById('Description');
let contianerCategories = document.getElementById('contianerCategories');

let editbookcategorybutton = document.getElementById('editbookcategorybutton');

// let addbtnCategory= document.getElementBy('addcategorybtn9');
// let errorMessage = document.getElementById('myParagraph');

// console.log(errorMessage.value);
// console.log(BookCategoryName.value);
// addbtnCategory.addEventListener("click", function() {
//             if(errorMessage.value==""){
//                 BookCategoryName.value="";
//             }
// });
// const submitButton = document.getElementById("addcategorybtn9");

// if (submitButton.disabled === false) {
//     // var p = document.getElementById("myParagraph");
//     // if(!p){

//     //     document.getElementById("BookCategoryName").value = "";
       


//     // }
// }

function openAddCategoryPopup1(){
 
    if(BookCategoryName.value!= ""){
        popup1.classList.remove('locatePopup1');
        popup1.classList.add('locatePopupDisplay');
        contianerCategories.classList.add('baground_filter');
    }
    
   // containerFine.style.webkitFilter= "blur(5px)";
   // containerFine3.classList.add('blur');
  //  button.classList.add('blur');
 

}

 function openEditCategoryPopupView(){
 
    if(BookCategoryName.value!= ""){
        popup2.classList.remove('locatePopup2');
        popup2.classList.add('locatePopupDisplay');
        contianerCategories.classList.add('baground_filter');
     

       // container123.classList.add('blur');
    }
    
   // containerFine.style.webkitFilter= "blur(5px)";
   // containerFine3.classList.add('blur');
  //  button.classList.add('blur');
 

}
var id1;
var type1;

function openDeleteCategoryPopupView(idVal){
    id1=idVal;
    console.log(idVal);
       popup3.classList.remove('locatePopup3');
       popup3.classList.add('locatePopupDisplay');
       contianerCategories.classList.add('baground_filter');

}

function directController1(){
    popup1.classList.remove('locatePopupDisplay');
    popup1.classList.add('locatePopup1');
   console.log(BookCategoryName.value);
 
   window.location.href = "http://localhost/pothpiyasa/public/bookcategories/add/"+BookCategoryName.value;


}

function directControllerEdit(){
    popup2.classList.remove('locatePopupDisplay');
    popup2.classList.add('locatePopup2');
   window.location.href = "http://localhost/pothpiyasa/public/bookcategories/edit/"+id+"/"+BookCategoryName.value;




}

function directControllerDelete(){
    popup3.classList.remove('locatePopupDisplay');
    popup3.classList.add('locatePopup3');
   window.location.href = "http://localhost/pothpiyasa/public/bookcategories/delete/"+id1;
}

function directDeleteCategoryDelete(){
    popup6.classList.remove('locatePopupDisplay');
    popup6.classList.add('locatePopup6');
   window.location.href = "http://localhost/pothpiyasa/public/lendingcategories/delete/"+id1;
}

function closePopupView3(){
    popup3.classList.remove('locatePopupDisplay');
    popup3.classList.add('locatePopup3');
    
    contianerCategories.classList.remove('baground_filter');



}



function closePopupView2(){
    popup2.classList.remove('locatePopupDisplay');
    popup2.classList.add('locatePopup2');
    contianerCategories.classList.remove('baground_filter');


}

function closePopupView1(){
    console.log('awaaaa');
    contianerCategories.classList.remove('baground_filter');
    popup1.classList.remove('locatePopupDisplay');
    popup1.classList.add('locatePopup1');
    



}





//// Lending Categories 



function openLaddCategoryPopupView(){



    if(BookCategoryName.value!= ""){
        popup4.classList.remove('locatePopup4');
        popup4.classList.add('locatePopupDisplay');
        contianerCategories.classList.add('baground_filter');

    }

}

function directController4(){
 popup4.classList.remove('locatePopupDisplay');
 popup4.classList.add('locatePopup4');

window.location.href = "http://localhost/pothpiyasa/public/lendingcategories/add/"+BookCategoryName.value+"/"+Description.value;




}

function closePopupView4(){
    popup4.classList.remove('locatePopupDisplay');
    popup4.classList.add('locatePopup4');
    contianerCategories.classList.remove('baground_filter');



}





function openLeditCategoryPopupView(){
 
    popup5.classList.remove('locatePopup5');
    popup5.classList.add('locatePopupDisplay');
    contianerCategories.classList.add('baground_filter');

}

function directController5(){
 popup5.classList.remove('locatePopupDisplay');
 popup5.classList.add('locatePopup5');


 window.location.href = "http://localhost/pothpiyasa/public/lendingcategories/edit/"+id+"/"+BookCategoryName.value+"/"+Description.value;




}

function closePopupView5(){
    popup5.classList.remove('locatePopupDisplay');
    popup5.classList.add('locatePopup5');
    contianerCategories.classList.remove('baground_filter');


}



function openLdeleteCategoryPopupView(idVal){
    id1=idVal;
    popup6.classList.remove('locatePopup6');
    popup6.classList.add('locatePopupDisplay');
    contianerCategories.classList.add('baground_filter');

}

function directController6(){
 popup6.classList.remove('locatePopupDisplay');
 popup6.classList.add('locatePopup6');


window.location.href = "http://localhost/pothpiyasa/public/lendingcategories/delete/"+id1;




}

function closePopupView6(){
    popup6.classList.remove('locatePopupDisplay');
    popup6.classList.add('locatePopup6');
    contianerCategories.classList.remove('baground_filter');



}

//lecturer attribute


function openLecAttributeDeleteCategoryPopupView(idVal,typeVal){
     id1=idVal;
     type1=typeVal;
    popup1.classList.remove('locatePopup1');
    popup1.classList.add('locatePopupDisplay');
    contianerCategories.classList.add('baground_filter');


}

function directController8(){
 popup1.classList.remove('locatePopupDisplay');
 popup1.classList.add('locatePopup1');
  
window.location.href = "http://localhost/pothpiyasa/public/attributes/lecturerdelete/"+type1+"/"+id1;




}

function closePopupView8(){
    popup1.classList.remove('locatePopupDisplay');
    popup1.classList.add('locatePopup1');
    contianerCategories.classList.remove('baground_filter');
}

//student attribute delete

function openStudentAttributeDeleteCategoryPopupView(idVal,typeVal){
    id1=idVal;
     type1=typeVal;
    popup1.classList.remove('locatePopup1');
    popup1.classList.add('locatePopupDisplay');
    contianerCategories.classList.add('baground_filter');

}

function directController7(){
 popup1.classList.remove('locatePopupDisplay');
 popup1.classList.add('locatePopup1');


window.location.href = "http://localhost/pothpiyasa/public/attributes/studentdelete/"+type1+"/"+id1;




}

function closePopupView7(){
    popup1.classList.remove('locatePopupDisplay');
    popup1.classList.add('locatePopup1');
    contianerCategories.classList.remove('baground_filter');


}































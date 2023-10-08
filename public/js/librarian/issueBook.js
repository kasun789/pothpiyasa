let arrow = document.getElementById('arrow');
let con1 = document.getElementById('containerWarning');
let containerFine = document.getElementById('containerFine');
let issueBookContainer1 = document.getElementById('issueBookContainer1');
let issueBookContainer2 = document.getElementById('issueBookContainer2');
let Locatepopup = document.getElementById('Locatepopup');
let cancel = document.getElementById('cancel');
let Next = document.getElementById('Next');
let locateByName = document.getElementById('locateByName');
let noResult = document.getElementById('noResult');

if(rows > 0){
   issueBookContainer1.style.paddingBottom = rows * 50+'px';
}



if(arrow != null){
   arrow.addEventListener('click',function () {
      con1.classList.remove('containerWarning');
      con1.classList.add('containerDisable');
      containerFine.classList.remove('containerFine');
      containerFine.classList.add('containerFineDisplay');
      Next.classList.add('disabled');
      issueBookContainer1.classList.add('baground_filter');
   })
}

if(cancel != null){
   cancel.addEventListener('click',function (){
      containerFine.classList.remove('containerFineDisplay');
      containerFine.classList.add('containerFine');
      issueBookContainer1.classList.remove('blur');
      issueBookContainer1.classList.add('issueBookContainer1');
      issueBookContainer1.classList.remove('baground_filter');
   })
}


function directNextPage(id){
   window.location.href = "http://localhost/Pothpiyasa/public/books/bookLocate/"+id;
}




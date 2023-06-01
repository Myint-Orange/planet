const thBtn = document.querySelector('#th-btn');
const enBtn = document.querySelector('#en-btn');
const chBtn = document.querySelector('#ch-btn');

registrationControl();

$(document).ready(function(){
  $("#close-icon").click(function(){
    $("#success-gp").hide();
  });
  $("#th-btn").click(function(){
    console.log("th buttion alivw")
    updateFormAction('th');
    $("#success-gp").hide();
  });
  $("#en-btn").click(function(){
    updateFormAction('en');
    $("#success-gp").hide();
  });
  $("#ch-btn").click(function(){
    updateFormAction('ch');
    $("#success-gp").hide();  
  });
});

function updateFormAction(lang) {
 
  var content = sessionData.content;
 
  sessionData.lang = lang;
  var newActionRoute = `${lang}`;
  var form = document.getElementById("regform");
  form.setAttribute("action", newActionRoute);
 
  $('#inputContent').val(content['content_' + lang]);
}

function registrationControl(){
  var content = sessionData.content;
  var lang = sessionData.lang;
  if (content) {
    if (content.content_en == null) enBtn.classList.add('hide-element');
    if (content.content_th == null) thBtn.classList.add('hide-element');
    if (content.content_ch == null) chBtn.classList.add('hide-element');
    $(`#${lang}-btn`).addClass('active');
    updateFormAction(lang);
  }
  
  function stayExistingPage(){
    var btn_name=`${lang}_btn`
    $( btn_name).show();
    updateFormAction(lang);
  }
  

}


'use strict';
const modalId=document.querySelector('#modal-id');
console.log("modal-id="+modalId);
const modal=document.querySelector('.modal');
const overlay=document.querySelector('.overlay');
const btnCloseModal=document.querySelector('.close-modal');
const btnsOpenModal=document.querySelectorAll('.show-modal');
console.log(btnsOpenModal);

const closeModal=function(){
  modal.classList.add('hidden');
  overlay.classList.add('hidden');
}
const openModal=function(){
  modal.classList.remove('hidden');
  overlay.classList.remove('hidden');
}

for(let i=0;i<btnsOpenModal.length;i++){
  btnsOpenModal[i].addEventListener('click',openModal);
  btnCloseModal.addEventListener('click',closeModal);
  overlay.addEventListener('click',closeModal);
  }

  document.addEventListener('keydown',function(e){
   if(e.key=='Escape'){
    
    if(!modal.classList.contains('hidden')){
      closeModal();
    }
   }

  });

  
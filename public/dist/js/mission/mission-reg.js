
const thBtn=document.querySelector('#th-btn');
const enBtn=document.querySelector('#en-btn');
const chBtn=document.querySelector('#ch-btn');

registrationControl();
   


$(document).ready(function(){
  
$("#th-btn").click(function(){
   $("#card-header").html(`Add <b>Mission </b> with <b>${$("#th-btn").text()}</b>`);
   updateFormAction('th');
});
$("#en-btn").click(function(){
    $("#card-header").html(`Add <b>Mission </b> with <b>${$("#en-btn").text()}</b>`);
    updateFormAction('en');
 });
 $("#ch-btn").click(function(){
    $("#card-header").html(`Add <b>Mission </b> with <b>${$("#ch-btn").text()}</b>`);
    updateFormAction('ch');
    
 });
 

});

function updateFormAction(lang) {
   var newActionRoute = `store/${lang}`;
   var form = document.getElementById("regform");
   form.setAttribute("action", newActionRoute);
 }

function registrationControl(){
   var content = sessionData.content;

   console.log("session ="+content);
  
   if(content!=null){
      if(content.content_en!=null){
         enBtn.classList.add('hide-element');
      }
      if(content.content_th!=null){
         thBtn.classList.add('hide-element');
      }
      if(content.content_ch!=null){
         chBtn.classList.add('hide-element');
      }

      if(content.content_en==null){
         enBtn.classList.add('active');
         $("#card-header").html(`Add core value with <b>${$("#en-btn").text()}</b>`);
         updateFormAction('en');
      }else if(content.content_th==null){
         thBtn.classList.add('active');
         $("#card-header").html(`Add core value with <b>${$("#th-btn").text()}</b>`);
         updateFormAction('th');
      }else if(content.content_ch==null){
         chBtn.classList.add('active');
         $("#card-header").html(`Add core value with <b>${$("#ch-btn").text()}</b>`);
         updateFormAction('ch');
      }

      if((content.content_en!=null&&content.content_th!=null&&content.content_ch!=null)){
         console.log('to reg')
         $("#regform").hide();
         $("#settings").hide();
         $("#success-alert").show();
         $("#btn-back").show();
      }
   }
}
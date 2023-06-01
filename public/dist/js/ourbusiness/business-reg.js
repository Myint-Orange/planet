
const thBtn=document.querySelector('#th-btn');
const enBtn=document.querySelector('#en-btn');
const chBtn=document.querySelector('#ch-btn');

registrationControl();
   


$(document).ready(function(){
  
$("#th-btn").click(function(){ 
   $("#card-header").html(`<b>${$("#th-btn").text()}</b>`);
   updateFormAction('th');
});
$("#en-btn").click(function(){
    $("#card-header").html(`Add <b>Business</b> with <b>${$("#en-btn").text()}</b>`);
    updateFormAction('en');
 });
 $("#ch-btn").click(function(){
    $("#card-header").html(`Add <b>Business</b> with <b>${$("#ch-btn").text()}</b>`);
    updateFormAction('ch');
    
 });
 $("#btn-reg-core-value").click(function(){
   
   
});


});

function updateFormAction(lang) {
   var newActionRoute = `store/${lang}`;
   var form = document.getElementById("regform");
   form.setAttribute("action", newActionRoute);
 }

function registrationControl(){
   var title = sessionData.title;
   console.log(title);
   if(title!=null){
      
    
      
      if(title.title_en!=null){
         enBtn.classList.add('hide-element');
      }
      if(title.title_th!=null){
         thBtn.classList.add('hide-element');
      }
      if(title.title_ch!=null){
         chBtn.classList.add('hide-element');
      }

      if(title.title_en==null){
         enBtn.classList.add('active');
         $("#card-header").html(`Add Business with <b>${$("#en-btn").text()}</b>`);
         updateFormAction('en');
      }else if(title.title_th==null){
         thBtn.classList.add('active');
         $("#card-header").html(`Add Business with <b>${$("#th-btn").text()}</b>`);
         updateFormAction('th');
      }else if(title.title_ch==null){
         chBtn.classList.add('active');
         $("#card-header").html(`Add Business with <b>${$("#ch-btn").text()}</b>`);
         updateFormAction('ch');
      }

      if((title.title_en!=null&&title.title_th!=null&&title.title_ch!=null)){
         console.log('to reg')
         $("#regform").hide();
         $("#settings").hide();
         $("#success-alert").show();
         $("#btn-back").show();
      }
   }
}
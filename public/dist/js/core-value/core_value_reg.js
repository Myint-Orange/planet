
const thBtn=$('#th-btn');
const enBtn=$('#en-btn');
const chBtn=$('#ch-btn');

registrationControl();
   


$(document).ready(function(){ 
  checkBtn();
});

function updateFormAction(lang) {
   var newActionRoute = `store/${lang}`;
   var form = document.getElementById("regform");
   form.setAttribute("action", newActionRoute);
 }

function registrationControl(){
   var title = sessionData.title;
   console.log("title="+title);
   if(title!=null){
      if(title.title_en!=null){
         enBtn.hide();
      }
      if(title.title_th!=null){
         thBtn.hide();
      }
      if(title.title_ch!=null){
         chBtn.hide();
      }

      if(title.title_en==null){
         enBtn.show();
         $("#title-lang").html(`<b>${$("#en-btn").text()}</b>`);
         updateFormAction('en');
      }else if(title.title_th==null){
         thBtn.show();
         $("#title-lang").html(`<b>${$("#th-btn").text()}</b>`);
         updateFormAction('th');
      }else if(title.title_ch==null){
         chBtn.show();
         $("#title-lang").html(`<b>${$("#ch-btn").text()}</b>`);
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
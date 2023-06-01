const thBtn=document.querySelector('#th-btn');
const enBtn=document.querySelector('#en-btn');
const chBtn=document.querySelector('#ch-btn');


   
$(document).ready(function(){ 
  registrationControl();
  checkBtn();
});

function updateFormAction(lang) {
   var newActionRoute = `store/${lang}`;
   var form = document.getElementById("regform");
 
   form.setAttribute("action", newActionRoute);
 }

function registrationControl(){
   //var title = sessionData.title;
   //var type=sessionData.type;
 ////  console.log('type.reg='+type);
//console.log("title="+title);
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
         $("#title-lang").html(`<b>${$("#en-btn").text()}</b>`);
         updateFormAction('en');
      }else if(title.title_th==null){
         console.log("Arrive btn thai");
         thBtn.classList.add('active');
         $("#title-lang").html(`<b>${$("#th-btn").text()}</b>`);
         updateFormAction('th');
      }else if(title.title_ch==null){
         chBtn.classList.add('active');
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
function checkBtn(){
    $("#th-btn").click(function(){
      console.log("Arrive function check btn")
        $("#title-lang").html(`<b>${$("#th-btn").text()}</b>`);
        updateFormAction('th');
     });
     $("#en-btn").click(function(){
         $("#title-lang").html(`<b>${$("#en-btn").text()}</b>`);
         updateFormAction('en');
      });
      $("#ch-btn").click(function(){
         $("#title-lang").html(`<b>${$("#ch-btn").text()}</b>`);
         updateFormAction('ch');
         
      });
}

function updateLabel() {
   var input = document.getElementById('imgpost');
   var preview = document.getElementById('preview');
   var file = input.files[0];
   var reader = new FileReader();

   reader.onload = function(e) {
       preview.src = e.target.result;
   };

   reader.readAsDataURL(file);
}

function updateLabelCover() {
   var input = document.getElementById('coverImg');
   var preview = document.getElementById('preview_cover');
   var file = input.files[0];
   var reader = new FileReader();

   reader.onload = function(e) {
       preview.src = e.target.result;
   };

   reader.readAsDataURL(file);
}

function displaySelectedPhotos() {
   const photoContainer = document.getElementById("photo-container");
   
   const selectedPhotos = document.getElementById("photos").files;
   for (let i = 0; i < selectedPhotos.length; i++) {
     const photo = selectedPhotos[i];
     const div = document.createElement("div");
     div.classList.add("col-sm-2");
     const a = document.createElement("a");
     
     a.href = URL.createObjectURL(photo);
     a.dataset.toggle = "lightbox";
     a.dataset.gallery = "gallery";
     
     const img = document.createElement("img");
     img.classList.add("img-fluid");
     img.classList.add("mb-2");
     img.src = URL.createObjectURL(photo);
     a.appendChild(img);
     div.appendChild(a);
     photoContainer.appendChild(div);
   }
 }

 
 function updatePreview() {
   var preview = document.querySelector('#vedioPreview');
   var file    = document.querySelector('#vedio').files[0];
   var reader  = new FileReader();
   reader.addEventListener("load", function () {
     preview.src = reader.result;
   }, false);
   if (file) {
     reader.readAsDataURL(file);
   }
 }
 const thaiBtn = document.querySelector('#th-btn');
 const engBtn = document.querySelector('#en-btn');
 const chBtn = document.querySelector('#ch-btn');
 
 registrationControl();
 $(document).ready(function(){
   $("#close-icon").click(function(){
     $("#success-gp").hide();
   });
   $("#th-btn").click(function(){
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
   
   console.log('title upd='+title.title_en);
   var newActionRoute = `${lang}`;
   var form = document.getElementById("regform");
   form.setAttribute("action", newActionRoute);
   $('#inputTitle').val(title['title_' + lang]);
   $('#inputSubTitle').val(subTitle['title_' + lang]);
   $('#inputContent').html(content['content_' + lang]);
   history.pushState({}, null, `/${type.name}/update/${lang}`);
 }
 
 function registrationControl(){
   
   console.log("update title="+title.title_en);
   console.log("Update lang="+lang);
   if (title) {
    console.log("Arrive change"); 
     if (title.title_en == null) engBtn.classList.add('hide-element');
     if (title.title_th == null) thaiBtn.classList.add('hide-element');
     if (title.title_ch == null) chBtn.classList.add('hide-element');
     $(`#${lang}-btn`).addClass('active');
     updateFormAction(lang);
   }
   
   function stayExistingPage(){
     var btn_name=`${lang}_btn`
     $( btn_name).show();
     updateFormAction(lang);
   }

}
function updateLabel() {
  var input = document.getElementById('image');
  var preview = document.getElementById('preview');
  var file = input.files[0];
  var reader = new FileReader();

  reader.onload = function(e) {
      preview.src = e.target.result;
  };

  reader.readAsDataURL(file);
}
 
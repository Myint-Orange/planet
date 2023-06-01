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

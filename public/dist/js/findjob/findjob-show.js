

changeTableLang('','none','none');
$(document).ready(function(){
  $("#close-box,#delete-icon").click(function(){ 
    $("#overlay").hide();
    $("#delete-card").hide();
  });
   $("#cho-en").click(function(){ 
      changeTableLang('','none','none');
    });

    $("#cho-th").click(function(){
      changeTableLang('none','','none');
    });

    $("#cho-ch").click(function(){ 
      changeTableLang('none','none','');
    });
});  
    function changeTableLang(en,th,ch){
      var table = document.getElementById("example2");
      for (var i = 1; i < table.rows.length-1; i++) {
      var row = table.rows[i];
    
     row.cells[1].style.display = en;

      row.cells[2].style.display = th;
      
      row.cells[3].style.display = ch;
/////////////////////sub title////////////////
      row.cells[4].style.display = en;

      row.cells[5].style.display = th;

      row.cells[6].style.display = ch;
      
  

    
      }
    }

    
    


 

   
           
            




/*var type = sessionData.type;
changeTableLang('en');
$(document).ready(function(){
  $("#close-box,#delete-icon").click(function(){ 
    $("#overlay").hide();
    $("#delete-card").hide();});

   $("#cho-en").click(function(){ 
      changeTableLang('en');});

    $("#cho-th").click(function(){ 
      changeTableLang('th');});

    $("#cho-ch").click(function(){
      changeTableLang('ch');});
});  
    function changeTableLang(lang){
      var table = document.getElementById("example2");
      for (var i = 1; i < table.rows.length-1; i++) {
      var row = table.rows[i];    
      var valname=`title_${lang}`;
      if((type.posts[i-1].titles.length>0) && (type.posts[i-1].titles[0][`title_${lang}`]!=null)) {
            var title=type.posts[i-1].titles[0][`title_${lang}`];
            row.cells[1].textContent = splitString(title);
            var content=type.posts[i-1].contents[1][`content_${lang}`];
            row.cells[2].innerHTML = splitAndMakeFormat(content);
           // console.log("arrive");
      } else {
           // console.log("null || undefine");
            row.cells[1].innerHTML = '<span class="badge badge-warning">Content English is needed!!</span>';
            row.cells[2].innerHTML = '<span class="badge badge-warning">Content English is needed!!</span>';
      }
     
    }
    }
    function splitString(str){
      return str.match(/.{1,30}\b/g);}

    function splitAndMakeFormat(contact){
      const parts = contact.split('$$');
      const result = parts.join('<br>');
      return result;}

    function updateFormAction(id){
      var newActionRoute = `delete/${id}`;
      var btnmiss = document.getElementById("btn-mission");
      btnmiss.setAttribute("href", newActionRoute);}

 

   
           
    */        




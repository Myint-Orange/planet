

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

    
    


 

   
           
            




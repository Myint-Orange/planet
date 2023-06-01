
changeTableLang('','none','none');
$(document).ready(function(){
  $("#close-box,#delete-icon").click(function(){ 
    $("#overlay").hide();
    $("#delete-card").hide();
   
  });

    $("#cho-en").click(function(){changeTableLang('','none','none');});
    $("#cho-th").click(function(){changeTableLang('none','','none');});
    $("#cho-ch").click(function(){changeTableLang('none','none','');});
});  
    function changeTableLang(en,th,ch){
      var table = document.getElementById("example2");
      for (var i = 1; i < table.rows.length-1; i++) {
      var row = table.rows[i];
      console.log(row.cells[1]);
      row.cells[1].style.display = en;
      row.cells[2].style.display = th;     
      row.cells[3].style.display = ch;     
      }
    }

    const deleteButtons = document.querySelectorAll('.delete-row');   
    deleteButtons.forEach(button => {
      button.addEventListener('click', () => {
        $("#delete-card").show();
        $(".overlay").show();      
        const row = button.closest('tr');
        const id = row.querySelector('td:first-child').textContent;
        const content = row.querySelector('td:nth-child(2)').textContent;
        updateFormAction(id);
        $('#inputId').val(id);
        $('#inputContent').val(content);
        console.log(`Row ID: ${id}\nContent: ${content}\nLanguage: ${language}`); 
      });
    });

    function updateFormAction(id) {
      var newActionRoute = `delete/${id}/${type.id}`;
      var btnmiss = document.getElementById("btn-mission");
      btnmiss.setAttribute("href", newActionRoute);
    }
           
            




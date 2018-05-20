var track1 = document.getElementById('tuto1');
var menu = document.getElementById('menu');
var track2 = document.getElementById('tuto2');
var alta = document.getElementById('nt');
var feed = document.getElementById('feed');
var track3 = document.getElementById('tuto3');
var tuto = document.getElementById('nanituto');
var tabs = document.getElementById('tabs');
var track4 = document.getElementById('tuto4');

menu.style = "z-index: 70000000000;";

$('#click1').click(function(){
        	track1.style = "display:none";
        	track2.style = "display:block";
        	alta.style = "z-index: 70000000000;";
        	menu.style = "z-index: 70;";
   		 });

$('#click2').click(function(){
        	track2.style = "display:none";
        	alta.style = "z-index: 70;";
          tabs.style= "z-index: 99999999999;"
          track3.style= "display: block;"
   		 });

$('#click3').click(function(){
          track3.style = "display:none";
          alta.style = "z-index: 70;";
          tabs.style= "z-index: 70;"
          track4.style= "display: block;"
       });

$('#click4').click(function(){
          tuto.style = "display: none";
          track4.style = "display: none"
          var finalizado = "3"; 
          $.post("/finish", {finalizado: finalizado},
          function(data){
         $("#resposta").html(data);
         }
         , "html");
         });
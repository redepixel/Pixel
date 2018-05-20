var track1 = document.getElementById('tuto1');
var menu = document.getElementById('menu');
var track2 = document.getElementById('tuto2');
var alta = document.getElementById('nt');
var feed = document.getElementById('feed');
var track3 = document.getElementById('tuto3');

menu.style = "z-index: 70000000000;";

$('#click1').click(function(){
        	track1.style = "display:none";
        	track2.style = "display:block";
        	alta.style = "z-index: 70000000000;";
        	menu.style = "z-index: 70;";
   		 });

$('#click2').click(function(){
        	track2.style = "display:none";
        	track3.style = "display:block";
        	alta.style = "z-index: 70;";
        	feed.style = "z-index: 7000000000;";
   		 });
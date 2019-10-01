$(document).ready(function() {

//on click singup, hide loin and show registration form 
$("#singup").click(function() {
 	$("#first").slideUp("slow", function(){
 		$("#second").slideDown("slow");
 	});
});

//on click singup, hide loin and show login form 
$("#singin").click(function() {
 	$("#second").slideUp("slow", function(){
 		$("#first").slideDown("slow");
 	});
});


});
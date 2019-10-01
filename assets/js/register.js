$(document).ready(function() {

//on click singup, hide login and show registration form 
$("#singup").click(function() {
 	$("#first").slideUp("slow", function(){
 		$("#second").slideDown("slow");
 	});
});

//on click singin, hide register and show login form 
$("#singin").click(function() {
 	$("#second").slideUp("slow", function(){
 		$("#first").slideDown("slow");
 	});
});


});
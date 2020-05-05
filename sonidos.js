

$("#botonsi" ).click(function() {
	
  var sonido = new Audio("beethoven.mp3");
  sonido.play();
  $("#botonno" ).click(function() {
	  
	  sonido.pause();
  });
});

$("#botonsis").click (function(){
	
var sonid = new Audio("pim.mp3");
sonid.play();

});


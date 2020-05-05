
/*var preg=["pregunta1?", "pregunta2", "pregunta3"];
	
	var rta1=["Correcta1", "correcta2", "correcta3"];
	var rta2=["Incorrecta1.1", "incorrecta 2.1", "incorrecta 3.1"];
	var rta3=["Incorrecta 1.2", "incorrecta2.2", "incorrecta3.2"];
var rta4=["Incorrecta 1.3", "incorrecta 2.3", "incorrecta 3.3"];*/
var rtas = [rta1, rta2, rta3, rta4];

var puntos = 0; 

var jugadas = 0;
var totales = preg.length;

var respuestas=[];

vecesjugadas();

//verifico cuantas veces jugó
function vecesjugadas() {
	
	
	if (jugadas == totales){
		respuestas.pop();
		//alert (respuestas);
		$( document ).ready(function() {
			var snd = new Audio("waw.mp3");
			snd.play();
		});
		document.getElementById('btndeform').click();
	//	document.write("Obtuviste "+puntos+" puntos<br><br>");
		//SE EJECUTA ESTA FUNCION AL TERMINAR LAS PREGUNTAS
		//const button = document.createElement("button");
		//button.type = 'submit';
		//button.className = 'btnn';
		//button.innerText = 'Menu';
		//document.body.appendChild(button);
		//$(".t").click (function(){
		//	location.href=".html"; //agregar ir al menu
	//});
	}
	else {
		
		jugar();
	}
	
}


function jugar(){
	var tiempo = 10;
	
	var indice = [0,1,2,3];
	var rtas_ordenadas = [];
	var i_rta_correcta
	
	
	
	//hace el random
	for(i in rtas) {
		var rtas_random = Math.floor(Math.random()*indice.length);
		rtas_ordenadas[i] = rtas[indice[rtas_random]];
		indice.splice(rtas_random, 1);
	}
	
	
	//envia a un array los botones con el random hecho
	var mostrar_rtas="";
	
	for (i in rtas_ordenadas) {
		mostrar_rtas += '<button type="button" class="botoncito" onclick="">'+rtas_ordenadas[i][jugadas]+'</button><br>';
		
	}
	
	// envia los datos al html
	document.getElementById("pregunta").innerHTML= preg[jugadas];
	document.getElementById("respuestas").innerHTML=mostrar_rtas;
	document.getElementById("punt").innerHTML= "Puntaje: "+puntos;
	document.getElementById("totaljugadas").innerHTML= jugadas+"/"+totales;
	//var tiem = setInterval(cuentaregresiva,1000);
	
	//setTimeout(()=>{
	document.querySelector(".meter .bar span").style.display="block";
	document.querySelector(".meter .bar span").classList.add("start");
	//document.querySelector(".meter .num").innerHTML=contador;
	//function cuentaregresiva
	var tiem=setInterval(()=>{
		tiempo--;
		document.querySelector(".meter .num").innerHTML=tiempo;
		//document.getElementById("tiempo").innerHTML = "Tiempo: " +tiempo;
		if (tiempo==0){
			alert ("no hay mas tiempo");
			clearInterval (tiem);
			jugadas = jugadas+1;
			var animacion = document.getElementById('meter');
			animacion.addEventListener("animationstart", empezaranimacion, false);
			vecesjugadas();
			
		}
	},1000);
//},300);


//chequeo que el boton sea el correcto o no
$(".botoncito").click (function(){
	
	var esto = ($(this).html());
	respuestas[jugadas] = esto;
	respuestas.push (respuestas[jugadas]);
	if (esto==rta1[jugadas]){
		$( document ).ready(function() {
			var si = new Audio("correcto.mp3");
			si.play();
		});
		alert("Correcto");
		puntos=puntos+10;
		jugadas = jugadas+1;
		vecesjugadas();
		clearInterval(tiem);
	}
	else {
		alert("Respuesta Incorrecta");
		jugadas = jugadas+1;
		vecesjugadas();
		clearInterval(tiem);
	}
});

}
$(document).ready(function(){ 
	$('.btnn').click(function(){ // prepare button inserts the JSON string in the hidden element 
		/*preg.pop(); //borra el ultimo indice del array
			rta1.pop();
			rta2.pop();
			rta3.pop();
		rta4.pop();*/
		//alert("hola");
		/*var pruebaa = document.getElementById("preg").value; // para chequear que se pase bien el valor
		alert(pruebaa);*/
		//$('#id').val(JSON.stringify(/*variable*/));
	$('#idpreg').val(JSON.stringify(idpreg));
	//var pruebaa = document.getElementById("idpreg").value; // para chequear que se pase bien el valor
	//alert(pruebaa);
	$('#idexamen').val(JSON.stringify(idexamen));
	$('#puntos').val(JSON.stringify(puntos));
	$('#respuestaselegidas').val(JSON.stringify(respuestas));
	
});
});




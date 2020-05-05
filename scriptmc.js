

	
	/*var preg="Aca la pregunta?";
	
	var rta1="Respuesta Correcta";
	var rta2="Incorrecta 1";
	var rta3="Incorrecta 2";
	var rta4="Incorrecta 3";*/
	var rtas = [rta1, rta2, rta3, rta4];
	alert(JSON.stringify(rta1));
	var puntos = 0; 
	
	var jugadas = 0;
	
	vecesjugadas();
	//alert(prueba);
	//verifico cuantas veces jugó
	function vecesjugadas() {
		
		
		if (jugadas == 10){
			alert ("listo");
			$( document ).ready(function() {
				var snd = new Audio("waw.mp3");
				snd.play();
			});
			document.write("Obtuviste "+puntos+" puntos<br><br>");
			
			const button = document.createElement("button");
			button.type = 'button';
			button.className = 't';
			button.innerText = 'Menu';
			document.body.appendChild(button);
			$(".t").click (function(){
			location.href=".html"; //agregar ir al menu
			});
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
			mostrar_rtas += '<button type="button" class="botoncito" onclick="">'+rtas_ordenadas[i]+'</button><br>';
			
		}
		
		
		// envia los datos al html
		document.getElementById("pregunta").innerHTML= preg;
		document.getElementById("respuestas").innerHTML=mostrar_rtas;
		document.getElementById("punt").innerHTML= "Puntaje: "+puntos;
		document.getElementById("totaljugadas").innerHTML= jugadas+"/10";
	  
	  
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
			if (esto==rta1){
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
	

	
	
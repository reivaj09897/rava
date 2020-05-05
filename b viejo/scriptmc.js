
	 
	
	
	var preg="Aca la pregunta?";
	
	var rta1="1";
	var rta2="2";
	var rta3="3";
	var rta4="4";
	var rtas = [rta1, rta2, rta3, rta4];
	
	var puntos = 0; 
	
	var jugadas = 0;
	
	vecesjugadas();
	
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
			location.href="menu_principal.html"; //agregar ir al menu
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
			mostrar_rtas += '<input type="button" class="botoncito" onclick="" value='+rtas_ordenadas[i]+'><br>';
		}
		
		// envia los datos al html
		document.getElementById("pregunta").innerHTML= preg;
		document.getElementById("respuestas").innerHTML=mostrar_rtas;
		document.getElementById("punt").innerHTML= "Puntaje: "+puntos;
		document.getElementById("totaljugadas").innerHTML= jugadas+"/10";
	  
	  
		var tiem = setInterval(cuentaregresiva,1000);
		
	
		function cuentaregresiva() {
			tiempo--;
			document.getElementById("tiempo").innerHTML = "Tiempo: " +tiempo;
			if (tiempo==0){
				alert ("no hay mas tiempo");
				clearInterval (tiem);
				jugadas = jugadas+1;
				vecesjugadas();
			}
		
		}

	
		//chequeo que el boton sea el correcto o no
		$(".botoncito").click (function(){

			var esto = ($(this).val());
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
	

	
	
	

 
 
 
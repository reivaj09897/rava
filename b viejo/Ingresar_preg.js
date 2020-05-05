	

	//pide la cantidad de preguntas a ingresar
	var canttotal = prompt("Cantidad de preguntas que desea ingresar","10");
	document.getElementById("form2").style.display="none";
	
	
	var cantidad=0;
	var preg=[];
	var rta1=[];
	var rta2=[];
	var rta3=[];
	var rta4=[];

	//verifica si ya ingreso todas las preguntas o si falta ingresar vuelve a pedir la siguiente
	function cantidadpreg(){
		if (cantidad==canttotal){
			alert("Listo");
			document.getElementById("form1").style.display="none";
			document.getElementById("form2").style.display="block";
		}
		
		else {
			
			ingresardatos();
		
		}
		
	
	}
	
	//pide cada dato y lo guarda en el indice que indica cantidad
	function ingresardatos() {
		
		
        preg[cantidad] = document.getElementById("pregunta").value;
        preg.push (preg[cantidad]);
		
	
		rta1[cantidad] = document.getElementById("resp1").value;
        rta1.push (rta1[cantidad]);
		
		rta2[cantidad] = document.getElementById("resp2").value;
        rta2.push (rta2[cantidad]);
		
		rta3[cantidad] = document.getElementById("resp3").value;
        rta3.push (rta3[cantidad]);
		
		rta4[cantidad] = document.getElementById("resp4").value;
        rta4.push (rta4[cantidad]);
		
		cantidad=cantidad+1;
		
		document.getElementById("cantidad").innerHTML= "Preguntas ingresadas "+cantidad+"/"+canttotal;
		
		
    }
	
	function equivocado() {
	
		reemplazar();
		
	}
	
	//reemplaza en el array el indice al que volvio atras por la nueva pregunta y respuestas
	function reemplazar(){
	
		delete preg[cantidad];
		preg[cantidad] = document.getElementById("pregunta").value;
        preg.push (preg[cantidad]);
		
		delete rta1[cantidad];
		rta1[cantidad] = document.getElementById("resp1").value;
        rta1.push (rta1[cantidad]);
		
		delete rta2[cantidad];
		rta2[cantidad] = document.getElementById("resp2").value;
        rta2.push (rta2[cantidad]);
		
		delete rta3[cantidad];
		rta3[cantidad] = document.getElementById("resp3").value;
        rta3.push (rta3[cantidad]);
		
		delete rta4[cantidad];
		rta4[cantidad] = document.getElementById("resp4").value;
        rta4.push (rta4[cantidad]);

		document.getElementById("cantidad").innerHTML= "Preguntas ingresadas "+cantidad+"/"+canttotal;
	}
	
	//al presionar siguiente verifica que haya completado todos los campos, si es asi borra el valor de las cajas y pasa a pedir la siguiente pregunta
	function siguiente() {
		if(document.getElementById("pregunta").value == ""){
			alert("Debe ingresar la pregunta");
		}
		
		else if (document.getElementById("resp1").value == "") {
			
			alert("Ingrese la respuesta correcta");
		}
	
		else if (document.getElementById("resp2").value == "") {
			
			alert("Debe ingresar una segunda respuesta");
		}	
	
		else if (document.getElementById("resp3").value == "") {
			
			alert("Tiene que ingresar todas las respuestas");
		}	
		
		else if (document.getElementById("resp4").value == "") {
			
			alert("Debe ingresar todas las respuestas");
		}
		
		else {
			
		cantidadpreg();
		
		document.getElementById("pregunta").value="";
		document.getElementById("resp1").value="";
		document.getElementById("resp2").value="";
		document.getElementById("resp3").value="";
		document.getElementById("resp4").value="";
		}
	}
	
	//al presionar atras vuelve atras con lo ingresado anteriormente
	function atras() {
		
		document.getElementById("form1").style.display="block";
		document.getElementById("form2").style.display="none";
		
		cantidad=cantidad-1;
		
		document.getElementById("pregunta").value=preg[cantidad];
		document.getElementById("resp1").value=rta1[cantidad];
		document.getElementById("resp2").value=rta2[cantidad];
		document.getElementById("resp3").value=rta3[cantidad];
		document.getElementById("resp4").value=rta4[cantidad];
		
		reemplazar();
		
		//no permite volver atras si no se ha ingresado ninguna pregunta antes
		if (cantidad==-1){
			alert("No hay preguntas ingresadas anteriormente");
			cantidad=0;
			document.getElementById("cantidad").innerHTML= "Preguntas ingresadas "+cantidad+"/"+canttotal;
		}
	}
	
	
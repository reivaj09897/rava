
	//mandaleelbalor cuando inisia cecion el alumno va a esconde el boton
	document.getElementById("btnocultos").style.display="none";
	//document.getElementById("btn2").style.display="none";
	
	//si el profesor inicia sesion aparecen los botones de crear examen y ver resultados
	if (profesor !== "" ){
	document.getElementById("btnocultos").style.display="block";
	//document.getElementById("btn2").style.display="block";
	}
	
	
	//si alguien inicia sesion se oculta el boton iniciar sesion y aparece solo cerrar sesion
	document.getElementById("btn3").style.display="none";
	
	
	if (inicia !== "" ){
		document.getElementById("btn3").style.display="none";
		document.getElementById("btn4").style.display="block";
		//alert("inicia tiene valor");
	} else {
		document.getElementById("btn3").style.display="block";
		document.getElementById("btn4").style.display="none";
	}
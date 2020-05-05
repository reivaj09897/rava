<?php
	session_start();
/* 	if(empty($_SESSION['idprofesor'])){
		echo "No tienes permiso para crear examenes, en 5 segundos seras devuelto a la página inicial";
		sleep(3);
		header("location: menu_principal.php");
	}
 */
 	if(empty($_SESSION['idprofesor'])){
		alert("No tienes permiso para crear examenes, en 5 segundos seras devuelto a la página inicial");
		echo "";
		sleep(3);
		header("location: menu_principal.php");
	}
	
	function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
 ?> 
<!DOCTYPE html>
<head>
	<LINK REL=StyleSheet HREF="nuevo.css" TYPE="text/css" MEDIA=screen>
</head>

<body background= "img1.jpg" class="img" width="100%" height="100%">>
	
	<form id="form1">
		<div id="cantidad"></div>

		<p>Ingrese la pregunta <p> 				<input type="text" id="pregunta"required>
			<p>Ingrese la respuesta correcta <p> 	<input type="text" id="resp1" required >
				<p>Ingrese otra respuesta <p> 			<input type="text" id="resp2" required>
					<p>Ingrese la tercer respuesta <p> 		<input type="text" id="resp3" required >
						<p>Ingrese ultima respuesta <p> 		<input type="text" id="resp4" required >
							<br> <br>
							<input type="button" value="Siguiente" id="btn" onclick="siguiente()">
							<br> <br>
							<input type="button" value="Atras" id="btn" onclick="atras()">
							
							<input type="button" value="Menu" id="btn" onclick="menu_principal.php">
						</form>
						
						<form action="insertar_examen.php" method="post" id="form2" style="display:block">
							
							<p>Nombre del examen <p> 	<input type="text" name="nom_exam" required>
								<!--<p>Nombre profesor <p> 	<input type="text" name="nom_prof" required>-->
									<p>Materia <p> 	<input type="text" name="materia" required>
										<p>Curso <p> <input type="number" name="curso" max="6" required>
											
											<!-- Ingresar aquí los arrays para enviar a php -->
											<input type="hidden" id="preg" name="preg" value="" />
											<input type="hidden" id="rta1" name="rta1" value="" />
											<input type="hidden" id="rta2" name="rta2" value="" />
											<input type="hidden" id="rta3" name="rta3" value="" />
											<input type="hidden" id="rta4" name="rta4" value="" />
											
											<input type="submit" class="btn" name="submit" id="btn" value="Guardar">
											<br> <br>
											<input type="button" value="Modificar" id="btn" onclick="atras()">
											<br> <br>
											<input type="button" value="Menu" id="btn" onclick="">
										</form>
										<script type="text/javascript" src="jquery.js"> </script>
										<script src= "Ingresar_preg.js"> </script>
										</body>
									</html>
																		
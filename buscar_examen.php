<?php
	require_once ("conexion.php");
	//RECEPCIÓN BD CONFIG CONEXION
	$conexion="conexionxp"; //cambiar conexionfz/conexionxp al usar filezilla o xampp
	$recibir_array= detallesconexion($conexion);
	$servername = $recibir_array[0];
	$username=$recibir_array[1];
	$password=$recibir_array[2];
	$basedatos=$recibir_array[3];
	
?>
<!DOCTYPE html>
<head>
	<LINK REL=StyleSheet HREF="buscar.css" TYPE="text/css" MEDIA=screen>
</head>

<body background= "img1.jpg" class="img">
	<div id="busc">
		<form action="mc.php" method="post" id="form2">
		<p>Nombre de Examen: </p> <input class="formu" name="nomexamen" id="buscar" type="text" placeholder="" /> 
		<br>
		<p>ID de examen: </p> <input class="formu" name="idexamen" id="buscar" type="numeric" placeholder="" /> 
		<input id="btn" type="submit" onclick="e()" value="Buscar"/>
		</form>
	</div>
	
	<script> 
		
		
		function e(){
			var ab = document.getElementById("buscar").value;
			//alert (ab);
		}
		
	</script>
</body>
</html>
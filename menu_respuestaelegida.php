<?php
//	require_once ('conexion.php');
	session_start();
	
	//SE REALIZA EL CHEQUEO DE CUENTA DE PROFESOR
	if(empty($_SESSION['idprofesor'])){
		header("location: menu_principal.php");
	}
?>
<!DOCTYPE html>
<head>
	<LINK REL=StyleSheet HREF="buscar.css" TYPE="text/css" MEDIA=screen>
</head>

<body background= "img1.jpg" class="img">
	<div id="busc">
		<form action="select_respuestaelegida.php" method="post" id="form2">
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
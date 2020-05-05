<?php
	require_once ("conexion.php");
	header('Content-Type: text/html; charset=UTF-8'); 
	
	//RECEPCIÓN BD CONFIG CONEXION
	$conexion="conexionxp"; //cambiar conexionfz/conexionxp al usar filezilla o xampp
	$recibir_array= detallesconexion($conexion);
	$servername = $recibir_array[0];
	$username=$recibir_array[1];
	$password=$recibir_array[2];
	$basedatos=$recibir_array[3];
	
	//RECEPCIÓN DATOS INGRESADOS
	
	//$nombre = $_POST['nombre']; 
	//$contra = $_POST['contra']; 
	
	$sql= "INSERT INTO u_alumno (usuario, contraseña, num_favorito) VALUES ('".$_POST['nombre']."','".$_POST['contra']."','".$_POST['numfavorito']."');";
	$conn = new mysqli($servername, $username, $password, $basedatos);
	if ($conn->query($sql)) {
		echo "Sentencia SQL enviado correctamente <br>".$conn->error;
		header("location: menu_principal.php");
		//detallesconexion($GLOBALS['conexion']);
		} else {
		die ("Error con el insert: " . $conn->error);
	}
?>
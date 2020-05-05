<?php
	require_once ("conexion.php");
	header('Content-Type: text/html; charset=UTF-8'); 
	session_start();
	//RECEPCIÓN BD CONFIG CONEXION
	
	$conexion="conexionxp"; //cambiar conexionfz/conexionxp al usar filezilla o xampp
	$recibir_array= detallesconexion($conexion);
	$servername = $recibir_array[0];
	$username=$recibir_array[1];
	$password=$recibir_array[2];
	$basedatos=$recibir_array[3];
	
	//RECEPCIÓN DATOS INGRESADOS
	
	$nombre = $_POST['nombre']; 
	$contra = $_POST['contra']; 
	
	//Chequea si el usuario corresponde a una cuenta REGULAR
	$sqlestu= "SELECT id_alumno FROM `u_alumno` WHERE usuario = '".$_POST['nombre']."' AND contraseña = '".$_POST['contra']."';";
	$conn = new mysqli($servername, $username, $password, $basedatos);

	$resultestudiante = $conn->query($sqlestu);
	$idalumno = mysqli_fetch_array($resultestudiante,MYSQLI_ASSOC);
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$countestudiante = mysqli_num_rows($resultestudiante);
	
	if($countestudiante == 1) {
		
		$_SESSION['idalumno'] = $idalumno['id_alumno'];
		$_SESSION['login_user'] = $_POST['nombre'];
		
		header("location: menu_principal.php");
		} else {
		
		//Chequea si el usuario corresponde a una cuenta PROFESOR
		$sqlprof= "SELECT id_profesor FROM `u_profesor` WHERE nom_usuario = '".$_POST['nombre']."' AND contraseña = '".$_POST['contra']."';";
		$resultprofesor = $conn->query($sqlprof);
		$countprofesor = mysqli_num_rows($resultprofesor);
		if($countprofesor == 1) {
			$idprofesor = mysqli_fetch_array($resultprofesor,MYSQLI_ASSOC);
			$_SESSION['login_user'] = $nombre;
			$_SESSION['idprofesor'] = $idprofesor["id_profesor"];
			//var_dump($idprofesor);
			header("location: menu_principal.php");
			
			// echo $row["id_profesor"];
			} else {
			echo "El usuario o contraseña ingresadas son incorrectas";
		}
	}
?>
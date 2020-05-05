<?php
	session_start();
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
	
	$puntos= $_POST['puntos'];  //LLENAR ESTO
	$pregseleccionada= json_decode($_POST['respuestaseleg'], true);
	$idpreg = json_decode($_POST['idpreg'], true);
	$idexamen = json_decode($_POST['idexamen'], true);
	//echo $idexamen."<br>".$idpreg[1]." <br>".$pregseleccionada[2]." <br>".$puntos; 
	
	if(isset($_SESSION['idprofesor'])){
		$usuario= $_SESSION['idprofesor'];
		} elseif (isset($_SESSION['idalumno'])) {
		$usuario= $_SESSION['idalumno'];
		} else {
		die ("No hay usuario o profesor con la sesión iniciada");
	}
	
	
	
	$conn = new mysqli($servername, $username, $password, $basedatos);
	$sql = "INSERT INTO mc_puntuacion (id_alumno, id_examen, puntaje) VALUES ('".$usuario."','".$idexamen."','".$puntos."');";
	if ($conn->query($sql)) {
		echo "Se ingresó el puntaje obtenido en el examen correctamente <br>";
		//header("location: menu_principal.php");
		//detallesconexion($GLOBALS['conexion']);
		} else {
		die ("Error con el insert: " . $conn->error);
	}
	
	
	//SE REALIZA UN FOR CONTANDO CUANTAS PREGUNTAS RESPONDIDAS TIENE, como por ejemplo $contadorarray = count($preg); de insertar_examen.php
	
	$contadorarray = count($pregseleccionada);
	for ($cuenta = 0; $cuenta !== $contadorarray; $cuenta++){
		//echo "se ingreso al for <br>";
		$sql = "INSERT INTO mc_registro_respuesta (id_alumno, id_preg, rta_elegida) VALUES ('".$usuario."','".$idpreg[$cuenta]."','".$pregseleccionada[$cuenta]."');";
		if ($conn->query($sql)) {
			echo "Se creó las consignas correspondientes al examen correctamente <br>".$conn->error;
			header("location: menu_principal.php");
			//detallesconexion($GLOBALS['conexion']);
			} else {
			die ("Error con el insert: " . $conn->error);
		}
	}
?>
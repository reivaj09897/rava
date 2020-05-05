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
	if(isset($_POST['submit'])) 
	{ 
		echo "Se ingresó a cambiar los datos <br>";
		$preg= json_decode($_POST['preg'], true); 
		$rta1= json_decode($_POST['rta1'], true); 
		$rta2= json_decode($_POST['rta2'], true); 
		$rta3= json_decode($_POST['rta3'], true); 
		$rta4= json_decode($_POST['rta4'], true); 
		$materia = $_POST['materia'];
		$curso = $_POST['curso'];
		$examen = $_POST['nom_exam'];
		
		$materia = strtolower($materia);
		/*var_dump($preg);
			echo count($preg);
		var_dump($rta1);*/
		
		
		} else {
		echo "ERROR: No esta ingresando a recibir los datos";
	}
	
	//CODIGO SQL
	
	// HECHO: Hacer algoritmo para que si el nombre de la materia que se intenta ingresar no existe, crear uno nuevo
	
	
	$sql= "SELECT id_materia FROM mc_materia WHERE nom_materia = '".$materia."';";
	$conn = new mysqli($servername, $username, $password, $basedatos);
	$resultadosql = $conn->query($sql);
	$contadorsql = mysqli_num_rows($resultadosql);
	if($contadorsql == 0) {
		echo "No se encontró ninguna materia con el nombre ingresado, se creará una nueva <br>";
		$sql= "INSERT INTO mc_materia (nom_materia) VALUES ('".$materia."');";
		if ($conn->query($sql)) {
			echo "Sentencia SQL enviado correctamente <br>".$conn->error;
			$last_id_materia = mysqli_insert_id($conn);
			//header("location: menu_principal.php");
			//detallesconexion($GLOBALS['conexion']);
			} else {
			die ("Error con el insert: " . $conn->error);
		}
		} else {
		echo "Se encontró una materia con el nombre ingresado";
	}
	
	//Se crea el idexamen con sus datos correspondientes
	$idmateria = mysqli_fetch_array($resultadosql,MYSQLI_ASSOC);
	//var_dump($idmateria);
	if(isset($last_id_materia)) { 
		$sql= "INSERT INTO mc_examen (id_materia, id_profesor, nom_examen, curso) VALUES ('".$last_id_materia."','".$_SESSION['idprofesor']."','".$examen."','".$curso."');";
		} else {
		$sql= "INSERT INTO mc_examen (id_materia, id_profesor, nom_examen, curso) VALUES ('".$idmateria['id_materia']."','".$_SESSION['idprofesor']."','".$examen."','".$curso."');";
	}
	$conn = new mysqli($servername, $username, $password, $basedatos);
	if ($conn->query($sql)) {
		$last_id = mysqli_insert_id($conn); //Toma el ultimo ID creado por auto incrementable por la BD
		echo "Se creó el examen con sus datos correspondientes correctamente <br>".$conn->error;
		//header("location: menu_principal.php");
		//detallesconexion($GLOBALS['conexion']);
		} else {
		die ("Error con el insert: " . $conn->error);
	}
	//echo "salió del insertar examen <br>";
	$contadorarray = count($preg);
	//echo $contadorarray;
	for ($cuenta = 0; $cuenta !== $contadorarray; $cuenta++){
		echo "se ingreso al for <br>";
		$sql= "INSERT INTO mc_consigna (id_examen, consigna, rtaok, rta2, rta3, rta4) VALUES ('".$last_id."','".$preg[$cuenta]."','".$rta1[$cuenta]."','".$rta2[$cuenta]."','".$rta3[$cuenta]."','".$rta4[$cuenta]."');";
		$conn = new mysqli($servername, $username, $password, $basedatos);
		if ($conn->query($sql)) {
			echo "Se creó las consignas correspondientes al examen correctamente <br>".$conn->error;
			header("location: menu_principal.php");
			//detallesconexion($GLOBALS['conexion']);
			} else {
			die ("Error con el insert: " . $conn->error);
		}
	}
?>
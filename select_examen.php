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
	
	$idexamen = $_POST['idexamen'];
	$nomexamen = $_POST['nomexamen'];
	
	//Chequea si el usuario corresponde a una cuenta REGULAR
	
	if($_POST['idexamen'] == "" && $_POST['nomexamen'] !== "") {
		//echo "se busca por nombre";
		$sql= "SELECT id_examen FROM mc_examen WHERE nom_examen LIKE '%".$_POST['nomexamen']."%'";
		$conn = new mysqli($servername, $username, $password, $basedatos);
		$resultnomexamen = $conn->query($sql);
		//var_dump($resultnomexamen);
		$countnomexamen = mysqli_num_rows($resultnomexamen);
		//echo $countnomexamen;
		if(isset($_POST['idexamen'])) { 
			
			$sql= "SELECT id_preg, consigna, rtaok, rta2, rta3, rta4 FROM `mc_consigna` WHERE id_examen = '".$_POST['idexamen']."';";
			$conn = new mysqli($servername, $username, $password, $basedatos);
			$resultpreg = $conn->query($sql);
			$countpreg = mysqli_num_rows($resultpreg);
			
			if($countpreg > 0) {
				$contador=0;
				while($row= mysqli_fetch_array($resultpreg,MYSQLI_ASSOC)){
					var_dump($row);
					$consigna[$contador]=$row["consigna"];
					$rtaok[$contador]=$row["rtaok"];
					$rta2[$contador]=$row["rta2"];
					$rta3[$contador]=$row["rta3"];
					$rta4[$contador]=$row["rta4"];
					echo "<br>";
					$contador += 1;
				}
				/* $_SESSION['login_user'] = $_POST['nombre'];
					
					header("location: menu_principal.php");
					} else {
					
					//Chequea si el usuario corresponde a una cuenta PROFESOR
					$sqlprof= "SELECT id_profesor FROM `u_profesor` WHERE nom_usuario = '".$_POST['nombre']."' AND contraseña = '".$_POST['contra']."';";
					$resultprofesor = $conn->query($sqlprof);
					$countprofesor = mysqli_num_rows($resultprofesor);
					if($countprofesor == 1) {
					$idprofesor = mysqli_fetch_array($resultprofesor,MYSQLI_ASSOC);
					$_SESSION['login_user'] = $_POST['nombre'];
					$_SESSION['idprofesor'] = $idprofesor["id_profesor"];
					//var_dump($idprofesor);
					header("location: menu_principal.php");
					
					// echo $row["id_profesor"];
					} else {
					echo "El usuario o contraseña ingresadas son incorrectas";
					}
				} */
				} else {
				die("No se encontraron preguntas");
			}
		}
	}
?>
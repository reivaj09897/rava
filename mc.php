<?php
	session_start();
	require_once ("conexion.php");
	//RECEPCIÓN BD CONFIG CONEXION
	$conexion="conexionxp"; //cambiar conexionfz/conexionxp al usar filezilla o xampp
	$recibir_array= detallesconexion($conexion);
	$servername = $recibir_array[0];
	$username=$recibir_array[1];
	$password=$recibir_array[2];
	$basedatos=$recibir_array[3];
	
	echo $_SESSION['login_user']; //SOLO PA PROBA
	 if(!empty($_SESSION['idprofesor'])){
			die("Su examen existe, aun así, solo pueden jugar los alumnos");
	}
	//RECEPCIÓN DATOS INGRESADOS
	
	$idexamen = $_POST['idexamen'];
	$nomexamen = $_POST['nomexamen'];
	
	if($_POST['idexamen'] == "" && $_POST['nomexamen'] !== "") {
		//echo "se busca por nombre";
		$sql= "SELECT id_examen FROM mc_examen WHERE nom_examen LIKE '%".$_POST['nomexamen']."%'";
		$conn = new mysqli($servername, $username, $password, $basedatos);
		$resultnomexamen = $conn->query($sql);
		//var_dump($resultnomexamen);
		$countnomexamen = mysqli_num_rows($resultnomexamen);
		//echo $countnomexamen;
		//Chequea si el usuario corresponde a una cuenta REGULAR
	}
		if(isset($_POST['idexamen'])) { 
			
			$sql= "SELECT id_preg, consigna, rtaok, rta2, rta3, rta4 FROM `mc_consigna` WHERE id_examen = '".$_POST['idexamen']."';";
			$conn = new mysqli($servername, $username, $password, $basedatos);
			$resultpreg = $conn->query($sql);
			$countpreg = mysqli_num_rows($resultpreg);
			
			if($countpreg > 0) {
				$contador=0;
				while($row= mysqli_fetch_array($resultpreg,MYSQLI_ASSOC)){
					//var_dump($row);
					$idpreg[$contador]=$row["id_preg"];
					$consigna[$contador]=$row["consigna"];
					$rtaok[$contador]=$row["rtaok"];
					$rta2[$contador]=$row["rta2"];
					$rta3[$contador]=$row["rta3"];
					$rta4[$contador]=$row["rta4"];
					echo "<br>";
					$contador += 1;
				}
				} else {
				die("No se encontraron preguntas");
			}
		}
	
?>


<!DOCTYPE html>
<head>
	
</head>
<LINK REL=StyleSheet HREF="time.css" TYPE="text/css" MEDIA=screen>
<body background= "jugar.jpg" class="img">
	<div id="juego">
		<div id="botonmenu"></div>
		
		<div id="totaljugadas"></div>
	
	<br>
	
	<div class="meter" id="meter">
	<div class="bar" id="bar">
	<span></span>
	<div class="num" id="tiempo"></div>
	<div id="punt"></div>
	<div id="juego">
	
	
	<br><br>
	<div id="pregunta"></div>
	<br>
	<div id="respuestas"></div>
	
	<form action="ingresar_puntuacion.php" method="post" id="form2" >
	<input type="hidden" id="puntos" name="puntos" value="" />
	<input type="hidden" id="respuestaselegidas" name="respuestaseleg" value="" />
	<!-- <input type="hidden" id="" name="" value="" />-->
	<input type="hidden" id="idpreg" name="idpreg" />
	<input type="hidden" id="idexamen" name="idexamen" /> <!--CHEQUEAR SI FUNCIONA -->
	<input type="submit" class="btnn" name="submit" id="btndeform" value="Guardar">
	</form>
	</div>
	
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery.js"> </script> -->
	
	<script type="text/javascript" src="jquery.js"> </script> <!-- llama archivo jquery -->
	
	</body>
	<script>  
	var preg=<?php echo json_encode($consigna); ?>;
	
	var rta1=<?php echo json_encode($rtaok); ?>;
	var rta2=<?php echo json_encode($rta2); ?>;
	var rta3=<?php echo json_encode($rta3); ?>;
	var rta4=<?php echo json_encode($rta4); ?>;
	
	var idpreg=<?php echo json_encode($idpreg);?>;
	var idexamen=<?php echo json_encode($idexamen); ?>;
	</script>
	
	<script src="random2.js"></script> 
	
	
	</html>										
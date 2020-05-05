<?php
	require_once ('conexion.php');
	session_start();
	$conexion="conexionxp"; //cambiar conexionfz/conexionxp al usar filezilla o xampp
	$recibir_array= detallesconexion($conexion);
	$servername = $recibir_array[0];
	$username=$recibir_array[1];
	$password=$recibir_array[2];
	$basedatos=$recibir_array[3];
	$usuario="";
	//Chequea si el usuario ingresó con cuenta regular
	if(!empty($_SESSION['idalumno'])) { //NO LOGIN USER, SINO IDALUMNO
		$usuario = $_SESSION['login_user'];
		$idalumno = $_SESSION['idalumno'];
		
		//Chequea si el usuario NO ingreso con cuenta profesor
		if(!empty($_SESSION['login_user'])) {
			$usuario = $_SESSION['login_user']; 
			
			
		    // COMANDO PARA OCULTAR BOTONES DE PROFESOR ACAAAAAA
			
		}
		
	}
//	echo $_SESSION['login_user'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
		<title> </title>
	</head>
	<body>
		<LINK REL=StyleSheet HREF="principal.css" TYPE="text/css" MEDIA=screen>
		
		<h1 class="animated infinite pulse delay-2s"> Test Exam Game</h1>
		<br>
		<section>
			<div class="usuario" style="background-color:lightblue"> 
				<p><?php echo $usuario; ?></p>
				<input type="button" value="Iniciar sesion" id="btn3" class="sesionbtn" onclick="location.href=('menu_iniciarsesion.php')" />
				<input type="submit" value="Cerrar sesion" id="btn4" class="sesionbtn" onclick="location.href=('cerrar_sesion.php')" />																													
			</div>
			
			<div  class="enter" >
				<input type="button" value="Jugar" id="btn" class="botones" onclick="location.href=('buscar_examen.php')"/>
				<br> <br>
				<!--<input type="button" value="Elegir examen" id="btn"class="botones"  onclick="location.href=('menu_modos.html')"/>
				<br> <br>-->
				<input type="button" value="Ajustes" id="btn" class="botones" onclick= "location.href=('menu_ajustes.php')"/>
				<br> <br>
				<input type="button" value="Top 10" id="btn" class="botones" onclick="location.href=('select_top10.php')"/>
				<br> <br>

				<div id="btnocultos">
				<input type="button" value="Mis examenes" id="btn2" class="botones" onclick="location.href=('select_misexamenes.php')"/>
				<br> <br>
				<input type="button" value="Crear examen" id="btn1" class="botones" onclick="location.href=('menu_crearexamen.php')"/>
				<br> <br>
				<input type="button" value="Ver resultados" id="btn2" class="botones" onclick="location.href=('menu_resultadoexamen.php')"/>
				<br> <br>
				<input type="button" value="Respuestas alumnos" id="btn2" class="botones" onclick="location.href=('menu_respuestaelegida.php')"/>

				</div>
				<div>
		</section>
				<script> var inicia = "<?php 
					if(!empty($_SESSION['login_user'])) { 
						echo $_SESSION['login_user'];
						} else {
						echo "";
					}	
					?>" 
					var profesor = "<?php 
					if(!empty($_SESSION['idprofesor'])) { 
						echo $_SESSION['idprofesor'];
						} else {
						echo "";
						}
						?>"
					//alert(inicia);
					</script>
					<script type="text/javascript" src="jquery.js"> </script> 
					<script type="text/javascript" src="sonidos.js"> </script> 
					<script type="text/javascript" src="ocultarbotones.js"> </script> 
				</body>
				
				
				
</html>	

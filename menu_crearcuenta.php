<?php
	session_start();
	if (@$_SESSION['login_user'] != "") {
		header("location: menu_principal.php");
	}
?>
<!DOCTYPE html>
	<title>  </title>
	<head>
		<link  rel = " stylesheet "  href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
		<link rel ="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="nuevo.css">																													
		
		<style>
			textarea {resize: none};
			input type {size: 100}
		</style>
	</head>
	<body background= "img1.jpg" class="img" >
		
		<header>
			<LINK REL=StyleSheet HREF="nuevo.css" TYPE="text/css" MEDIA=screen>
		</header>
		<a href= "menu_iniciarsesion.php"> Volver a pagina anterior </a>
		<br> <br>
		<p> Crear cuenta <p>
			<div class="animated bounceInUp ">
				<br> <br>
				<div class="registro" >
					<p> Crear nueva cuenta <p>								  
						<section>
							
							<aside>
								<form action="insertar_usuario.php" method="post">
									Nombre:<input name="nombre" class="formu" type="text" placeholder="ej: Marcelo" required/>	
									<br> </br>
									Contraseña: <input name="contra" class="formu" type="password"  required/>
									<br> </br>
									Num Favorito:<input name="numfavorito" class="formu" type="text" required max="4"/>	
									<br> </br>
								</aside>
								<a href= "recuperarcuenta.html"> Recuperar cuenta </a>
								<br> </br>
								<div>
									<input id="btn"class="boton" type="submit" value="Crear"/> <!--id="btn" onclick="return mostrardatos();"-->
								</div>
								
							</form>
						</section>
						
						
					</body>
					</html>									
<?php
	session_start();
	if (@$_SESSION['login_user'] != "") {
		header("location: menu_principal.php");
		} else {
		
		}
?>
<!DOCTYPE html>
<title>  </title>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="nuevo.css">
	<style>
		textarea {resize: none};
		input type {size: 100}
	</style>
</head>

<header>
	
	<link  rel = " stylesheet "  href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel ="stylesheet" href="css/bootstrap.min.css">
	
</header>
<a href= "menu_principal.php"> volver a pagina principal </a>
<div class="animated bounceInUp ">
	<br> <br>
	<body background= "img1.jpg" class="img" >
		
		
			<section>
			
				<div class="registro" >
				<form action="select_usuario.php" method="post" >
					<aside>
						<h2> <p> Iniciar sesion <p> </h2>							
							Nombre: <input class="formu" name="nombre" type="text" placeholder="ej: Polimata" required/>	
							<br> </br>
							Contraseña: <input class="formu"name="contra" placeholder="*******" type="password"  required/>
							<br> </br>
							
							<a href="menu_crearcuenta.php"> No tengo cuenta </a>
							<br><br>
						</aside>
						
						
						<div>
							<!--<input class="boton" type="submit" value="ingresar"/> <!--onclick="return mostrardatos()"--> 
							<input id="btn" type="submit" onclick="return mostrardatos();" value="ingresar"/>
						</div>
						</div>
<br><br><br><br><br><br>			   
						<a href= "menu_principal.php"> volver a pagina principal </a>														 
						
						<br> <br>	  
						
						</section>
						
						
					</body>
				</html>
			</form> 																								
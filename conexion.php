<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	function detallesconexion($conexion) {
		
		switch ($conexion) {
			case "conexionxp":
	//		echo "<br> Conectado con XAMPP <br>";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$basedatos = "db_t23m05";
			conectar($servername, $username, $password, $basedatos); // como argumento puede ponerse cualquier valor, no es necesario que se llame la variable igual
			return array ($servername, $username, $password, $basedatos);
			break;
			case "conexionfz":
			echo "Conectado con FileZilla <br>";
			$servername = "localhost";
			$username = "dbu_t23m05";
			$password = "mks9s82s";
			$basedatos = "db_t23m05";
			conectar($servername, $username, $password, $basedatos);
			return array ($servername, $username, $password, $basedatos);
			break;
			default:
			echo "No has ingresado un tipo de conexión válida	";
		}
		
	}
	
	function conectar($servername, $username, $password, $basedatos) {
		
		// Intenta crear la conexión
		$conn = @new mysqli($servername, $username, $password, $basedatos); // se usa @ para evitar que muestre el error en pantalla
		
		// Chequea la conexión
		if ($conn->connect_error) {
			if (strpos($conn->connect_error, 'Unknown database') !== false) { //chequea si el error se debe a que no encuentra la DB
				echo "Se creará una base de datos <br>";
				creardb($servername, $username, $password, $basedatos);
				//creartablas($servername, $username, $password, $basedatos);
				
				$conn->close();
				} else {
				die("La conexion ha fallado: " . $conn->connect_error);
			}
			} else { //si no ha fallado entonces..
			//	$val = mysqli_query('select 1 from  LIMIT 1'); //chequear si existe, en caso de que no, crear la tabla
			//	if($val !== FALSE)
			
	//		echo "Conectado con éxito <br>";
			
			if (!$conn->set_charset("utf8")) {
				printf("Error loading character set utf8: %s\n", $conn->error);
				exit();
				} else {
				//printf("Current character set: %s\n", $conn->character_set_name());
			}
			if ( TRUE !== $conn->query( 'SET collation_connection = "utf8_general_ci";' ) )
		throw new \Exception( $conn->error, $conn->errno );
		
		//seleccionrta($servername, $username, $password, $basedatos, $conn);
		
		}
		}
		
		function creardb($servername, $username, $password, $basedatos) {
		
		$sql="CREATE DATABASE IF NOT EXISTS db_t23m05";
		$conn = new mysqli($servername, $username, $password);
		
		if ($conn->query($sql) === TRUE) {
		echo "Database created successfully <br>";
		creartablas($servername, $username, $password, $basedatos);
		//detallesconexion($GLOBALS['conexion']);
		} else {
		die ("Error creating database: " . $conn->error);
		}
		}
		
		function creartablas($servername, $username, $password, $basedatos) {
		
		$sql= file_get_contents ('db_t23m05.sql');
		$conn = new mysqli($servername, $username, $password, $basedatos);
		if ($conn->multi_query($sql)) {
		echo "Created tables successfully <br>";
		detallesconexion($GLOBALS['conexion']);
		} else {
		die ("Error creating tables: " . $conn->error);
		}
		}
		
		function prepared_query($mysqli, $sql, $params, $types = "")
		{
		$types = $types ?: str_repeat("s", count($params));
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param($types, ...$params);
		$stmt->execute();
		return $stmt;
		}
		
		?>		
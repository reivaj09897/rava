
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
	
	//echo $_SESSION['login_user']; //SOLO PA PROBA
	
	//RECEPCIÓN DATOS INGRESADOS
	
	//$idexamen = $_POST['idexamen'];
	//echo $idexamen;
	//$nomexamen = $_POST['nomexamen'];
	
	/*if($_POST['idexamen'] == "" && $_POST['nomexamen'] !== "") {
		//echo "se busca por nombre";
		$sql= "SELECT id_examen FROM mc_examen WHERE nom_examen LIKE '%".$_POST['nomexamen']."%'";
		$conn = new mysqli($servername, $username, $password, $basedatos);
		$resultnomexamen = $conn->query($sql);
		//var_dump($resultnomexamen);
		$countnomexamen = mysqli_num_rows($resultnomexamen);
		//echo $countnomexamen;
		if($countnomexamen > 0) {
			//echo $resultnomexamen;
			$row = mysqli_fetch_array($resultnomexamen,MYSQLI_ASSOC);
			//var_dump($row);
			$_POST['idexamen']=$row['id_examen'];
		}
	}*/
	
	//if($_POST['idexamen'] !== "") { 
		
		$sql= "SELECT id_examen, nom_examen FROM mc_examen WHERE id_profesor = '".$_SESSION['idprofesor']."'";
		
		
		$conn = new mysqli($servername, $username, $password, $basedatos);
		$resultexam = $conn->query($sql);
		$countpuntaje = mysqli_num_rows($resultexam);
		
		if($countpuntaje > 0) {
		?>
		<html>
			<body background= "img1.jpg" class="img">
				<table class="blueTable">
					<thead>
						<tr>
							<td>ID de Examen</td>
							<td>Nombre de examen</td>
						</tr>
					</thead>
					<?php
						while($row = mysqli_fetch_array($resultexam,MYSQLI_ASSOC)) {
						//var_dump($row);
						?>
						<tr>
							<td><?php echo $row['id_examen']?></td>
							<td><?php echo $row['nom_examen']?></td>
						</tr>
						
						<?php
			//var_dump($row);
		}
		} else {
		die("No se han encontrado examenes creados por usted");
	}
	/*} else {
	die("No se encontró un examen con este nombre");		*/
//}
?>
</tbody>
</table>
</body>

<style type="text/css">table.blueTable {
	border: 1px solid #1C6EA4;
	background-color: #EEEEEE;
width: 100%;
text-align: left;
border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
border: 4px solid #AAAAAA;
padding: 3px 2px;
}
table.blueTable tbody td {
font-size: 13px;
}
table.blueTable tr:nth-child(even) {
background: #D0E4F5;
}
table.blueTable thead {
background: #1C6EA4;
background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
border-bottom: 2px solid #444444;
}
table.blueTable thead th {
font-size: 15px;
font-weight: bold;
color: #FFFFFF;
border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
border-left: none;
}

table.blueTable tfoot {
font-size: 14px;
font-weight: bold;
color: #FFFFFF;
background: #D0E4F5;
background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
border-top: 2px solid #444444;
}
table.blueTable tfoot td {
font-size: 14px;
}
table.blueTable tfoot .links {
text-align: right;
}
table.blueTable tfoot .links a{
display: inline-block;
background: #1C6EA4;
color: #FFFFFF;
padding: 2px 8px;
border-radius: 5px;
}
</style>
</html>



<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION["idprofesor"]);
unset($_SESSION['idalumno']);
header("Location:menu_principal.php");
?>
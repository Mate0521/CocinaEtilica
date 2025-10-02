<?php
session_start();
require_once ("logica/Persona.php");
require_once ("logica/Admin.php");
require_once ("logica/Cliente.php");
if (isset($_GET["salir"])) {
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cocina Etilica</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php 
if(!isset($_GET["pid"])){
    include ("presentacion/inicio.php");    
}else{
    $pid = $_GET["pid"];
    include ("presentacion/" . $pid . ".php");
}
?>


</html>

<?php 
require_once (__DIR__ ."\..\logica\Cliente.php");

$id = $_POST['id'];
$estado = $_POST['estado'];
$cliente = new Cliente($id, "", "", "", "", "", $estado);
$cliente -> cambiarEstado();
echo $cliente->getEstado();
?>
<?php
session_start();
require_once ("logica/Persona.php");
require_once ("logica/Admin.php");
require_once ("logica/Cliente.php");
require_once ("logica/Producto.php");
require_once ("logica/Proveedor.php");
require_once ("logica/TipoProducto.php");
require_once ("persistencia/Conexion.php");
require_once ("persistencia/ProductoDAO.php");
require_once("persistencia/ProveedorDAO.php");
require_once ('persistencia/TipoProductoDAO.php');

$pages = [
    "Login"=> "presentacion/autenticar.php",
    "Regcliente"=> "presentacion/cliente/registrarCliente.php",
    "Inicio"=> "presentacion/inicio.php",
    "Error"=> "presentacion/noAutorizado.php",
    "sesAdmin"=> "presentacion/sesionAdmin.php",
    "sesCliente"=> "presentacion/sesionCliente.php",
    "crearProducto"=>"presentacion/producto/crearProducto.php",
    "consultarProducto"=>"presentacion/producto/consultarProducto.php",
    "actualizarProducto"=>"presentacion/producto/actualizarProducto.php",
    "buscarProducto"=>"presentacion/producto/buscarProducto.php",
    "consultarCliente"=>"presentacion/cliente/consultarCliente.php"

];

if (isset($_GET["salir"])) {
    session_unset();
    session_destroy();
}

$vistasPublicas = ["Login", "Regcliente", "Error", "Inicio"];
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    // Si no hay sesión y la vista no es pública, redirigir a Error
    $page = base64_decode($_GET["pid"]);
    if (!in_array($page, $vistasPublicas)) {
        $page = "Error";
    }
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
<link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>

<body>
    <header class="fixed-top">
        <?php include "componentes/menu.php" ?>

    </header>
    <div class="mt-4">
        <?php 
            // Si no hay página especificada, mostrar inicio
            if (!isset($_GET["pid"])) {
                include("presentacion/inicio.php");
            } else {
                $page = base64_decode($_GET["pid"]);
                var_dump($page);

                // ---- Validar que la ruta exista en el arreglo $pages ----
                if (array_key_exists($page, $pages)) {
                    include $pages[$page];
                } else {
                    include($pages["Error"]);
                }
            }
        ?> 
    </div>
</body>

</html>

<?php

session_start();

require_once(__DIR__."\logica\Admin.php");
require_once(__DIR__."\logica\Cliente.php");


if(isset($_POST["cerrarSecion"]))
{
    session_destroy();
    header('Location: index.php');
    exit();
}elseif(isset($_POST["iniciarSecion"]))
{
    $_SESSION["pid"]="login";

}elseif(isset($_POST["newCliente"]))
{
    $_SESSION["pid"]="regCliente";

}




$pages=[
    "home"=>"views/home.php",
    "consultarCliente"=> "views/consultarCliente.php",
    "login"=> "views/autenticar.php",
    "regCliente"=> "views/registrarCliente.php",
    "admin"=> "views/sesionAdmin.php"

];

if (!isset($_SESSION["pid"])) {
    $_SESSION["pid"] = "home";
}



$cliente= new Cliente();
$admin=new Admin();


if(isset($_SESSION["id"]))
{
    if($_SESSION["role"]== "A"){
        $admin->setId($_SESSION["id"]);
        $admin ->obtenerAdmin();
        $_SESSION["nombre"]=$admin->getNombre();
        $_SESSION["apellido"]=$admin->getApellido();
        $_SESSION["email"]=$admin->getCorreo();

        echo "aqui".$admin->getNombre().$admin->getApellido().$admin->getCorreo();

    }else{
        $cliente->setId($_SESSION["id"]);;
        $cliente->obtenerCliente();
        $_SESSION["nombre"]=$cliente->getNombre();
        $_SESSION["apellido"]=$cliente->getApellido();
        $_SESSION["email"]=$cliente->getCorreo();
        $_SESSION["fechaNac"]=$cliente->getFechaNacimiento();
        echo "aqui". $cliente->getNombre().$cliente->getApellido().$cliente->getCorreo().$cliente->getFechaNacimiento().$_SESSION["id"];

    }
}
 
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cocina Etilica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div>
        <?php
            include ("componentes/menu.php");
        ?>
    </div>
    <div>
        
        <?php

        include ($pages[$_SESSION["pid"]]);

        var_dump($_SESSION);

        ?>
        <form action="index.php" method="post">
            <button type="submit" class="btn btn-danger" name="cerrarSecion">Cerrar secion</button>
        </form>

    </div>
     <div>
        <?php
        include ("componentes/footer.php");
        ?>
     </div>

</body>


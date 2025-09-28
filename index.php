<?php
session_start();

$pages=[
    "home"=>"views/home.php",
    "consultarCliente"=> "views/consultarCliente.php",
    "login"=> "views/autenticar.php",
    "regCliente"=> "views/registrarCliente.php",
    "admin"=> "views/sesionAdmin.php"

];

$page="home";


$cliente= new Cliente();
$admin=new Admin();
if(isset($_SESSION["id"])){
    if($_SESSION["rol"]== "A"){
        $admin ->obtenerAdmin();
    }else{
        $cliente->consultar();
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
            $_SESSION["rol"]=="A"?$page="admin":$page= "home";
            include ($pages[$page]);
        ?>
    </div>
     <div>
        <?php
        include ("componentes/footer.php");
        ?>
     </div>

</body>


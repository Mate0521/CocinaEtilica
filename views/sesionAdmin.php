<?php
$id= $_SESSION["id"];
$nombre=$_SESSION["nombre"];
$apellidos=$_SESSION["apellido"];
$email=$_SESSION["email"];
?>
<div class="container">
    <div class="card" >
        <div class="card-body">

            <h5 class="card-title">Administrador: <?php echo $nombre ." ". $apellidos ;?></h5>
            <p class="card-text"><strong>Correo:</strong> <?php echo $email ;?> </p>
            
        </div>
    </div>
</div>


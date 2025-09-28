<?php

?>


<header class="text-center p-3 sticky-top mb-4">

    <?php 
    if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "A"){
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" width="40" height="40" class="me-2">
            Cocina Etilica
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gestion de Inventario</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo $admin->getNombre() ." ". $admin->getApellido();
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Datos Personales</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <form action="index.php" method="post">
                                <button type="submit" class="btn btn-danger" name="cerrarSecion">Cerrar secion</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            </div>
        </div>
    </nav>

    <?php }elseif($_SESSION["role"] == "U"){?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" width="40" height="40" class="me-2">
            Cocina Etilica
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Envios</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Car Shop</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo $cliente->getNombre() ." ". $cliente->getApellido();
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Datos Personales</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <form action="index.php" method="post">
                                <button type="submit" class="btn btn-danger" name="cerrarSecion">Cerrar secion</button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            </div>
        </div>
    </nav>

    <?php } }else{ ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.png" alt="Logo" width="40" height="40" class="me-2">
            Cocina Etilica
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
            <a href="views/autenticar.php" class="btn btn-outline-secondary ms-3">
                <i class="fa-solid fa-user me-1"></i> Iniciar Sesión
            </a>
            </div>
        </div>
    </nav>

    <?php } ?>

</header>


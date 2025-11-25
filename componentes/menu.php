<?php
if(isset($_SESSION["rol"])){
    $id = $_SESSION["id"];
    if($_SESSION["rol"]=="A"){
        $admin = new Admin($id);
        $admin->consultarPorId();
?>
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow">
	<div class="container-fluid">
		<!-- Logo -->
		<a class="navbar-brand fw-bold d-flex align-items-center" href="#"> <img
			src="img/logo.jpg" alt="Logo" width="40" height="40"
			class="me-2 rounded-circle"> Cocina Etílica
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
			data-bs-target="#menu">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link active text" href="?pid=<?php echo base64_encode("sesionAdmin") ?>">Inicio</a></li>
				<li class="nav-item"><a class="nav-link active text" href="#">Servicio
						para admin</a></li>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false"> Prodcuto </a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("crearProducto") ?>">Crear
								Producto</a></li>
						<li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("consultarProducto") ?>">Consultar
								Productos</a></li>
                        <li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("actualizarProducto") ?>">Actualizar Producto
								Productos</a></li>
                        <li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("buscarProducto") ?>">Buscar Producto
								Productos</a></li>
                        <li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("reporteProducto") ?>">Reporte Producto
                        </a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul></li>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false"> Cliente </a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item"
							href="?pid=<?php echo base64_encode("consultarCliente") ?>">Consultar
								Cliente</a></li>
					</ul></li>
			</ul>
			<!-- Dropdown con nombre y apellido -->
			<ul class="navbar-nav ms-auto">
				<li class="nav-item dropdown"><a
					class="nav-link dropdown-toggle d-flex align-items-center" href="#"
					role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i
						class="fa-solid fa-user-circle me-2"></i>Administrador: 
            <?php echo $admin -> getNombre() . " " . $admin -> getApellido() ?>
          </a>
					<ul class="dropdown-menu dropdown-menu-end shadow">
						<li><a class="dropdown-item" href="editarPerfil.php"><i
								class="fa-solid fa-user-pen me-2"></i> Editar Perfil</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="?salir=true"> <i
								class="fa-solid fa-right-from-bracket me-2"></i> Salir
						</a></li>
					</ul></li>
			</ul>
		</div>
	</div>
</nav>
<?php
    }elseif($_SESSION["rol"]=="C"){//caso de usuario
        $cliente = new Cliente($id);
        $cliente ->consultarPorId();
?>
<nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#"> <img
            src="img/logo.jpg" alt="Logo" width="40" height="40"
            class="me-2 rounded-circle"> Cocina Etílica
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active text" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active text" href="#">Servicio para cliente</a></li>
            </ul>

            <!-- Dropdown con nombre y apellido -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown"><a
                    class="nav-link dropdown-toggle d-flex align-items-center"
                    href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"> <i class="fa-solid fa-user-circle me-2"></i>Cliente: 
        <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?>
        </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="editarPerfil.php"><i
                                class="fa-solid fa-user-pen me-2"></i> Editar Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger"
                            href="?salir=true"> <i
                                class="fa-solid fa-right-from-bracket me-2"></i> Salir
                        </a></li>
                    </ul></li>
            </ul>
        </div>
    </div>
</nav>

<?php
    }
}else{//caso de no haber iniciado secion 
?>
<!-- NAVBAR -->
<nav
    class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#"> <img
            src="img/logo.jpg" alt="Logo" width="40" height="40" class="me-2">
            Cocina Etilica
        </a>
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="?pid=<?php echo base64_encode("sesAdmin") ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
            <a href="?pid=<?php echo base64_encode("Login") ?>" class="btn btn-outline-secondary ms-3"> <i
                class="fa-solid fa-user me-1"></i> Iniciar Sesión
            </a>
        </div>
    </div>
</nav>

<?php
}
?>
<?php 
$id = $_SESSION["id"];
if ($_SESSION["rol"] != "admin") {
    header('Location: ?pid=' . base64_encode("noAutorizado.php"));
}
$admin = new Admin($id);
$admin->consultarPorId();
?>
<body>
<?php include 'presentacion/menuAdministrador.php'; ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">
						<h3>Crear Producto</h3>
					</div>
					<div class="card-body">
						<?php 
						if(isset($_POST["registrar"])){
						    echo "<div class='alert alert-success' role='alert'>
                                    Cliente almacenado
                                    </div>";
						}
						?>
						<form method="post" action="registrarCliente.php">
							<div class="mb-3">
								<input type="text" class="form-control" name="nombre"
									placeholder="Nombre" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="apellido"
									placeholder="Apellido" required>
							</div>
							<div class="mb-3">
								<input type="date" class="form-control" name="fechaNacimiento"
									placeholder="Fecha de Nacimiento" required>
							</div>
							<div class="mb-3">
								<input type="email" class="form-control" name="correo"
									placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave"
									placeholder="Clave" required>
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>	
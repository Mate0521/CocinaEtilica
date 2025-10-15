<?php 
require_once (__DIR__ . "\..\logica\Producto.php");

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $tamaño = $_POST["tamaño"];
    $precioVenta = $_POST["precioVenta"];
    $imagen = $_POST["imagen"];
    $id_provedor = $_POST["id_provedor"];
    $id_tipo_producto = $_POST["id_tipo_producto"];

    $producto = new Producto("", $nombre, $tamaño, $precioVenta, $imagen, $id_provedor, $id_tipo_producto);
    $var = $producto->crear();
}
?>

<div>
	<div class="container">
		<div class="row mt-5">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h3>Registrar Producto</h3>
					</div>
					<div class="card-body">
						<?php 	
						if (isset($_POST["registrar"])) {
							if ($var instanceof Exception) {
								echo "<div class='alert alert-danger' role='alert'>
									Error al registrar: " . $var->getMessage() . "
								</div>";
							} elseif ($var === true || $var == 1) {
								echo "<div class='alert alert-success' role='alert'>
									Producto registrado correctamente.
								</div>
								<script>
									setTimeout(function() {
										window.location.href = 'consultarProducto.php';
									}, 2000);
								</script>";
							} else {
								echo "<div class='alert alert-warning' role='alert'>
									Ocurrió un problema: $var
								</div>";
							}
						}
						?>
	
						<form method="post" action="" name="registrar">
							<div class="mb-3">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="tamaño" placeholder="Tamaño" required>
							</div>
							<div class="mb-3">
								<input type="number" step="0.01" class="form-control" name="precioVenta" placeholder="Precio de venta" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="imagen" placeholder="Ruta o nombre de imagen" required>
							</div>
							<div class="mb-3">
								<input type="number" class="form-control" name="id_provedor" placeholder="ID del proveedor" required>
							</div>
							<div class="mb-3">
								<input type="number" class="form-control" name="id_tipo_producto" placeholder="ID del tipo de producto" required>
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
</div>

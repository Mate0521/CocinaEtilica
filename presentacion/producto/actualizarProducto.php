<?php
// Solo el administrador puede acceder
if ($_SESSION["rol"] != "A") {
    header('Location: ?pid=' . base64_encode("Error"));
    exit();
}

$id = $_SESSION["id"];
$admin = new Admin($id);
$admin->consultarPorId();

// Si se envió actualización
if (isset($_POST["actualizar"])) {
    $idProducto = $_POST["id_producto"];
    $nombre = trim($_POST["nombre"]);
    $tamano = $_POST["tamano"];
    $precio = $_POST["precio"];
    $tipoProducto = $_POST["tipoProducto"];
    $proveedor = $_POST["proveedor"];
    $imagenVieja = $_POST["imagenActual"];

    // Comprobar si se subió una nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        // Ruta de la imagen anterior
        $rutaVieja = "imagenes/" . $imagenVieja;
        if (file_exists($rutaVieja)) {
            unlink($rutaVieja); // elimina la vieja imagen
        }

        // Generar nombre nuevo
        $nombreNuevo = time() . "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $rutaTemporal = $_FILES["imagen"]["tmp_name"];
        move_uploaded_file($rutaTemporal, "imagenes/" . $nombreNuevo);
        $imagenFinal = $nombreNuevo;
    } else {
        $imagenFinal = $imagenVieja;
    }

    // Actualizar producto
    $producto = new Producto($idProducto, $nombre, $tamano, $precio, $imagenFinal, $proveedor, $tipoProducto);
    $producto->actualizar();

    echo "<div class='alert alert-success text-center mt-3'>Producto actualizado correctamente.</div>";
}

// Consultar todos los productos
$producto = new Producto();
$productos = $producto->consultar();

$tipo = new TipoProducto();
$tipos = $tipo->consultar();

$proveedor = new Proveedor();
$proveedores = $proveedor->consultar();
?>

<?php include 'presentacion/menuAdministrador.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Actualizar Productos</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tamaño (ml)</th>
                    <th>Precio</th>
                    <th>Tipo Producto</th>
                    <th>Proveedor</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <form method="post" enctype="multipart/form-data" action="?pid=<?php echo base64_encode('actualizarProducto'); ?>">
                        <td><?= htmlspecialchars($p->getId()) ?></td>

                        <td>
                            <img src="imagenes/<?= $p->getImagen() ?>" width="60" height="60" class="rounded mb-2" onerror="this.src='imagenes/default.png'">
                            <input type="file" name="imagen" class="form-control form-control-sm">
                            <input type="hidden" name="imagenActual" value="<?= $p->getImagen() ?>">
                        </td>

                        <td><input type="text" name="nombre" value="<?= $p->getNombre() ?>" class="form-control" required></td>
                        <td><input type="number" name="tamano" value="<?= $p->getTamano() ?>" class="form-control" required></td>
                        <td><input type="number" name="precio" value="<?= $p->getPrecio() ?>" class="form-control" required></td>

                        <td>
                            <select name="tipoProducto" class="form-select">
                                <?php foreach ($tipos as $t): ?>
                                    <option value="<?= $t->getId() ?>" <?= $t->getId() == $p->getTipoProducto() ? 'selected' : '' ?>>
                                        <?= $t->getNombre() ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td>
                            <select name="proveedor" class="form-select">
                                <?php foreach ($proveedores as $prov): ?>
                                    <option value="<?= $prov->getId() ?>" <?= $prov->getId() == $p->getProveedor() ? 'selected' : '' ?>>
                                        <?= $prov->getNombre() ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td>
                            <input type="hidden" name="id_producto" value="<?= $p->getId() ?>">
                            <button type="submit" name="actualizar" class="btn btn-success btn-sm"> <i class="bi bi-floppy2"></i> Guardar</button>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$cliente = new Cliente();
$clientes = $cliente -> consultar();

$id = $_SESSION["id"];
if ($_SESSION["rol"] != "A") {
    header('Location: ?pid=' . base64_encode("Error"));
}
$admin = new Admin($id);
$admin->consultarPorId();
?>
<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Consultar Productos</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (count($clientes) == 0) {
                            echo "<div class='alert alert-warning' role='alert'>
                                    No hay registros
                                    </div>";
                        } else {
                        ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Fecha de Nacimiento</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($clientes as $c) {
                                echo "<tr>";
                                echo "<td>" . $c -> getNombre() . "</td>";
                                echo "<td>" . $c -> getApellido() . "</td>";
                                echo "<td>" . $c -> getFechaNacimiento() . "</td>";
                                echo "<td>" . $c -> getCorreo() . "</td>";
                            ?>
                            <td>
                                <div id="estado_<?php echo $c->getId() ?>" data-id="<?php echo $c->getId() ?>" class="estado-toggle">
                                    <?php if ($c->getEstado() == 1): ?>
                                        <span><i class="bi bi-check-circle text-success"></i> Activo</span>
                                    <?php else: ?>
                                        <span><i class="bi bi-x-circle text-danger"></i> Inactivo</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <?php

                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$(document).on("click", '[id^="estado_"]', function() {
    let id = $(this).data("id");
    let div = $(this);

    $.ajax({
        url: "ajax/cambiarEstado.php",
        type: "POST",
        data: { 
            id: id,
            estado: <?php echo $c->getEstado(); ?>
         },
        success: function(nuevoEstado) {
            if (nuevoEstado == 1) {
                div.html("<span><i class='bi bi-check-circle text-success'></i> Activo</span>");
            } else {
                div.html("<span><i class='bi bi-x-circle text-danger'></i> Inactivo</span>");
            }
        },
        error: function() {
            alert("Error al cambiar el estado");
        }
    });
});

</script>

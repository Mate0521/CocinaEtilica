<?php
require_once ("logica/Persona.php");
require_once ("logica/Cliente.php");
$cliente = new Cliente();
$clientes = $cliente->consultar();
?>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h3>Consultar Cliente</h3>
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
								</tr>
							</thead>
							<tbody>
							<?php
                            foreach ($clientes as $c) {
                                echo "<tr>";
                                echo "<td>" . $c -> getNombre() . "</td>";
                                echo "<td>" . $c -> getApellido() . "</td>";
                                echo "<td>" . $c -> getfechaNacimiento() . "</td>";
                                echo "<td>" . $c -> getCorreo() . "</td>";
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

</body>
</html>
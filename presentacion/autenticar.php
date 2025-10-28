<?php 
$error = false;
if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $admin = new Admin("", "", "", $correo, $clave);
    if($admin -> autenticar()){
        $_SESSION["id"] = $admin -> getId();
        $_SESSION["rol"] = "A";
        header('Location: ?pid=' . base64_encode("sesAdmin"));
    }else{
        $cliente = new Cliente("", "", "", $correo, $clave);
        if($cliente -> autenticar()){
            $_SESSION["id"] = $cliente -> getId();
            $_SESSION["rol"] = "C";
            header('Location: ?pid=' . base64_encode("sesCliente"));
        }else{
            $error = true;
        }
    }
}
?>
<div>
	<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">
						<h3>Autenticar</h3>
					</div>
					<div class="card-body">
						<?php
                        if ($error) {
                            echo "<div class='alert alert-danger' role='alert'>
                                    Correo o clave incorrectos
                                    </div>";
                        }
                        ?>
						<form method="post" action="?pid=<?php echo base64_encode("Login")?>">
							<div class="mb-3">
								<input type="email" class="form-control" name="correo"
									placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave"
									placeholder="Clave" required>
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary" name="autenticar">Autenticar</button>
								<a href="?pid=<?php echo base64_encode("Regcliente") ?>">Registrar</a>
							</div>
						</form>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

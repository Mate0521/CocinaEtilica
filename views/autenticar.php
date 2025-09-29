<?php 
session_start();
require_once (__DIR__."\..\logica\Persona.php");
require_once (__DIR__."\..\logica\Admin.php");
require_once (__DIR__."\..\logica\Cliente.php");

if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $admin = new Admin("", "", "", $correo, $clave);
	$cliente= new Cliente("", "", "", $correo, $clave, "");
    if($admin -> autenticar())
	{
        $_SESSION["id"] = $admin -> getId();
		$_SESSION["role"] = "A";
        header('Location: ../index.php');
    }elseif($cliente -> autenticar())
	{
		$_SESSION["id"] = $cliente -> getId();
		$_SESSION["role"] = "U";
		header('Location: ../index.php');
	}else
	{
		$_SESSION["id"] = null;
		$_SESSION["role"] = null;
		$error = true;
	}
	
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cocina Etilica</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<?php if (isset($error) && $error): ?>
						<div class="alert alert-danger mt-3" role="alert" id="alertContainer">
							<p id="alert">Error en el inicio de sesión. Verifique credenciales</p>
						</div>
					<?php endif; ?>
					<div class="card-header">
						<h3>Autenticar</h3>
					</div>
					<div class="card-body">
						<form method="post" action="autenticar.php">
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
							</div>
							<div class="mb-3">
								<a href="registrarCliente.php" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
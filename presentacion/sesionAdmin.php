<?php
$id = $_SESSION["id"];
if ($_SESSION["rol"] != "A") {
    header('Location: ?pid=' . base64_encode("Error"));
}
$admin = new Admin($id);
$admin->consultarPorId();
?>
<div>
<?php include 'presentacion/menuAdministrador.php'; ?>
</div>
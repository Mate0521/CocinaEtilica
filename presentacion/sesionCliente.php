<?php
$id = $_SESSION["id"];
if($_SESSION["rol"] != "C"){
    header('Location: ?pid=' . base64_encode("Error"));
}
$cliente = new Cliente($id);
$cliente ->consultarPorId();
?>
<div>


</div>
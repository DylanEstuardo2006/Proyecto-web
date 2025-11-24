<?php
require_once "../../conexion.php";

if($_SERVER )
if (!isset($_GET['id']))
{
    die("Error: No se recibió el ID del dispositivo.");
}

$id = intval($_GET['id']);


$consulta = $conn->query("SELECT * FROM usuarios WHERE idUsuario = $id");

if ($consulta->num_rows == 0) {
    die("Error: El dispositivo no existe.");
}


$conn->query("DELETE FROM usuarios WHERE idUsuario = $id");


header("Location: registros.php");
exit();
?>
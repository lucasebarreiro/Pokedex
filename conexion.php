<?php
$config = parse_ini_file("config.ini");

$servername = $config["servername"];
$usuario = $config["usuario"];
$contraseña = $config[""];
$database = $config["database"];

// Crear una conexión
$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

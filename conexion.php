<?php
// SIN IMPLEMENTAR EN NINGUN LADO , VA A HABER QUE USAR CLASES PERO EVITEMOS
// SIN IMPLEMENTAR EN NINGUN LADO , VA A HABER QUE USAR CLASES PERO EVITEMOS
// SIN IMPLEMENTAR EN NINGUN LADO , VA A HABER QUE USAR CLASES PERO EVITEMOS
// SIN IMPLEMENTAR EN NINGUN LADO , VA A HABER QUE USAR CLASES PERO EVITEMOS

// Detalles de la conexión
$servername = "localhost"; // Nombre del servidor de la base de datos
$usuario = "root"; // Nombre de usuario de la base de datos
$contraseña = ""; // Contraseña de la base de datos
$database = "pokedex2024"; // Nombre de la base de datos

// Crear una conexión
$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

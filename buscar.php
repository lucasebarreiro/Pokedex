<?php
$servername = "localhost";
$usuario = "root";
$contraseña = "";
$database = "pokedex2024";

$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dataPokemon = $_POST["buscar"];

    $stmt = $conexion->prepare("SELECT * FROM pokemon WHERE id=? OR nombre = ? OR tipo = ?");
    $stmt->bind_param("sss", $dataPokemon,$dataPokemon,$dataPokemon);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo 'Pokemon n°'.$row["id"].", nombre :".$row["nombre"].", tipo:".$row["tipo"].".<br>";
        }
    } else {
        echo("No se encontró ningun Pokemon.");
    }
}

$conexion->close();
?>


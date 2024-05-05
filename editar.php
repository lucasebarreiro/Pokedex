<?php

$servername = "localhost";
$usuario = "root";
$contraseña = "";
$database = "pokedex2024";

$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$description = $_POST["description"];
$tipo_id = $_POST["tipo_id"];
$tipo2_id = $_POST["tipo2_id"];

// verificar si la imagen se subió
if(isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] > 0) {
    $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

    // consulta para actualizar con imagen
    $query = "UPDATE `pokemon` SET `nombre`=?, `description`=?, `tipo_id`=?, `tipo2_id`=?, `imagen`=? WHERE `id`=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssiiis", $nombre, $description, $tipo_id, $tipo2_id, $imagen, $id);
} else {
    $query = "UPDATE `pokemon` SET `nombre`=?, `description`=?, `tipo_id`=?, `tipo2_id`=? WHERE `id`=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssiii", $nombre, $description, $tipo_id, $tipo2_id, $id);
}

if (empty($_POST["id"]) || empty($_POST["nombre"])){
    echo "Completa todos los campos";
} else {
    $resultado = $stmt->execute();

    if ($resultado){
        echo "Se han insertado los datos";
        header("location: homeAdmin.php");
    } else {
        echo "Error";
    }
}

$stmt->close();
$conexion->close();

?>

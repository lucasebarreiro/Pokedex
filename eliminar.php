<?php
$config = parse_ini_file("config.ini");

$servername = $config["servername"];
$usuario = $config["usuario"];
$contraseña = $config[""];
$database = $config["database"];

$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// aca verificamos y obtenemos el id del pokemon
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    // query para eliminar
    $query = "DELETE FROM pokemon WHERE id = '$id'";

    $resultado = mysqli_query($conexion, $query);

    // si la query tuvo exito, direccionamos al home. sino, mostrar error
    if ($resultado) {
        header("location: homeAdmin.php");
    } else {
        echo "Error al eliminar el pokemon.";
    }
} else {
    // error por si no se encuentra el id. AYUDA NO SE SI ES NECESARIO (??
    echo "ID de pokemon no proporcionado.";
}
?>

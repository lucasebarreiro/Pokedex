<?php

$config = parse_ini_file("config.ini");

$servername = $config["servername"];
$usuario = $config["usuario"];
$contraseña = $config[""];
$database = $config["database"];

// Crear una conexión
$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}


$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$tipo_id = $_POST["tipo_id"];
$tipo2_id = $_POST["tipo2_id"];
$imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

if (empty($_POST["id"]) || empty($_POST["nombre"])){
    echo "Completa todos los campos";
}else{

    $query = "INSERT INTO `pokemon`(`id`, `imagen`, `nombre`, `description`, `tipo_id`, `tipo2_id`) VALUES ('$id','$imagen','$nombre','$descripcion','$tipo_id','$tipo2_id')";
    //$query = "INSERT INTO `pokemon`(`id`, `imagen`, `nombre`, `tipo_id`, `tipo2_id`, `descripcion`) VALUES ('$id','$imagen','$nombre','$tipo_idPokemon', '$tipo2_idPokemon', '$descripcionPokemon')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado){
        echo "Se han insertado los datos";
    header("location: homeAdmin.php");
    }else{
        echo "Error";
    }


}
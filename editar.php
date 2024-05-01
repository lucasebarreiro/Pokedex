<?php

// Detalles de la conexión
$servername = "localhost"; // Nombre del servidor de la base de datos
$usuario = "root"; // Nombre de usuario de la base de datos
$contraseña = ""; // Contraseña de la base de datos
$database = "pokedex2024"; // Nombre de la base de datos

// Crear una conexión
$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}


$id= $_POST["id"];
$nombre= $_POST["nombre"];
$tipo= $_POST["tipo"];
$imagen= addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

if (empty($_POST["id"]) || empty($_POST["nombre"])){
    echo "Completa todos los campos";
}else{

    $query = "UPDATE `pokemon` SET `id`='$id',`imagen`='$imagen',`nombre`='$nombre',`tipo`='$tipo' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado){
        echo "Se han insertado los datos";
        header("location: homeAdmin.php");
    }else{
        echo "Error";
    }


}

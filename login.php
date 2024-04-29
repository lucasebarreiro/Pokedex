<?php
session_start();
if (isset($_POST["usuario"]) && isset($_POST["pass"])){
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["pass"];      //SI LOS DATOS QUE LE PASAMOS, LOS CONSULTA CON LA BASE DE DATOS Y SON CORRECTOS
        $esValido = consultarBase($usuario, $contraseña);   // NOS REDIRIGE AL HOME, SINO AL INDEX

        if ($esValido){
            $_SESSION["usuario"] = $usuario;
            header("location:home.php");
            exit();
        }else{
            header("location:index.php");
            exit();
        }
    }else{
        header("location:index.php");
        exit();
    }
function consultarBase($usuario, $contraseña)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokedex2024";

    //CREAMOS LA CONEXION
    $conn = mysqli_connect($servername, $username, $password, $database);

    //VERIFICAMOS LA CONEXION
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // REALIZAR CONSULTA
    $sql_usuario = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' && contraseña= '" . $contraseña . "'";
    $result = mysqli_query($conn, $sql_usuario);
    return mysqli_num_rows($result) == 1;

}





<?php

class Database
{

    private $conexion;

    public function __construct($servername, $usuario, $contraseña, $database)
    {
        // Crear una conexión
        $this->conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

// Verificar la conexión
        if ( $this->conexion->connect_error) {
            die("Error en la conexión: " .  $this->conexion->connect_error);
        }

    }


}
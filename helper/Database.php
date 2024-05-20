<?php

class Database
{
    private $conexion;

    public function __construct($servername, $usuario, $contrasena, $database)
    {
        $this->conexion = mysqli_connect($servername, $usuario, $contrasena, $database);

        if (!$this->conexion) {
            die("Error en la conexión: " . mysqli_connect_error());
        }
    }

    public function prepare($query)
    {
        return $this->conexion->prepare($query);
    }

    public function query($sql){
        $result = mysqli_query($this->conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function execute($sql)
    {
        if (!mysqli_query($this->conexion, $sql)) {
            die("Error en la ejecución: " . mysqli_error($this->conexion));
        }
    }

    public function __destruct()
    {
        mysqli_close($this->conexion);
    }
}


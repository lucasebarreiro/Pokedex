<?php

class Database
{

    private $conexion;

    public function __constructor($servername, $usuario, $contrasena, $database)
    {
        $this->conexion = mysqli_connect($servername, $usuario, $contrasena, $database);

        if (!$this->conexion) {
            die("Error en la conexión: " . mysqli_connect_error());
        }

    }

    public function query($sql)
    {
        $result = mysqli_query($this->conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function execute($sql)
    {
        mysqli_query($this->conexion, $sql);
    }

    public function __destruct()
    {
        mysqli_close($this->conexion);
    }

}

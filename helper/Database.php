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

/*$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataPokemon = $_POST["buscar"];

    $stmt = $conexion->prepare("SELECT * FROM pokemon WHERE nombre=? OR tipo_id = ? OR tipo2_id = ?");
    $stmt->bind_param("sss", $dataPokemon, $dataPokemon, $dataPokemon);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        header("Location: detalle.php?id=" . $row["id"]);
        exit();
    } else {
        echo "No se encontró ningún Pokémon con el nombre o número proporcionado.<br>";

        $result = mysqli_query($conexion, "SELECT * FROM pokemon");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo 'Pokemon n°' . $row["id"] . ", nombre :" . $row["nombre"] . ", tipo:" . $row["tipo_id"] . ".<br>";
            }
        } else {
            echo "No hay ningún Pokémon en la base de datos.";
        }
    }
}

$conexion->close();*/

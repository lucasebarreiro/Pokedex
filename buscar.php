<?php
include_once("Configuration.php");
$database = Configuration::getDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataPokemon = $_POST["buscar"];

    $stmt = $database->prepare("SELECT * FROM pokemon WHERE nombre=? OR tipo_id=? OR tipo2_id=?");
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

        $result = $database->query("SELECT * FROM pokemon");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 'Pokemon n°' . $row["id"] . ", nombre: " . $row["nombre"] . ", tipo: " . $row["tipo_id"] . ".<br>";
            }
        } else {
            echo "No hay ningún Pokémon en la base de datos.";
        }
    }
}
?>

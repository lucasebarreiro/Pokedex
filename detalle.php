<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detalle del Pokémon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
include_once "headerloged.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "<div class='container'><div class='alert alert-danger' role='alert'>ID de Pokémon no válido.</div></div>";
    exit();
}

$config = parse_ini_file("config.ini");

$servername = $config["servername"];
$usuario = $config["usuario"];
$contraseña = $config[""];
$database = $config["database"];

$conexion = mysqli_connect($servername, $usuario, $contraseña, $database);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$idPokemon = $_GET["id"];

$stmt = $conexion->prepare("SELECT * FROM pokemon WHERE id=?");
$stmt->bind_param("i", $idPokemon);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();

if (!$row) {
    echo "<div class='container'><div class='alert alert-warning' role='alert'>No se encontró ningún Pokémon con el ID proporcionado.</div></div>";
    exit();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Detalle del Pokémon: <?php echo $row["nombre"]; ?>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid" height="50px" src="data:imagenes/png;base64, <?php echo base64_encode($row["imagen"])?>" alt="">
                    </div>
                    <h5 class="card-title mt-3">Nombre: <?php echo $row["nombre"]; ?></h5>
                    <p class="card-text">Descripción: <?php echo $row["description"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
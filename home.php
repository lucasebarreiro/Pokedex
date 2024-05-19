<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include ("headerloged.php"); //CREAMOS EL ARCHIVO HEADER.PHP y LO INCLUIMOS ACA. COMO EN LOS TP

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


?>
    <div class="container pt-2">
        <!-- Formulario de búsqueda -->
        <form class="d-flex">
            <input class="form-control me-2 border-primary border-dark" type="search" placeholder="Busca un bicho" aria-label="Buscar">
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
        </form>
        <br>
        <a href="cargarPokemon.php">Cargar Pokemon</a>
    </div>

    <div class="container mt-3 table-scroll">

        <table class="table table-bordered border-secondary table-dark ">
            <thead>
            <tr class="">
                <th>Numero</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Tipo 2</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $query = mysqli_query($conexion, "SELECT * FROM pokemon"); //Seleccionamos todo de pokemon
                $result = mysqli_num_rows($query); // Guardamos en result los valores dentro de la query almacenandolos como un NUMERO
                 $tipos_query = mysqli_query($conexion, "SELECT * FROM tipo_pokemon");

                     $tipos = array();
                    while ($tipo = mysqli_fetch_assoc($tipos_query)) {
                        $tipos[$tipo['id']] = $tipo['nombre'];
                    }

                if($result > 0){ // si lo de arriba es >0 se ejecuta el while de abajo
                    while ($data = mysqli_fetch_array($query)){ //metemos en data todo loque hay en el query COMO ARRAY
                        //Para el resultado 1 Guarda en data los datos como un array
            ?>
            <tr>
                <!-- Entonces de data pedimos el id, la imagen, nombre y tipo-->
                <td><?php echo $data ["id"] ?></td>
                <td><img height="100px" src="data:imagenes/png;base64, <?php echo base64_encode($data ["imagen"])?>" alt=""></td>
                <td><?php echo $data ["nombre"] ?></td>
                <td><img height="20px" src="imagenes/tipos/<?php echo $tipos[$data["tipo_id"]] ?>.png" alt=""></td>
                <td>
                    <?php
                    if (!empty($tipos[$data["tipo2_id"]])) {
                        echo "<img height='20px' src='imagenes/tipos/" . $tipos[$data['tipo2_id']] . ".png' alt=''></td>";
                    }

                    ?>
                </td>
            </tr>
            <?php
                }
            }
            ?>

            </tbody>
        </table>
    </div>

</body>
</html>

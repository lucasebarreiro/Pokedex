<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include ("headerloged.php"); //CREAMOS EL ARCHIVO HEADER.PHP y LO INCLUIMOS ACA. COMO EN LOS TP

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

?>


<div style="display: block" class="container pt-2">
    <!-- Formulario de búsqueda -->
    <form class="d-flex">
        <input class="form-control me-2 border-primary border-dark" type="search" placeholder="Busca un bicho" aria-label="Buscar">
        <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>
    <br>
    <a class="btn btn-outline-dark" href="cargarPokemon.php">Cargar Pokemon</a>
</div>

<div class="container mt-3 table-scroll">

    <table class="table table-bordered border-secondary table-dark ">
        <thead>
        <tr class="">
            <th>Numero</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conexion, "SELECT * FROM pokemon"); //Seleccionamos todo de pokemon
        $result = mysqli_num_rows($query); // Guardamos en result los valores dentro de la query almacenandolos como un NUMERO
        if($result > 0){ // si lo de arriba es >0 se ejecuta el while de abajo
            while ($data = mysqli_fetch_array($query)){ //metemos en data todo loque hay en el query COMO ARRAY
                //Para el resultado 1 Guarda en data los datos como un array
                ?>
                <tr>
                    <!-- Entonces de data pedimos el id, la imagen, nombre y tipo-->
                    <td><?php echo $data ["id"] ?></td>
                    <td><img height="50px" src="data:imagenes/png;base64, <?php echo base64_encode($data ["imagen"])?>" alt=""></td>
                    <td><?php echo $data ["nombre"] ?></td>
                    <td><?php echo $data ["tipo"] ?></td>

                    <td style="display: block">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <button type="button" class="btn btn-danger">
                                <a href="eliminar.php" style="color: white;">Eliminar</a>
                            </button>
                            <button type="button" class="btn btn-warning">
                                <a href="editarPokemon.php" style="color: white;">Editar</a>
                            </button>
                        </div>
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

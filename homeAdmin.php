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
include("headerloged.php"); //CREAMOS EL ARCHIVO HEADER.PHP y LO INCLUIMOS ACA. COMO EN LOS TP

include_once ("Configuration.php");

$db = Configuration::getDatabase();


?>


<div style="display: block" class="container pt-2">
    <!-- Formulario de búsqueda -->
    <form class="d-flex" method="POST" action="buscar.php">
        <input class="form-control me-2 border-primary border-dark" type="search" placeholder="Busca un bicho" aria-label="Buscar" name="buscar">
        <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>
    <br>
    <a class="btn btn-outline-dark" href="view/template/cargarPokemon.php">Cargar Pokemon</a>
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
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php



        $query = mysqli_query($conexion, "SELECT * FROM pokemon"); //Seleccionamos todo de pokemon
        $tipos_query = mysqli_query($conexion, "SELECT * FROM tipo_pokemon");
        $result = mysqli_num_rows($query); // Guardamos en result los valores dentro de la query almacenandolos como un NUMERO

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
                    <td><img height="20px" src="public/imagenes/tipos/<?php echo $tipos[$data["tipo_id"]] ?>.png" alt=""></td>
                    <td>
                        <?php
                        if (!empty($tipos[$data["tipo2_id"]])) {
                            echo "<img height='20px' src='public/imagenes/tipos/" . $tipos[$data['tipo2_id']] . ".png' alt=''></td>";
                        }

                        ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <button type="button" class="btn btn-danger">
                                <a href="eliminar.php?id=<?php echo $data['id']; ?>" style="color: white;">Eliminar</a>
                            </button>
                            <button type="button" class="btn btn-warning">
                                <a href="view/template/editarPokemon.php" style="color: white;">Editar</a>
                            </button>
                            <button type="button" class="btn btn-info">
                                <a href="view/template/detalle.php?id=<?php echo $data['id']; ?>" style="color: white;">Detalles</a>
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
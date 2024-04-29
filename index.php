<?php
session_start();

if (isset($_SESSION["nombre"])) {
    header("location:sesion.php");
    exit();
}

include_once "utils/PokemonDAO.php";
include_once "utils/Navigation.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include ("header.php"); //CREAMOS EL ARCHIVO HEADER.PHP y LO INCLUIMOS ACA. COMO EN LOS TP
?>

    <div class="container pt-2">
        <!-- Formulario de búsqueda -->
        <form class="d-flex">
            <input class="form-control me-2 border-primary border-dark" type="search" placeholder="Busca un bicho" aria-label="Buscar">
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
        </form>
    </div>

    <div class="container mt-3 ">

        <table class="table table-bordered border-secondary table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
               <!--
                // Si el usuario está conectado, muestra los encabezados para editar y borrar
                //if ($usuarioConectado) {
                //    echo '<th scope="col">Editar</th>';
                //    echo '<th scope="col">Borrar</th>';
                }
                ?>-->
            </tr>
            </thead>
            <tbody>
            <?php

            $dao = new PokemonDAO();

            if(isset($_POST["buscar"]) && !empty($_POST["buscar"])){
                // quitamos espacios y ponemos en mayusculas la primer letra
                $parsedName = trim(ucfirst($_POST["buscar"]));

                $pokemon = $dao->getByNameOrId($parsedName);

                if($pokemon != null){
                    echo   "<tr>
                                <td class='text-center'>" . $pokemon['id_manual'] . "</td>
                                <td class='text-center'>" . $pokemon['nombre'] . "</td>
                                <td class='text-center'>" . $pokemon['altura'] . "</td>
                                <td class='text-center'>" . $pokemon['peso'] . "</td>
                                <td class='text-center'>" . $pokemon['habilidad'] . "</td>
                                <td class='text-center'><img src='".$pokemon['tipo']."' width='50' height='50'>";

                    echo"</td>";
                    echo "<td>" . $pokemon['descripcion'] . "</td>
                                <td> <img src=" . $pokemon['imagen'] . " width=75 height=75 ></td>
                                <td>
                                <div class='row'>  
                                    <div class ='my-1'>
                                      <form action='Detalle.php' method='POST'>
                                      <input type='hidden' name='nombre' value=".$pokemon['nombre'].">
                                      <input class='btn btn-primary ms-auto w-100' type='submit' value='Detalles'>
                                      </form>
                                    </div>
                                </div>
                                </td>
             </tr>";
                }else{

                    echo '<script>

            const error = document.querySelector(".error-msj");

            console.log(error);

            error.classList.add("alert","alert-danger");

            error.textContent="Pokemon no encontrado";


            setTimeout(() =>{

                error.textContent=" ";
                error.classList.remove("alert","alert-danger");

            },3000);

            
            </script>';
                    include('lista-pokemones.php');
                }
            }else{
                include('lista-pokemones.php');
            }



            ?>
            <tr>
            </tr>
            </tbody>
        </table>

    </div>

</body>
</html>
<?php

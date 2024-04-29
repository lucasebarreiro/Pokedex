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

        <table class="table table-bordered border-secondary table-dark ">
            <thead>
            <tr class="">
                <th>Numero</th>
                <th>Nombre</th>
                <th>Tipo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>001</td>
                <td>Bulbasaur</td>
                <td>Planta</td>
            </tr>
            <tr>
                <td>002</td>
                <td>Ivysaur</td>
                <td>Planta</td>
            </tr>
            <tr>
                <td>003</td>
                <td>Venusaur</td>
                <td>Planta - Veneno</td>
            </tr>
            </tbody>
        </table>
    </div>

</body>
</html>




















<?php

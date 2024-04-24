<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>

    <div class="container-fluid p-5 bg-danger text-white justify-content-around pokeHeader "> <!-- Container FLUID para que ocupe el width completo de la pagina   -->
        <div>
            <a href="index.php"> <img class="logo" src="./imagenes/logo.png" alt=""></a>
        </div>
        <div class="my-auto">
            <h1 class="titulo">Pokedex</h1>
        </div>
        <div>
            <form action="" class="p-5">
                <input type="text" name=usuario placeholder="Usuario">
                <input type="password" name=contraseña placeholder="Contraseña">
                <button class="button-warning botonLogin">Ingresar</button>
            </form>
        </div>
    </div>


</header>


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

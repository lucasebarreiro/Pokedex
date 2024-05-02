<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

include_once "headerloged.php";


?>

<form class="form" action="editar.php" method="POST" enctype="multipart/form-data">
    <h1>Editar Pokemón</h1>
    <label> Numero: </label>
    <input type="text" name="id" id="id"><br><br>
    <label> Nombre: </label>
    <input type="text" name="nombre" id="nombre"><br><br>
    <label> Tipo: </label>
    <input type="text" name="tipo" id="tipo"><br><br>
    <label> Imagen: </label>
    <input type="file" name="imagen" id="imagen"><br><br>
    <input type="submit" value="Guardar">




</form>
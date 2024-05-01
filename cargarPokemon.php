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
<style>
    input[type="submit"],
    button {
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    button {
        background-color: #f44336;
    }

    input[type="submit"]:hover,
    button:hover {
        background-color: #45a049;
    }
</style>

<script>
    function validarFormulario() {
        var id = document.getElementById("id").value;
        var nombre = document.getElementById("nombre").value;
        var tipo = document.getElementById("tipo").value;
        var imagen = document.getElementById("imagen").value;

        if (id === "" || nombre === "" || tipo === "" || imagen === "") {
            alert("Por favor, complete todos los campos antes de guardar.");
            return false;
        }
        return true;
    }
</script>

<form class="form" action="carga.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <h1>Ingrese los datos del Pokémon</h1>

    <label> Numero: </label>
    <input type="text" name="id" id="id"><br><br>

    <label> Nombre: </label>
    <input type="text" name="nombre" id="nombre"><br><br>

    <label> Tipo: </label>
    <input type="text" name="tipo" id="tipo"><br><br>

    <label> Imagen: </label>
    <input type="file" name="imagen" id="imagen"><br><br>

    <input type="submit" value="Guardar">
    <button type="button" onclick="window.history.back()">Cancelar</button>
</form>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

include_once "headerloged.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
include_once "headerloged.php";
?>

<form class="form" action="../../index.php" method="POST" enctype="multipart/form-data">
    <h1>Editar Pokémon</h1>

    <label>Número:</label>
    <input type="text" name="id" id="id"><br><br>

    <label>Nombre:</label>
    <input type="text" name="nombre" id="nombre"><br><br>

    <label>Descripción:</label><br>
    <textarea name="description" id="description" rows="4" cols="50"></textarea><br><br>

    <label>Tipo 1:</label>
    <select name="tipo_id" id="tipo_id">
        <option value="" disabled selected>Selecciona un tipo</option>
        <?php
        $tipos = [
            1 => "Agua", 2 => "Fuego", 3 => "Planta", 4 => "Acero", 5 => "Volador",
            6 => "Hielo", 7 => "Bicho", 8 => "Electrico", 9 => "Normal", 10 => "Roca",
            11 => "Tierra", 12 => "Lucha", 13 => "Hada", 14 => "Psiquico", 15 => "Veneno",
            16 => "Dragon", 17 => "Fantasma", 18 => "Siniestro"
        ];
        foreach ($tipos as $id => $tipo) {
            echo '<option value="' . $id . '">' . ucfirst($tipo) . '</option>';
        }
        ?>
    </select><br><br>

    <label>Tipo 2:</label>
    <select name="tipo2_id" id="tipo2_id">
        <option value="" disabled selected>Selecciona un tipo</option>
        <?php
        foreach ($tipos as $id => $tipo) {
            echo '<option value="' . $id . '">' . ucfirst($tipo) . '</option>';
        }
        ?>


    </select><br><br>

    <label>Imagen:</label>
    <input type="file" name="imagen" id="imagen"><br><br>

    <input type="submit" value="Guardar">
</form>
</body>
</html>
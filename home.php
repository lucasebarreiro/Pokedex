<?php/*
session_start();

if (isset($_SESSION["usuario"])){
    echo "Hola" . " " .  $_SESSION["usuario"] . "!";  //Y ACA SI LE PASAMOS UN DATO POR SESSION NOS SALUDA, SINO AL INDEX PAPU
}else{
    header("location:index.php");
    exit();
}*/
?>
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
?>

    <div class="container pt-2">
        <!-- Formulario de búsqueda -->
        <form class="d-flex">
            <input class="form-control me-2 border-primary border-dark" type="search" placeholder="Busca un bicho" aria-label="Buscar">
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
        </form>
    </div>

    <div class="container mt-3 ">
    </div>

</body>
</html>
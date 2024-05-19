<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/pokedex.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
    <div class="container-fluid p-5 bg-danger text-white justify-content-around pokeHeader "> <!-- Container FLUID para que ocupe el width completo de la pagina   -->
        <div>
            <?php
            if (isset($_SESSION["usuario"])&& $_SESSION["usuario"] == "admin"){
               echo '<a href="homeAdmin.php.php"> <img class="logo" src="public/imagenes/logo.png" alt=""></a>';
            }else{

             echo '<a href="home.php"> <img class="logo" src="public/imagenes/logo.png" alt=""></a>';
            }
            ?>
        </div>
        <div class="my-auto">
            <h1 class="titulo">Pokedex</h1>
        </div>
        <div class="p-5 usuarioLoged">
            <?php
            session_start();

            if (isset($_SESSION["usuario"])){
                echo "Hola" . " " .  $_SESSION["usuario"] . "!";  //Y ACA SI LE PASAMOS UN DATO POR SESSION NOS SALUDA, SINO AL INDEX PAPU
                echo '<a href="index.php"><button class="btn btn-outline-dark">Log Out</button></a>';
            }else{
                header("location:index.php");
                exit();
            }
            ?>
        </div>
    </div>
</header>
</body>
</html>
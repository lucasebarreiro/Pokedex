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
<header>
    <div class="container-fluid p-5 bg-danger text-white justify-content-around pokeHeader "> <!-- Container FLUID para que ocupe el width completo de la pagina   -->
        <div>
            <a href="index.php"> <img class="logo" src="img/logo.png" alt=""></a>
        </div>
        <div class="my-auto pokedex">
            <h1 class="titulo">Pokedex</h1>
        </div>
        <div>
            <form action="login.php" class="p-5" method="POST" enctype="multipart/form-data">
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="password" name="pass" placeholder="Contraseña">
                <button class="button-warning botonLogin">Ingresar</button>
            </form>
        </div>
    </div>
</header>
</body>
</html>
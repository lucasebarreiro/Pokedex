<?php
include_once "utils/PokemonDAO.php";
include_once "utils/Navigation.php";

$dao = new PokemonDAO();

$pokemon = $dao->getByNameOrId($_POST["nombre"]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>POKEDEX</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<header>
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-6 col-md">
                <a href="index.php"><img src="img/logo.png" width="50" height="50"></a>
            </div>

            <div class="col-6 col-md-3">
                <h1 class="text-center m-0">POKEDEX</h1>
            </div>

            <?php
            session_start();

            if (!isset($_SESSION["nombre"])) {
                echo '<div class="col-md-6 pt-2">
                            <form class="d-flex flex-wrap flex-md-nowrap col col-md-4" action="sesion.php" method="post">
                                <input type="text" name="nombre" class="form-control my-2 mx-md-2 col-1" placeholder="usuario">
                                <input type="password" name="password" class="form-control my-2 mx-md-2 col-1" placeholder="contraseña">
                                <button type="submit" class="btn btn-primary col my-2 ">Ingresar</button>
                            </form>
                    </div>';
            }
            ?>
        </div>
    </div>
</header>

<main>
    <section class="container mt-4">
        <div class="d-flex flex-column flex-md-row">

            <div class="mx-auto mx-md-0">
                <img class="m-w-300" src="<?php echo $pokemon["imagen"] ?>" alt="imagen pokemon">
            </div>

            <div class="mx-md-4 flex-fill">
                <div class="d-flex gap-5 align-items-center ">

                    <img class=" m-w-50" src="<?php echo $pokemon["tipo"] ?>" alt="tipo pokemon">

                    <div class="v-line"></div>

                    <h1 class="m-0"><?php echo $pokemon["nombre"] ?></h1>
                </div>

                <div class="py-3">
                    <p> <?php echo $pokemon["descripcion"] ?></p>
                </div>
            </div>
        </div>

        </div>
    </section>

</main>
</body>
</html>
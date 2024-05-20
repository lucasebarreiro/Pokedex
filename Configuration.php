<?php
include_once("Database.php");
include_once ("controller/PokemonController.php");
include_once ("controller/UsuarioController.php");
include_once ("model/PokemonModel.php");
include_once ("model/UsuarioModel.php");


class Configuration {

    public static function getDatabase(){
        $config = self::getConfig();

        return new Database($config["servername"], $config["usuario"], $config["contraseña"], $config["database"]);
    }

    private static function getConfig()
    {
        return parse_ini_file("config.ini");
    }

    public static function getPokemonController(){

        return new PokemonController(self::getPokemonModel(), self::getPresenter());
    }

    private Static function getPokemonModel(){

        return new PokemonModel(self::getDatabase());
    }


    public Static function getUsuarioController(){

        return new UsuarioController(self::getUsuarioModel(), self::getPresenter());
    }

    private Static function getUsuarioModel(){

        return new UsuarioModel(self::getDatabase());
    }

    public static function getRouter(){

        return new Router();

    }

    private static function getPresenter(){

        return new Presenter();
    }




}
?>

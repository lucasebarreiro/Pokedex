<?php
include_once("Database.php");

class Configuration {

    public static function getDatabase(){
        $config = self::getConfig();

        return new Database($config["servername"], $config["usuario"], $config["password"], $config["database"]);
    }

    private static function getConfig()
    {
        return parse_ini_file("config.ini");
    }
}
?>

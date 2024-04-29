<?php

class DatabaseManager {
    public static function getConnection() {
        $config = parse_ini_file("config.ini");

        return new mysqli($config["host"], $config["usuario"], $config["clave"], $config["base"],$config["port"]);
    }
}

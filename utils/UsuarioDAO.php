<?php
include_once "DatabaseManager.php";
include_once(dirname(__DIR__) . "/utils/Navigation.php");

class UsuarioDAO {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseManager::getConnection();
    }

    public function __destruct() {
        $this->connection->close();
    }

    public function login($nombre, $password) {
        $query = $this->connection->prepare("SELECT * FROM pokedex.usuario WHERE nombre = ? AND password = ?");
        $query->bind_param("ss", $nombre, $password);
        $query->execute();

        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();

            $_SESSION["nombre"] = $fila["nombre"];

            Navigation::redirectTo("sesion.php");
        }

        Navigation::redirectTo("index.php");
    }

}

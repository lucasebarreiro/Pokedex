<?php
$config = parse_ini_file("config.ini");

$servername = $config["servername"];
$usuario = $config["usuario"];
$contraseña = $config[""];
$database = $config["database"];

$database = new Database($servername, $usuario, $contraseña, $database);
$pokemon = $database->query("SELECT * FROM pokemon");
?>

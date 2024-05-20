<?php

class UsuarioController
{
    private $model;
    private $presenter;

    public function __construct($presenter, $model){
        $this->presenter = $presenter;
        $this->model = $model;
    }

    public function getUsuario()
    {
        $usuarios = $this->model->getUsuario();
        $this->presenter->render("view/template/header.mustache", ["usuarios" => $usuarios]);
    }

    public function get(){
        $this->presenter->render("view/template/header.mustache");
    }

    public function handleRequest() {
        session_start();
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        if ($action == 'logout') {
            $this->logOut();
        } else {
            $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
            $this->showHeader($usuario);
        }
    }

    private function showHeader($usuario) {
        $this->presenter->render('header', ['usuario' => $usuario]);

    }

    private function logOut(){
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();

    }
}

<?php

class PokemonModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getPokemons(){
        return $this->database->query('SELECT * FROM pokemon');
    }

    public function buscar($campoABuscar){
        return $this->database->query("SELECT * FROM pokemon WHERE id = '$campoABuscar' OR nombre LIKE '%$campoABuscar%' OR tipo LIKE '%$campoABuscar%'");
    }

}

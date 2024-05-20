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

    public function searchPokemon($dataPokemon) {
        $stmt = $this->db->prepare("SELECT * FROM pokemon WHERE nombre=? OR tipo_id=? OR tipo2_id=?");
        $stmt->bind_param("sss", $dataPokemon, $dataPokemon, $dataPokemon);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getAllPokemon() {
        $result = $this->db->query("SELECT * FROM pokemon");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPokemonById($id) {
        $stmt = $this->db->prepare("SELECT * FROM pokemon WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function addPokemon($data) {
        $stmt = $this->db->prepare("INSERT INTO pokemon (nombre, tipo_id, tipo2_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $data['nombre'], $data['tipo_id'], $data['tipo2_id']);
        return $stmt->execute();
    }

    public function updatePokemon($id, $data) {
        $stmt = $this->db->prepare("UPDATE pokemon SET nombre=?, tipo_id=?, tipo2_id=? WHERE id=?");
        $stmt->bind_param("sssi", $data['nombre'], $data['tipo_id'], $data['tipo2_id'], $id);
        return $stmt->execute();
    }

    public function deletePokemon($id) {
        $stmt = $this->db->prepare("DELETE FROM pokemon WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

}

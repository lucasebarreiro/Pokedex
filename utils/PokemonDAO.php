<?php
include_once "DatabaseManager.php";

class PokemonDAO {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseManager::getConnection();
    }

    public function __destruct() {
        $this->connection->close();
    }

    public function getAll() {
        $query = $this->connection->prepare("SELECT p.id_manual, p.nombre, p.altura,p.peso , t.nombre as tipo, p.habilidad, p.descripcion, p.imagen 
        from  Pokemons p join  Tipo t  on p.id_tipo = t.id");
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getByNameOrId($search) {
        $query = $this->connection->prepare(" SELECT p.id_manual, p.nombre, p.altura,p.peso , t.nombre as tipo, p.habilidad, p.descripcion, p.imagen 
        from  Pokemons p join  Tipo t  on p.id_tipo = t.id WHERE p.id_manual ='".$search."' OR p.nombre = '".$search."'");

        $query->execute();

        $result = $query->get_result();

        return $result->fetch_assoc();
    }


    public function searchById($id){
        $query = $this->connection->prepare("SELECT p.id_manual, p.nombre, p.altura,p.peso , t.nombre as tipo, p.habilidad, p.descripcion, p.imagen 
        from  Pokemons p join  Tipo t  on p.id_tipo = t.id WHERE id_manual = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $result = $query->get_result();

        return $result->fetch_assoc();
    }

    public function update($id,$id_manual,$nombre,$altura,$peso,$tipo,$habilidad) {

        $query = $this->connection->prepare("UPDATE pokedex.pokemons SET id_manual = ? ,nombre = ?, altura = ?, peso = ?, id_tipo = ?, habilidad = ?, imagen= ? WHERE id_manual = ?");
        $imagen = "img/pokemones/".$nombre.".png";
        $query->bind_param("isssissi", $id_manual,$nombre,$altura,$peso,$tipo,$habilidad,$imagen,$id);

        $query->execute();
    }

    public function delete($id) {
        $query = $this->connection->prepare("DELETE FROM pokedex.pokemons WHERE id_manual = ?");
        $query->bind_param("i", $id);

        $query->execute();
    }

    public function agregar($id,$nombre,$altura,$peso,$habilidad,$tipo,$descripcion) {
        $query = $this->connection->prepare("INSERT INTO pokedex.pokemons (id_manual, nombre, altura, peso, habilidad, id_tipo, descripcion, imagen) VALUES (?,?,?,?,?,?,?,?)");
        $imagen = "img/pokemones/".$nombre.".png";
        $query->bind_param("issssiss", $id, $nombre, $altura, $peso, $habilidad, $tipo , $descripcion, $imagen);
        $query->execute();


    }
}
<?php
class Mascota {
    private $connection;
    private $table_name = "mascota";

    public $idMascota;
	public $idCli;
	public $idCat;
    public $nombre;
	public $foto;
    public $raza;
    public $sexo;
    public $peso;
    public $estatura;
    public $fechaNacimiento;

    // Constructor con la conexión a la base de datos
    public function __construct($db) {
        $this->connection = $db;
    }

    // Obtener todas las mascotas
    public function obtenerMascotas() {
        $query = "SELECT idMascota,idCliente,idCategoria,  nom_mascota,foto, idCategoria, sexo, peso,largo, estatura, fechaNacimiento FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener una mascota por ID
    public function obtenerMascotaPorId($id) {
        $query = "SELECT idMascota,idCliente,idCategoria, nombre, idCategoria, sexo, peso,largo, estatura, fechaNacimiento FROM " . $this->table_name . " WHERE idMascota = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt;
    }
}
?>
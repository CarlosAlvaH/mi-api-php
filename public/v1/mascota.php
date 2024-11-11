<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/db.php';
include_once '../src/objects/mascota.php';

$database = getConnection();
$mascota = new Mascota($database);

// Obtener el método de solicitud
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Si la URL contiene un ID, obtener una sola mascota
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $mascota->obtenerMascotaPorId($id);
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode($row);
            } else {
                echo json_encode(array("mensaje" => "Mascota no encontrada"));
            }
        } else {
            // Obtener todas las mascotas
            $stmt = $mascota->obtenerMascotas();
            $num = $stmt->rowCount();

            if ($num > 0) {
                $mascotas_arr = array();
                $mascotas_arr['mascotas'] = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $mascota_item = array(
                        "idMascota" => $idMascota,
						"idCliente" => $idCli,
						"idCategoria" => $idCat,
                        "nombre" => $nombre,
                        "raza" => $raza,
                        "sexo" => $sexo,
                        "peso" => $peso,
                        "estatura" => $estatura,
                        "fechaNacimiento" => $fechaNacimiento
                    );
                    array_push($mascotas_arr['mascotas'], $mascota_item);
                }
                echo json_encode($mascotas_arr);
            } else {
                echo json_encode(array("mensaje" => "No se encontraron mascotas"));
            }
        }
        break;

    default:
        echo json_encode(array("mensaje" => "Método no soportado"));
        break;
}
?>
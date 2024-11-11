<?php
// Configuración de la base de datos
define('DB_SERVER', 'bce6vf4tu3cmol22tsge-mysql.services.clever-cloud.com');
define('DB_USERNAME', 'uxxvwebuxr4dzmz5');
define('DB_PASSWORD', 'qNN2czxF2IBpbEnXHN5K');
define('DB_NAME', 'bce6vf4tu3cmol22tsge');

// Crear la conexión
function getConnection() {
    $connection = null;
    try {
        $connection = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    return $connection;
}
?>
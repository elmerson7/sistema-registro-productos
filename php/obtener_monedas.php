<?php
require_once 'conexion.php';

try {
    $stmt = $conexion->query("SELECT id, nombre FROM monedas ORDER BY nombre ASC");
    $monedas = $stmt->fetchAll();
    echo json_encode($monedas);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener monedas: ' . $e->getMessage()]);
}

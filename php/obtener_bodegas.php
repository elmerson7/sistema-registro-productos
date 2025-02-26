<?php
require_once 'conexion.php';

try {
    $stmt = $conexion->query("SELECT id, nombre FROM bodegas ORDER BY nombre ASC");
    $bodegas = $stmt->fetchAll();
    echo json_encode($bodegas);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener bodegas: ' . $e->getMessage()]);
}

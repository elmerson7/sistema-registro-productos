<?php
require_once 'conexion.php';

if (!isset($_GET['bodega_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de bodega no proporcionado.']);
    exit;
}

$bodega_id = $_GET['bodega_id'];

try {
    $stmt = $conexion->prepare("SELECT id, nombre FROM sucursales WHERE bodega_id = :bodega_id ORDER BY nombre ASC");
    $stmt->bindParam(':bodega_id', $bodega_id, PDO::PARAM_INT);
    $stmt->execute();
    $sucursales = $stmt->fetchAll();
    echo json_encode($sucursales);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener sucursales: ' . $e->getMessage()]);
}
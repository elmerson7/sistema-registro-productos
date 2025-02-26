<?php
require_once 'conexion.php';

try {
    $stmt = $conexion->query("SELECT NOW() AS fecha_actual");
    $resultado = $stmt->fetch();
    echo "✅ Conexión exitosa. Fecha y hora del servidor: " . $resultado['fecha_actual'];
} catch (PDOException $e) {
    echo "❌ Error al ejecutar la consulta: " . $e->getMessage();
}

<?php
require_once 'conexion.php';

header('Content-Type: application/json');

// Verificar que los datos estén presentes
if (
    !isset($_POST['codigo'], $_POST['nombre'], $_POST['bodega'], $_POST['sucursal'], $_POST['moneda'], $_POST['precio'], $_POST['descripcion'], $_POST['materiales'])
) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Faltan datos en la solicitud.']);
    exit;
}

$codigo = trim($_POST['codigo']);
$nombre = trim($_POST['nombre']);
$bodega = (int) $_POST['bodega'];
$sucursal = (int) $_POST['sucursal'];
$moneda = (int) $_POST['moneda'];
$precio = (float) $_POST['precio'];
$descripcion = trim($_POST['descripcion']);
$materiales = $_POST['materiales'];

// Validaciones básicas
if (strlen($codigo) < 5 || strlen($codigo) > 15) {
    respuestaError('El código debe tener entre 5 y 15 caracteres.');
}

if (count($materiales) < 2) {
    respuestaError('Debe seleccionar al menos dos materiales.');
}

try {
    // Verificar codigo duplicado
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM productos WHERE codigo = :codigo");
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();

    if ($stmt->fetchColumn() > 0) {
        respuestaError('El código del producto ya está registrado.');
    }

    // Insertar producto
    $conexion->beginTransaction();

    $stmt = $conexion->prepare("INSERT INTO productos (codigo, nombre, bodega_id, sucursal_id, moneda_id, precio, descripcion, fecha_creacion, fecha_modificacion) VALUES (:codigo, :nombre, :bodega, :sucursal, :moneda, :precio, :descripcion, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
    $stmt->execute([
        ':codigo' => $codigo,
        ':nombre' => $nombre,
        ':bodega' => $bodega,
        ':sucursal' => $sucursal,
        ':moneda' => $moneda,
        ':precio' => $precio,
        ':descripcion' => $descripcion
    ]);

    $productoId = $conexion->lastInsertId();

    // Insertar materiales relacionados
    $stmtMaterial = $conexion->prepare("INSERT INTO producto_material (producto_id, material_id) VALUES (:producto_id, :material_id)");
    foreach ($materiales as $materialId) {
        $stmtMaterial->execute([
            ':producto_id' => $productoId,
            ':material_id' => $materialId
        ]);
    }

    $conexion->commit();

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    $conexion->rollBack();
    respuestaError('Error al guardar el producto: ' . $e->getMessage());
}

function respuestaError($mensaje) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $mensaje]);
    exit;
}

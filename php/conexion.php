<?php

// Configuración de la conexión a PostgreSQL
define('DB_HOST', 'localhost'); // o 127.0.0.1
define('DB_PORT', '5432');
define('DB_NAME', 'app_db');
define('DB_USER', 'app_user');
define('DB_PASS', 'app_password');

try {
    // Crear conexión PDO para PostgreSQL
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $conexion = new PDO($dsn, DB_USER, DB_PASS, $options);
    
} catch (PDOException $e) {
    // Manejo de errores de conexión
    http_response_code(500);
    echo json_encode([
        'error' => 'Error de conexión a la base de datos: ' . $e->getMessage()
    ]);
    exit;
}

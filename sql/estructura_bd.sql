-- Crear la base de datos (si es necesario)
-- CREATE DATABASE app_db;

-- Seleccionar la base de datos
-- \\c app_db;

-- Tabla: bodegas
CREATE TABLE bodegas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: sucursales
CREATE TABLE sucursales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    bodega_id INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bodega_id) REFERENCES bodegas(id) ON DELETE CASCADE
);

-- Tabla: monedas
CREATE TABLE monedas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: materiales
CREATE TABLE materiales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: productos
CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(15) UNIQUE NOT NULL CHECK (LENGTH(codigo) BETWEEN 5 AND 15),
    nombre VARCHAR(50) NOT NULL CHECK (LENGTH(nombre) BETWEEN 2 AND 50),
    bodega_id INT NOT NULL,
    sucursal_id INT NOT NULL,
    moneda_id INT NOT NULL,
    precio NUMERIC(10,2) NOT NULL CHECK (precio >= 0),
    descripcion TEXT NOT NULL CHECK (LENGTH(descripcion) BETWEEN 10 AND 1000),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bodega_id) REFERENCES bodegas(id) ON DELETE CASCADE,
    FOREIGN KEY (sucursal_id) REFERENCES sucursales(id) ON DELETE CASCADE,
    FOREIGN KEY (moneda_id) REFERENCES monedas(id) ON DELETE CASCADE
);

-- Tabla: producto_material (relación muchos a muchos)
CREATE TABLE producto_material (
    producto_id INT NOT NULL,
    material_id INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (producto_id, material_id),
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE,
    FOREIGN KEY (material_id) REFERENCES materiales(id) ON DELETE CASCADE
);

-- Datos iniciales para bodegas
INSERT INTO bodegas (nombre) VALUES 
('Bodega Central'), 
('Bodega Norte'),
('Bodega Sur');

-- Datos iniciales para sucursales
INSERT INTO sucursales (nombre, bodega_id) VALUES 
('Sucursal Lima', 1),
('Sucursal Huancayo', 1),
('Sucursal Junín', 1),
('Sucursal Piura', 2),
('Sucursal Trujillo', 2),
('Sucursal Chiclayo', 2),
('Sucursal Arequipa', 3),
('Sucursal Cusco', 3),
('Sucursal Puno', 3);

-- Datos iniciales para monedas
INSERT INTO monedas (nombre) VALUES ('PEN'), ('USD'), ('EUR');

-- Datos iniciales para materiales
INSERT INTO materiales (nombre) VALUES ('Plástico'), ('Metal'), ('Madera'), ('Vidrio'), ('Textil');

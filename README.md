# 📄 LEEME - Formulario de Producto

## 📚 **Descripción del Proyecto**
Aplicación web para el registro de productos con las siguientes características:
- 🔗 Conexión a **PostgreSQL**.
- 🌐 Interfaz desarrollada con **HTML**, **CSS** (responsive) y **JavaScript puro** para peticiones AJAX.
- 🔄 Carga dinámica de bodegas, sucursales y monedas.
- 🛡️ Validaciones completas en frontend y backend.
- 💾 Persistencia de datos con relaciones en base de datos.

---

## ⚙️ **Requisitos del Sistema**
- PHP 8.2 o superior.
- PostgreSQL 16.
- Extensión `pdo_pgsql` habilitada.
- Navegador web moderno (Chrome, Firefox, Edge).

---

## 🚀 **Configuración del Proyecto**

1️⃣ **Clonar el repositorio:**
```bash
git clone https://github.com/elmerson7/sistema-registro-productos.git
```

2️⃣ **Importar la base de datos:**
- Importar el archivo `sql/estructura.sql` en su entorno de PostgreSQL.

3️⃣ **Configurar la conexión a la base de datos:**
- Editar `php/conexion.php` con las credenciales locales:
  ```php
  define('DB_HOST', 'localhost');
  define('DB_PORT', '5432');
  define('DB_NAME', 'app_db');
  define('DB_USER', 'app_user');
  define('DB_PASS', 'app_password');
  ```

4️⃣ **Abrir el proyecto en su servidor local:**
- Acceder a la carpeta `sistema-registro-productos` y configurarlo en su entorno Apache o servidor local disponible.

---

## 📝 **Estructura del Proyecto**
```
├── css
│   └── style.css               # Estilos del formulario
├── js
│   └── script.js               # Lógica JS pura (fetch y validaciones)
├── php
│   ├── conexion.php            # Conexión PDO a PostgreSQL
│   ├── obtener_bodegas.php     # API: Obtener bodegas
│   ├── obtener_sucursales.php  # API: Obtener sucursales dinámicamente
│   ├── obtener_monedas.php     # API: Obtener monedas
│   ├── guardar_producto.php    # API: Guardado del producto y materiales
│   └── test_conexion.php       # Script para probar la conexión a la base de datos
├── sql
│   └── estructura.sql          # Script SQL para la creación de la BD
├── index.php                   # Página principal con el formulario
├── LEEME.txt                   # Archivo de instrucciones
└── README.md                   # Tambien archivo de instrucciones
```

---

## 🔒 **Consideraciones de Seguridad**
- Uso de **PDO** con consultas preparadas para prevenir SQL Injection.
- Validaciones en frontend y backend.
- Manejo de errores con respuestas en formato JSON.

---

## 🏁 **Notas Finales**
- 🖇️ Proyecto diseñado para ejecutarse sin Docker, adaptado a entornos locales con PHP y PostgreSQL.
- 🌐 Peticiones asíncronas con **fetch()** y manejo dinámico del formulario.



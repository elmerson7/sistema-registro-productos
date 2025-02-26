# 📄 LEEME - Formulario de Producto

## 📚 **Descripción del Proyecto**
Aplicación web para el registro de productos con las siguientes características:
- 🔗 Conexión a **PostgreSQL**.
- 🌐 Interfaz desarrollada con **HTML**, **CSS** (responsive) y **JavaScript puro** para peticiones AJAX.
- 🔄 Carga dinámica de bodegas, sucursales y monedas.
- 🛡️ Validaciones completas en frontend y backend.
- 💾 Persistencia de datos con relaciones en base de datos.
- 🐳 **Opcional**: Configuración con **Docker** para facilitar la ejecución del entorno.

---

## ⚙️ **Requisitos del Sistema**
- PHP 8.2 o superior.
- PostgreSQL 16.
- Extensión `pdo_pgsql` habilitada.
- Navegador web moderno (Chrome, Firefox, Edge).
- **Opcional:** Docker y Docker Compose instalados.

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
  define('DB_HOST', 'localhost'); // o 127.0.0.1 o 'postgres' nombre del servicio de Docker
  define('DB_PORT', '5432');
  define('DB_NAME', 'app_db');
  define('DB_USER', 'app_user');
  define('DB_PASS', 'app_password');
  ```

4️⃣ **Abrir el proyecto en su servidor local:**
- Acceder a la carpeta `sistema-registro-productos` y configurarlo en su entorno Apache o servidor local disponible.

---

## 🐳 **Configuración opcional con Docker**

Si prefiere levantar el proyecto con Docker:

1️⃣ **Ejecutar Docker Compose:**
```bash
docker-compose up -d --build
```

2️⃣ **Acceder al proyecto:**
- Abrir el navegador en `http://localhost:8000`.

### 📁 **Archivos relacionados a Docker**:
- `Dockerfile`: Configuración del entorno PHP 8.2 con `pdo_pgsql`.
- `docker-compose.yml`: Configuración de servicios para PHP y PostgreSQL.

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
├── Dockerfile                  # Configuración de entorno PHP para Docker
├── docker-compose.yml          # Configuración de servicios Docker
├── index.php                   # Página principal con el formulario
├── LEEME.txt                   # Archivo de instrucciones
└── README.md                   # También archivo de instrucciones
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
- 🐳 Docker y Docker Compose incluidos para simplificar la configuración del entorno de desarrollo.


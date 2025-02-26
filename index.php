<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Producto</h1>
        <form id="formProducto">
            <div class="form-row">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega"></select>
                </div>
                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal"></select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda"></select>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio">
                </div>
            </div>

            <div class="form-group materiales">
                <label>Material del Producto</label>
                <div class="materiales-list">
                <label><input type="checkbox" name="materiales[]" value="1"> Plástico</label>
                <label><input type="checkbox" name="materiales[]" value="2"> Metal</label>
                <label><input type="checkbox" name="materiales[]" value="3"> Madera</label>
                <label><input type="checkbox" name="materiales[]" value="4"> Vidrio</label>
                <label><input type="checkbox" name="materiales[]" value="5"> Textil</label>
                </div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"></textarea>
            </div>

            <div class="form-group botonera ">
                <button type="submit" id="btnGuardar">Guardar Producto</button>
            </div>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
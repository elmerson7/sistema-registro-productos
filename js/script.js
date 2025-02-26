document.addEventListener('DOMContentLoaded', () => {
    cargarBodegas();
    cargarMonedas();

    document.getElementById('bodega').addEventListener('change', cargarSucursales);
    document.getElementById('formProducto').addEventListener('submit', registrarProducto);
});

// AJAX cargar bodegas
function cargarBodegas() {
    fetch('php/obtener_bodegas.php')
        .then(response => response.json())
        .then(data => {
            const selectBodega = document.getElementById('bodega');
            selectBodega.innerHTML = '<option value="" class="dn"></option>';
            data.forEach(bodega => {
                selectBodega.innerHTML += `<option value="${bodega.id}">${bodega.nombre}</option>`;
            });
        })
        .catch(console.error);
}

// AJAX cargar sucursales según la bodega seleccionada
function cargarSucursales() {
    const bodegaId = document.getElementById('bodega').value;
    const selectSucursal = document.getElementById('sucursal');

    if (!bodegaId) {
        selectSucursal.innerHTML = '<option value="" class="dn"></option>';
        return;
    }

    fetch(`php/obtener_sucursales.php?bodega_id=${bodegaId}`)
        .then(response => response.json())
        .then(data => {
            selectSucursal.innerHTML = '<option value="" class="dn"></option>';
            data.forEach(sucursal => {
                selectSucursal.innerHTML += `<option value="${sucursal.id}">${sucursal.nombre}</option>`;
            });
        })
        .catch(console.error);
}

// AJAX cargar monedas
function cargarMonedas() {
    fetch('php/obtener_monedas.php')
        .then(response => response.json())
        .then(data => {
            const selectMoneda = document.getElementById('moneda');
            selectMoneda.innerHTML = '<option value="" class="dn"></option>';
            data.forEach(moneda => {
                selectMoneda.innerHTML += `<option value="${moneda.id}">${moneda.nombre}</option>`;
            });
        })
        .catch(console.error);
}

// Registrar el producto
function registrarProducto(event) {
    event.preventDefault();

    if (!validarFormulario()) return;

    const formData = new FormData(document.getElementById('formProducto'));

    fetch('php/guardar_producto.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('✅ Producto guardado exitosamente.');
                document.getElementById('formProducto').reset();
                cargarBodegas();
                cargarMonedas();
                document.getElementById('sucursal').innerHTML = '<option value="" class="dn"></option>';
            } else {
                alert(`❌ Error: ${data.error}`);
            }
        })
        .catch(error => alert(`❌ Error en la solicitud: ${error}`));
}

// Validación del formulario
function validarFormulario() {
    const codigo = document.getElementById('codigo').value.trim();
    const nombre = document.getElementById('nombre').value.trim();
    const bodega = document.getElementById('bodega').value;
    const sucursal = document.getElementById('sucursal').value;
    const moneda = document.getElementById('moneda').value;
    const precio = document.getElementById('precio').value.trim();
    const materiales = document.querySelectorAll('input[name="materiales[]"]:checked');
    const descripcion = document.getElementById('descripcion').value.trim();

    const regexPrecio = /^\d+(\.\d{1,2})?$/;
    const regexFormatoCodigo = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]+$/;
    
    // validaciones de codigo
    if (!codigo) {
        return alerta('El código del producto no puede estar en blanco.');
    }
    if (codigo.length < 5 || codigo.length > 15) {
        return alerta('El código del producto debe tener entre 5 y 15 caracteres.');
    }
    if (!regexFormatoCodigo.test(codigo)) {
        return alerta('El código del producto debe contener letras y números.');
    }

    // validaciones de nombre
    if (!nombre) {
        return alerta('El nombre del producto no puede estar en blanco.');
    }
    if (nombre.length < 2 || nombre.length > 50) {
        return alerta('El nombre del producto debe tener entre 2 y 50 caracteres.');
    }

    if (!bodega) {
        return alerta('Debe seleccionar una bodega.');
    }
    if (!sucursal) {
        return alerta('Debe seleccionar una sucursal para la bodega seleccionada.');
    }
    if (!moneda) {
        return alerta('Debe seleccionar una moneda para el producto.');
    }

    // validaciones de precio
    if (!precio) {
        return alerta('El precio del producto no puede estar en blanco.');
    }
    if (!regexPrecio.test(precio)) {
        return alerta('El precio del producto debe ser un número positivo con hasta dos decimales.');
    }

    if (materiales.length < 2) {
        return alerta('Debe seleccionar al menos dos materiales para el producto.');
    }

    // validaciones de descripcion
    if (!descripcion) {
        return alerta('La descripción del producto no puede estar en blanco.');
    }
    if (descripcion.length < 10 || descripcion.length > 1000) {
        return alerta('La descripción del producto debe tener entre 10 y 1000 caracteres.');
    }

    return true;
}

// Función de alerta
function alerta(mensaje) {
    alert(`⚠️ ${mensaje}`);
    return false;
}

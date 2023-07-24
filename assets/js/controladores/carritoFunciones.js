//funcion muestra carrito
function mostrarCarrito(buscar) {
    var parametros = {
        buscar: buscar,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/carritoController.php?f=showCarrito",
        success: function (data) {
            document.getElementById('carritoContenedor').innerHTML = data;
        },
    });
    return false;
}

window.addEventListener('load', function () {
    mostrarCarrito(idCliente);
});

//funcion para aumentar cantidad de producto en carrito
function aumentarCarrito(idc, idp, cant) {
    var parametros = {
        idc: idc,
        idp: idp,
        cant: cant,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/carritoController.php?f=updateCarrito",
        success: function (data) {
            mostrarCarrito(idCliente);
        },
    });
    return false;
}

//funcion para disminuir cantidad de producto en carrito
function disminuirCarrito(idc, idp, cant) {
    var parametros = {
        idc: idc,
        idp: idp,
        cant: cant,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/carritoController.php?f=updateCarrito",
        success: function (data) {
            mostrarCarrito(idCliente);
        },
    });
    return false;
}


function eliminacion(idc, idp) {
    Swal.fire({
        title: "¿Deseas eliminar?",
        text: "¡No podra revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarProducto(idc, idp);
        }
    });
}

function eliminarProducto(idc, idp) {
    var parametros = {
        idc: idc,
        idp: idp,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/carritoController.php?f=deleteProducto",
        success: function (data) {
            mostrarCarrito(idCliente);
        },
    });
    return false;
}

//funcion para encontrar ubicacion

function encontrarUbicacion() {
    navigator.geolocation.getCurrentPosition(position => {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        return lat, lng;
    });
}

encontrarUbicacion();

//funcion para crear pedido
function crearPedido() {
    Swal.fire({
        title: "¿Deseas enviar su pedido?",
        text: "¡Si acepta su pedido llegará en 30 minutos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, enviar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            enviarPedido();
        }
    });
}


//funcion para mostrar enviar pedido
function enviarPedido() {
    navigator.geolocation.getCurrentPosition(position => {
        var lati = position.coords.latitude;
        var lngi = position.coords.longitude;

        var parametros = {
            idc: idCliente,
            vlat: lati,
            vlng: lngi,
        };
        $.ajax({
            data: parametros,
            type: "POST",
            url: "../backend/controller/carritoController.php?f=newPedido",
            success: function (data) {
                if (data == 1) {
                    Swal.fire("Listo", "¡Pedido en camino!", "success");
                    mostrarCarrito(idCliente);
                } else {
                    Swal.fire("Error", "¡Ocurrio un error consulte soporte!", "error");
                }
            },
        });
        return false;
    });
}



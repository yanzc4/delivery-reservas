//funciones para llenar las imagenes de los platos
function listarPlatos() {
    $.ajax({
        type: "POST",
        url: "backend/controller/platosController.php?f=showPlatosSlider2",
        success: function (data) {
            document.getElementById('contenedorOfertas').innerHTML = data;
        },
    });
    return false;
}
listarPlatos();

function llenarBanner() {
    $.ajax({
        type: "POST",
        url: "backend/controller/platosController.php?f=showPlatosBanner2",
        success: function (data) {
            document.getElementById('contenedorBanner').innerHTML = data;
        },
    });
    return false;
}
llenarBanner();

function llenarOfertas() {
    $.ajax({
        type: "POST",
        url: "backend/controller/platosController.php?f=showOfertas2",
        success: function (data) {
            document.getElementById('contenedorOfertas2').innerHTML = data;
        },
    });
    return false;
}
llenarOfertas();


//funcion para loguear
$(document).ready(function () {
    $("#btnLogin").click(function () {
        var datos = $("#frmLoginCliente").serialize();
        $.ajax({
            type: "POST",
            url: "backend/controller/clienteController.php?f=iniciarSesion",
            data: datos,
            success: function (e) {
                if (e == 1) {
                    Swal.fire("Listo", "¡Loguedao con exito!", "success");
                    window.location.href = "cliente";
                }else{
                    Swal.fire("Error", "¡Usuario o contraseñas incorrectos!", "error");
                }
            },
        });
        return false;
    });
});

//funcion para registrar cliente
$(document).ready(function () {
    $("#btnRegistrar").click(function () {
        var datos = $("#frmRegistrarCliente").serialize();
        $.ajax({
            type: "POST",
            url: "backend/controller/clienteController.php?f=addCliente",
            data: datos,
            success: function (e) {
                if (e == 1) {
                Swal.fire("Listo", "¡Su cuenta ah sido creada con exito!", "success");
                }else{
                    Swal.fire("Error", "¡Error al crear la cuenta!", "error");
                }
            },
        });
        return false;
    });
});

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



//funcion para registrar empleado
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
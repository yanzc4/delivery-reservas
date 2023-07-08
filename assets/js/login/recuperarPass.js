$(document).ready(function () {
    $("#btnRecuperar").click(function () {
        var datos = $("#frmRecuperar").serialize();
        $.ajax({
            type: "POST",
            url: "backend/controller/recuperarClienteController.php",
            data: datos,
            success: function (e) {
                if (e == 1) {
                Swal.fire("Listo", "¡Correo enviado!", "success");
                }else{
                Swal.fire("Error", "¡Correo No encontrado!", "error");
                }
            },
        });
        return false;
    });
});
function listarPlatos() {
    $.ajax({
        type: "POST",
        url: "../backend/controller/platosController.php?f=showPlatosSlider",
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
        url: "../backend/controller/platosController.php?f=showPlatosBanner",
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
        url: "../backend/controller/platosController.php?f=showOfertas",
        success: function (data) {
            document.getElementById('contenedorOfertas2').innerHTML = data;
        },
    });
    return false;
}
llenarOfertas();
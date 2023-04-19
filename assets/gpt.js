//funcion para insertar venta
$(document).ready(function () {
    $("#btn-pregunta").click(function () {
      var datos = $("#frmprompt").serialize();
      $.ajax({
        type: "POST",
        url: "backend/gpt.php",
        data: datos,
        success: function (r) {
          document.getElementById("respuesta").innerHTML = r;
          //document.getElementById("frmprompt").reset();
        },
      });
      return false;
    });
  });
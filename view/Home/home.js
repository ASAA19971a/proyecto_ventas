var id_usuario = $("#id_usuario_x").val();

$(document).ready(function () {
  // NOTE Total usuarios registrados
  $.post("../../controller/usuario.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotalUsuario").html(data.total);
  });

  // NOTE Total productos registrados
  $.post("../../controller/producto.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotalProducto").html(data.total);
  });
});

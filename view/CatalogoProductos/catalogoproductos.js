$(document).ready(function () {
  //llamar a controlador para select 2
  $.post("../../controller/producto.php?op=catalogo", function (data) {
    $("#productos").html(data);
    // console.log(data);
  });
});

function agregar(id_producto) {
  $.post(
    "../../controller/producto.php?op=mostrar",
    { id_producto: id_producto },

    function (data) {
      // console.log(data);
      data = JSON.parse(data);
      $("#id_producto").val(data.id_producto);

      $("#nombre_producto").html(data.nombre_prod);
      $("#descripcion_producto").html(data.descripcion_prod);
      $("#precio").html("$ " + data.precio);
      $("#stock").html(data.stock);
      $("#imagenCatalogo").attr(
        "src",
        "data:image/jpg;base64," + data.imagenCatalogo
      );
    }
  );
  $("#lbltitulo").html("Agregar Producto");
  $("#modalproducto").modal("show");
}

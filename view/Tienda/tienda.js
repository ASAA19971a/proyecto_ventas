$(document).ready(function () {
  //llama a funciion contar carrito
  count_carrito();

  // Enviar formulario
  $("#catalogo_form").on("submit", function (e) {
    carrito(e);
  });

  //Informacion para cargar productos de catalogo
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
      data = JSON.parse(data);
      // console.log(data);

      $("#id_producto").val(data.id_producto);
      $("#input_precio").val(data.precio);
      $("#input_nombre_prod").val(data.nombre_prod);
      $("#input_descripcion").val(data.descripcion_prod);
      $("#input_stock").val(data.stock);

      $("#nombre_producto").html(data.nombre_prod);
      $("#descripcion_producto").html(data.descripcion_prod);
      $("#precio").html("$ " + data.precio);
      $("#stock").html(data.stock);
      $("#cantidad").val(1);
      $("#imagenCatalogo").attr(
        "src",
        "data:image/jpg;base64," + data.imagenCatalogo
      );
      $("#cantidad").attr("max", data.stock);
    }
  );
  $("#lbltitulo").html("Agregar Producto");
  $("#modalproducto").modal("show");
}

function carrito(e) {
  e.preventDefault();
  var formData = new FormData($("#catalogo_form")[0]);
  $.ajax({
    url: "../../controller/carro.php?op=insertarCarro",
    method: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#modalproducto").modal("hide");
      count_carrito();
      // location.reload();
      Swal.fire({
        title: "Correcto!",
        text: "Se Registro Correctamente",
        icon: "success",
        confirmButtonText: "Aceptar",
      });
    },
  });
}

function count_carrito() {
  var parametros = {};

  $.ajax({
    data: parametros,
    type: "POST",
    url: "../../controller/carro.php?op=contarCarro",
    success: function (data) {
      // console.log(data);
      $("#cuenta_carro").html(data);
    },
  });
}

function verCarrito() {
  $("#modalcarrito").modal("show");
  var parametros = {};

  $.ajax({
    data: parametros,
    type: "POST",
    url: "../../controller/carro.php?op=consultarCarro",
    success: function (data) {
      // console.log(data);
      $("#mi_carrito").html(data);
    },
  });
}

function vaciarCarro() {
  var parametros = {};

  $.ajax({
    data: parametros,
    type: "POST",
    url: "../../controller/carro.php?op=vaciarCarro",
    success: function (data) {},
  });
  count_carrito();
  $("#modalcarrito").modal("hide");
  // location.reload();
}

var id_usuario = $("#id_usuario_x").val();

function init() {
  $("#producto_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#producto_form")[0]);
  $.ajax({
    url: "../../controller/producto.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#producto_data").DataTable().ajax.reload();
      $("#modalmantenimiento").modal("hide");

      Swal.fire({
        title: "Correcto!",
        text: "Se Registro Correctamente",
        icon: "success",
        confirmButtonText: "Aceptar",
      });
    },
  });
}

$(document).ready(function () {
  // inicializa Select 2
  $("#id_categoria").select2({
    dropdownParent: $("#modalmantenimiento"),
  });

  //llamar a controlador para select 2
  $.post("../../controller/categoria.php?op=combo", function (data) {
    $("#id_categoria").html(data);
    // console.log(data);
  });

  //llena datatable con opcion listar
  $("#producto_data").DataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../../controller/producto.php?op=listar",
      type: "post",
    },
    bDestroy: true,
    responsive: true,
    bInfo: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
});

function editar(id_producto) {
  $.post(
    "../../controller/producto.php?op=mostrar",
    { id_producto: id_producto },
    function (data) {
      data = JSON.parse(data);
      $("#id_producto").val(data.id_producto);
      $("#id_categoria").val(data.id_categoria);
      $("#nombre_prod").val(data.nombre_prod);
      $("#descripcion_prod").val(data.descripcion_prod);
      $("#precio").val(data.precio);
      $("#stock").val(data.stock);
      $("#imagen").val(data.imagen);
    }
  );
  $("#lbltitulo").html("Editar Registro");
  $("#modalmantenimiento").modal("show");
}

function eliminar(id_producto) {
  swal
    .fire({
      title: "Eliminar!",
      text: "Desea Eliminar el Registro?",
      icon: "error",
      confirmButtonText: "Si",
      showCancelButton: true,
      cancelButtonText: "No",
    })
    .then((result) => {
      if (result.value) {
        $.post(
          "../../controller/producto.php?op=eliminar",
          { id_producto: id_producto },
          function (data) {
            $("#producto_data").DataTable().ajax.reload();

            Swal.fire({
              title: "Correcto!",
              text: "Se Elimino Correctamente",
              icon: "success",
              confirmButtonText: "Aceptar",
            });
          }
        );
      }
    });
}

function nuevo() {
  $("#id_producto").val("");
  $("#id_categoria").val("").trigger("change");
  $("#lbltitulo").html("Nuevo Registro");
  $("#producto_form")[0].reset();
  $("#modalmantenimiento").modal("show");
}

init();

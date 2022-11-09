var id_usuario = $("#id_usuario_x").val();

function init() {
  $("#sucursal_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#sucursal_form")[0]);
  $.ajax({
    url: "../../controller/sucursal.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#sucursal_data").DataTable().ajax.reload();
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
  $("#sucursal_data").DataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../../controller/sucursal.php?op=listar",
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

function editar(id_sucursal) {
  $.post(
    "../../controller/sucursal.php?op=mostrar",
    { id_sucursal: id_sucursal },
    function (data) {
      data = JSON.parse(data);
      $("#id_sucursal").val(data.id_sucursal);
      $("#nombre_sucursal").val(data.nombre_sucursal);
      $("#direccion_sucursal").val(data.direccion_sucursal);
      $("#telefono_sucursal").val(data.telefono_sucursal);
    }
  );
  $("#lbltitulo").html("Editar Registro");
  $("#modalmantenimiento").modal("show");
}

function eliminar(id_sucursal) {
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
          "../../controller/sucursal.php?op=eliminar",
          { id_sucursal: id_sucursal },
          function (data) {
            $("#sucursal_data").DataTable().ajax.reload();

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
  $("#id_sucursal").val("");
  $("#lbltitulo").html("Nuevo Registro");
  $("#sucursal_form")[0].reset();
  $("#modalmantenimiento").modal("show");
}

init();

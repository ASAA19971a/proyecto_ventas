var usu_id = $("#id_usuario_x").val();

function init() {
  $("#usuario_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);
  $.ajax({
    url: "../../controller/usuario.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#usuario_data").DataTable().ajax.reload();
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
  $("#id_perfil").select2({
    dropdownParent: $("#modalmantenimiento"),
  });

  //llamar a controlador para select 2
  $.post("../../controller/perfil.php?op=combo", function (data) {
    $("#id_perfil").html(data);
    // console.log(data);
  });

  //llena datatable con opcion listar
  $("#usuario_data")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../../controller/usuario.php?op=listar",
        type: "post",
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 15, //Por cada 15 registros hace una paginación
      order: [[0, "desc"]], //Ordenar (columna,orden)
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
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
    })
    .DataTable();
});

//NOTE - Funcion Editar
function editar(id_usuario) {
  $.post(
    "../../controller/usuario.php?op=mostrar",
    { id_usuario: id_usuario },
    function (data) {
      data = JSON.parse(data);
      $("#id_usuario").val(data.id_usuario);
      $("#id_perfil").val(data.id_perfil).trigger("change");
      $("#usuario").val(data.usuario);
      $("#clave").val(data.clave);
      $("#cedula").val(data.cedula);
      $("#nombres").val(data.nombres);
      $("#apellidos").val(data.apellidos);
      $("#direccion").val(data.direccion);
      $("#correo").val(data.correo);
      $("#telefono").val(data.telefono);
    }
  );
  $("#lbltitulo").html("Editar Registro");
  $("#modalmantenimiento").modal("show");
}

//NOTE - Funcion Eliminar
function eliminar(id_usuario) {
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
          "../../controller/usuario.php?op=eliminar",
          { id_usuario: id_usuario },
          function (data) {
            $("#usuario_data").DataTable().ajax.reload();

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

// al dar click en btnnuevo restaura informacion
$(document).on("click", "#btnnuevo", function () {
  $("#id_usuario").val("");
  $("#id_perfil").val("").trigger("change");
  $("#mdltitulo").html("Nuevo Registro");
  $("#usuario_form")[0].reset();
  $("#modalmantenimiento").modal("show");
});
init();

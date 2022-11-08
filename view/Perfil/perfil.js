var id_usuario = $("#id_usuario_x").val();
$(document).ready(function () {
  $.post(
    "../../controller/usuario.php?op=mostrar",
    { id_usuario: id_usuario },
    function (data) {
      data = JSON.parse(data);
      //   console.log(data);
      $("#nombres").val(data.nombres);
      $("#apellidos").val(data.apellidos);
      $("#cedula").val(data.cedula);
      $("#correo").val(data.correo);
      $("#direccion").val(data.direccion);
      $("#telefono").val(data.telefono);
      $("#clave").val(data.clave);
      $("#usuario").val(data.usuario);
    }
  );
});

$(document).on("click", "#btnactualizar", function () {
  $.post(
    "../../controller/usuario.php?op=update_perfil",
    {
      /*  name $_POST[] /  */
      id_usuario: id_usuario,
      nombres: $("#nombres").val(),
      apellidos: $("#apellidos").val(),
      cedula: $("#cedula").val(),
      correo: $("#correo").val(),
      direccion: $("#direccion").val(),
      telefono: $("#telefono").val(),
      clave: $("#clave").val(),
    },
    function (data) {}
  );
  swal.fire({
    title: "Correcto",
    text: "Se actualizo correctamente.",
    icon: "success",
    confirmButtonText: "Aceptar",
  });
});

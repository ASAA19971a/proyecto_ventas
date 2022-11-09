$(document).ready(function () {
  //llamar a controlador para select 2
  $.post("../../controller/producto.php?op=catalogo", function (data) {
    $("#productos").html(data);
    // console.log(data);
  });
});

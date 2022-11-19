<?php
/* Llamamos al archivo de conexion.php */
require_once("../../config/conexion.php");
if (isset($_SESSION["id_usuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>
    <title>Empresa::Productos </title>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php require_once("../html/Preloader.php"); ?>

        <?php require_once("../html/MainHeaderCart.php"); ?>

        <?php require_once("../html/MainMenuCart.php"); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Catálogo de Productos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Catálogo</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="contianer-fluid">


                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Escoga los productos que desee adquirir. </h3>
                        </div>
                        <div class="card-body">
                            <div id="productos" class="text-center"></div>

                        </div>
                        <div class="card-footer">
                            <p>hola</p>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <?php require_once("modalproducto.php"); ?>
    <?php require_once("modalcarrito.php"); ?>
    <?php require_once("../html/MainJs.php"); ?>
    <script src="tienda.js"></script>

</body>

</html>
<?php
} else {
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>
<?php
/* Llamamos al archivo de conexion.php */
require_once("../../config/conexion.php");
if (isset($_SESSION["id_usuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>
    <title>Empresa::Categoria </title>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php require_once("../html/Preloader.php"); ?>


        <?php require_once("../html/MainHeader.php"); ?>

        <?php require_once("../html/MainMenu.php"); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Sucursal</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item">Mantenimientos</li>
                                <li class="breadcrumb-item active">Sucursal</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="contianer-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Información de Sucursal</h3> <br>
                            <button class="btn btn-outline-primary" id="btnnuevo" onclick="nuevo()">
                                <i class="fa fa-plus-square mg-r-10"></i> Nuevo Registro</button>
                        </div>
                        <div class="card-body">
                            <table id="sucursal_data" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Nombre Sucursal</th>
                                        <th class="wd-15p">Dirección Sucursal</th>
                                        <th class="wd-15p">Telefono Sucursal</th>
                                        <th class="wd-15p"></th>
                                        <th class="wd-20p"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->
    <?php require_once("modalmantenimiento.php"); ?>

    <?php require_once("../html/MainJs.php"); ?>
    <script src="adminmntsucursal.js"></script>
</body>

</html>
<?php
} else {
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>
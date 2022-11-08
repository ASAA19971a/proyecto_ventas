<?php
/* Llamamos al archivo de conexion.php */
require_once("../../config/conexion.php");
if (isset($_SESSION["id_usuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>
    <title>Empresa:: </title>
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
                            <h1> Pantalla Perfil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Perfil</li>
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
                            <h3 class="card-title"> Actualize sus datos</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Cédula: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="cedula" id="cedula"
                                            placeholder="Ingrese Cedula" maxlength="10"
                                            onkeypress="return soloNumeros(event)" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Nombres: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nombres" id="nombres"
                                            placeholder="Nombres">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Apellidos: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="apellidos" id="apellidos"
                                            placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Correo Electronico: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="correo" id="correo"
                                            placeholder="Ingrese Correo">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Teléfono: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="telefono" id="telefono"
                                            placeholder="Ingrese Telefono" onkeypress="return soloNumeros(event)"
                                            maxlength="10">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label class="form-control-label">Dirección: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="direccion" id="direccion"
                                            placeholder="Ingrese Direccion">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Usuario: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="usuario" id="usuario" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Contraseña: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="clave" id="clave"
                                            placeholder="Ingrese Contraseña">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-info" id="btnactualizar">Actualizar</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




    </div>
    <!-- ./wrapper -->

    <?php require_once("../html/MainJs.php"); ?>
    <script src="perfil.js"></script>

</body>

</html>
<?php
} else {
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>
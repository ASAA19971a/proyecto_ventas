<?php
require_once("../../config/conexion.php");

if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
    require_once("../../models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    $usuario->login();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>

    <title>Empresa | Log in</title>
</head>

<body class="hold-transition login-page bg-dark">
    <div class="login-box">
        <div class="login-logo ">
            <a href="../../index.php" class="text-white"><b>Empresa</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card rounded overflow-hidden">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>
                <!-- Capturando mensaje de error -->
                <?php
                if (isset($_GET["m"])) {
                    switch ($_GET["m"]) {
                        case "1";
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    Datos Incorrectos.
                </div>

                <?php
                            break;

                        case "2";
                        ?>

                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    Campos vacios.
                </div>
                <?php
                            break;
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" class="form-control" value="si">

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-2">
                    ¿No tienes Cuenta? <a href="registro.php" class="text-center">Registrate</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php require_once("../html/MainJs.php"); ?>

</body>

</html>
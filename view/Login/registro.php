<?php
require_once("../../config/conexion.php");

if (isset($_POST["registrar"]) and $_POST["registrar"] == "si") {
    require_once("../../models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    $usuario->registrar();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>

    <title>Empresa | Registrate</title>
</head>

<body class="hold-transition register-page bg-dark">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index.php" class="text-white"><b>Empresa</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrate</p>
                <!-- Capturando mensaje de error -->
                <?php
                if (isset($_GET["m"])) {
                    switch ($_GET["m"]) {
                        case "1";
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    Usuario ya existe
                </div>

                <?php
                            break;

                        case "2";
                        ?>

                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    Cedula ya registrada
                </div>
                <?php
                            break;
                        case "3";


                        ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Registrado!</h5>
                    Usuario Registrado Correctamente, Inicie Sesión.
                </div>
                <?php
                            break;
                    }
                }
                ?>


                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula"
                            onkeypress="return soloNumeros(event)" minlength="10" maxlength="10" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="nombres"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="apellidos"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="direccion"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="correo"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="telefono"
                            onkeypress="return soloNumeros(event)" minlength="10" maxlength="10" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="registrar" class="form-control" value="si">

                    <div class="row">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                    </div>
                </form>
                <p>
                    ¿Tienes una Cuenta?
                    <a href="index.php" class="text-center"> Inicia Sesión</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <?php require_once("../html/MainJs.php"); ?>

</body>

</html>
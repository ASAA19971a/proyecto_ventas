<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php
        if ($_SESSION["id_perfil"] == 2) {
        ?>
        <li class="nav-item">
            <a onclick="verCarrito()" class="nav-link">
                <i class="fa fa-shopping-cart"></i>
                <span id="cuenta_carro"></span>
            </a>
        </li>
        <?php
        }
        ?>


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown ">

            <a class="nav-link user-panel" data-toggle="dropdown" href="#">
                <img src="../../public/dist/img/avatar.png" class="img-circle mx-2" alt="User Image">
                <span class=""><?php echo $_SESSION["nombres"] . " " .  $_SESSION["apellidos"]; ?></span>
            </a>

            <input type="hidden" id="id_usuario_x" value="<?php echo $_SESSION["id_usuario"] ?>">
            <!-- identificador del usuario -->
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">

                <a href="../Perfil/" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i>Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="../html/Logout.php" class="dropdown-item">
                    <i class="fas fa-power-off mr-2"></i> Cerrar Sesion
                </a>

            </div>
        </li>


    </ul>
</nav>
<!-- /.navbar -->
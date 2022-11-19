<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php
    if ($_SESSION["id_perfil"] == 2) {

    ?>
    <a href="../UsuHome/" class="brand-link">
        <img src="../../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Empresa::</span>
    </a>
    <?php
    } else {
    ?>
    <a href="../Home/" class="brand-link">
        <img src="../../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Empresa::</span>
    </a>
    <?php
    }
    ?>
    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php
                if ($_SESSION["id_perfil"] == 2) {

                ?>
                <li class="nav-item">
                    <a href="../UsuHome/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="../Tienda/" class="nav-link">
                        <i class="nav-icon fas fa-images "></i>
                        <p>Catálogo de Productos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../Perfil/" class="nav-link">
                        <i class="nav-icon fas fa-history "></i>
                        <p>Historial de Compras</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a onclick="verCarrito()" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart "></i>
                        <p>Carrito de Compras</p>
                    </a>
                </li>

                <?php

                } else {
                ?>

                <li class="nav-item">
                    <a href="../Home/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-minus"></i>
                        <p>
                            Mantenimientos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../AdminMntUsuario/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../AdminMntPerfil/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perfil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../AdminMntCategoria/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categoria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../AdminMntProducto/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Producto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../AdminMntSucursal/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sucursal</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <?php
                }
                ?>



                <li class="nav-header">ACCIONES</li>
                <li class="nav-item">
                    <a href="../Perfil/" class="nav-link">
                        <i class="nav-icon fas fa-cog "></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../html/Logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p class="text">Cerrar Sesion</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
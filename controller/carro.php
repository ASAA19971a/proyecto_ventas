<?php
/*TODO: Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/*TODO: Llamando a la clase */
require_once("../models/Producto.php");


/*TODO: Opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "insertarCarro":
        //Inicia Carrito
        if (isset($_SESSION["carrito"]) || isset($_POST["input_nombre_prod"])) {
            if (isset($_SESSION["carrito"])) {
                $carrito_mio = $_SESSION["carrito"];
                if (isset($_POST["input_nombre_prod"])) {
                    $nombre = $_POST["input_nombre_prod"];
                    $descripcion = $_POST["input_descripcion"];
                    $precio = $_POST["input_precio"];
                    $cantidad = $_POST["cantidad"];
                    $id_producto = $_POST["id_producto"];
                    $bandera = -1;
                    if ($bandera != -1) {
                        $cuanto = $carrito_mio[$bandera]["cantidad"] + $cantidad;
                        $carrito_mio[$bandera] = array(
                            "titulo" => $nombre,
                            "precio" => $precio,
                            "cantidad" => $cantidad,
                            "id_producto" => $id_producto
                        );
                    } else {
                        $carrito_mio[] = array(
                            "titulo" => $nombre,
                            "precio" => $precio,
                            "cantidad" => $cantidad,
                            "id_producto" => $id_producto
                        );
                    }
                }
            } else { // en caso que no exista variable session
                $nombre = $_POST["input_nombre_prod"];
                $descripcion = $_POST["input_descripcion"];
                $precio = $_POST["input_precio"];
                $cantidad = $_POST["cantidad"];
                $id_producto = $_POST["id_producto"];
                $carrito_mio[] = array(
                    "titulo" => $nombre,
                    "precio" => $precio,
                    "cantidad" => $cantidad,
                    "id_producto" => $id_producto
                );
            }

            $_SESSION["carrito"] = $carrito_mio;
        }
        //fin caso
        break;

    case "contarCarro":

        $cantidad_final = 0;
        if (isset($_SESSION['carrito'])) {
            $carrito_mio = $_SESSION['carrito'];
        }

        if (isset($_SESSION['carrito'])) {

            $total = 0;

            for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                if (isset($carrito_mio[$i])) {
                    if ($carrito_mio[$i] != NULL) {
                        $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                        $cantidad_final += $carrito_mio[$i]['cantidad'];
                    }
                }
            }
        }

        if (!isset($total)) {
            $total = '0';
        } else {
            $total = $total;
        }

        echo $cantidad_final;

        break;

    case 'vaciarCarro':
        unset($_SESSION['carrito']);
        break;

    case 'consultarCarro':
        if (isset($_SESSION['carrito'])) {
            $carrito_mio = $_SESSION['carrito'];
        }

?>

<ul class="list-group mb-3">
    <?php
            if (isset($_SESSION['carrito'])) {
                $total = 0;
                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                    if (isset($carrito_mio[$i])) {
                        if ($carrito_mio[$i] != NULL) {
            ?>

    <li class="list-group-item justify-content-between px-4">
        <div class="row">
            <div class="col-10 p-0" style="text-align: left; color: #000000;">
                <h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> :
                    <?php echo $carrito_mio[$i]['titulo']; ?></h6>
            </div>
            <div class="col-2 p-0" style="text-align: right; color: #000000;">
                <span class="text-muted"
                    style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?>
                    €</span>
            </div>
        </div>
    </li>
    <?php
                            $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                        }
                    }
                }
            }
            ?>
    <li class="list-group-item d-flex justify-content-between">
        <span style="text-align: left; color: #000000;">Total (EUR)</span>
        <strong style="text-align: left; color: #000000;">
            <?php
                    if (isset($_SESSION['carrito'])) {
                        $total = 0;
                        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                            if (isset($carrito_mio[$i])) {
                                if ($carrito_mio[$i] != NULL) {
                                    $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                }
                            }
                        }
                    }
                    if (!isset($total)) {
                        $total = '0';
                    } else {
                        $total = $total;
                    }
                    echo $total; ?> €</strong>
    </li>
</ul>

<?php

        break;
}
?>
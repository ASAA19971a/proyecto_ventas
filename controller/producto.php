<?php
/*TODO: Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/*TODO: Llamando a la clase */
require_once("../models/Producto.php");
/*TODO: Inicializando Clase */
$producto = new Producto();

/*TODO: Opcion de solicitud de controller */
switch ($_GET["op"]) {

        /*TODO: Guardar y editar cuando se tenga el ID */
    case "guardaryeditar":
        $img = fopen($_FILES["imagen"]["tmp_name"], "rb");

        if (empty($_POST["id_producto"])) {
            $producto->insert_producto(
                $_POST["id_categoria"],
                $_POST["nombre_prod"],
                $_POST["descripcion_prod"],
                $_POST["precio"],
                $_POST["stock"],
                $img
            );
        } else {
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                // TODO  Linea codigo para guardar formato blob
                $img = fopen($_FILES["imagen"]["tmp_name"], "rb");

                $producto->update_producto_imagen(
                    $_POST["id_producto"],
                    $_POST["id_categoria"],
                    $_POST["nombre_prod"],
                    $_POST["descripcion_prod"],
                    $_POST["precio"],
                    $_POST["stock"],
                    $img
                );
            } else {
                $producto->update_producto(
                    $_POST["id_producto"],
                    $_POST["id_categoria"],
                    $_POST["nombre_prod"],
                    $_POST["descripcion_prod"],
                    $_POST["precio"],
                    $_POST["stock"]
                );
            }
        }
        break;

        /*TODO: Mostrar informacion campos */
    case "mostrar":
        $datos = $producto->get_producto_x_id($_POST["id_producto"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_producto"] = $row["id_producto"];
                $output["id_categoria"] = $row["id_categoria"];
                $output["nombre_prod"] = $row["nombre_prod"];
                $output["descripcion_prod"] = $row["descripcion_prod"];
                $output["precio"] = $row["precio"];
                $output["stock"] = $row["stock"];
                $output["imgEditar"] = '<img height="100px" width="100px" src="data:image/jpg;base64,' .  base64_encode($row["imagen"]) . '" />';
                $output["imagenCatalogo"] = base64_encode($row["imagen"]);
            }
            echo json_encode($output);
        }
        break;

        /*TODO: Eliminar segun ID */
    case "eliminar":
        $producto->delete_producto($_POST["id_producto"]);
        break;

        /*TODO:  Listar toda la informacion segun formato de datatable */
    case "listar":
        $datos = $producto->get_producto();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            // $sub_array[] = $row["nombre_categoria"];
            $sub_array[] = $row["nombre_prod"];
            $sub_array[] = $row["descripcion_prod"];
            $sub_array[] = $row["precio"];
            $sub_array[] = $row["stock"];
            $sub_array[] = '<img height="100px" width="100px" src="data:image/jpg;base64,' .  base64_encode($row["imagen"]) . '" />';
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_producto"] . ');"  id="' . $row["id_producto"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_producto"] . ');"  id="' . $row["id_producto"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

        /*TODO:  Opcion para mostrar combobox  */
    case "combo":
        $datos = $producto->get_producto();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = " <option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_producto'] . "'>" . $row['nombre_prod'] . "</option>";
            }
            echo $html;
        }
        break;

        // TOTAL PRODUCTOS
    case "total":
        $datos = $producto->get_total_productos();
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;


        // Catalogo Producto
    case "catalogo":
        $datos = $producto->get_producto();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = ' <div class="row"> ';
            foreach ($datos as $row) {
                $html .= '<div class="col-sm-6 col-md-4">
                                <div class="card">
                                    <h3 class="card-header">' . $row["nombre_prod"] . '</h3>
                                    <div class="card-body">
                                    <div class="img py-4">
                                        <img height="150px" width="150px" src="data:image/jpg;base64,' .  base64_encode($row["imagen"]) . '" />
                                    </div>
                                    
                                    <button type="button" onClick="agregar(' . $row["id_producto"] . ');" class="btn btn-success btn-block"><i class="fas fa-cart-plus mx-2"></i>Agregar</button>
                                    </div>
                                </div>
                          </div>';
            }

            $html .= '</div>';
            echo $html;
        }

        break;
}
<?php
/*TODO: Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/*TODO: Llamando a la clase */
require_once("../models/Categoria.php");
/*TODO: Inicializando Clase */
$categoria = new Categoria();

/*TODO: Opcion de solicitud de controller */
switch ($_GET["op"]) {

        /*TODO: Guardar y editar cuando se tenga el ID */
    case "guardaryeditar":
        if (empty($_POST["id_categoria"])) {
            $categoria->insert_categoria($_POST["nombre_categoria"]);
        } else {
            $categoria->update_categoria($_POST["id_categoria"], $_POST["nombre_categoria"]);
        }
        break;

        /*TODO: Mostrar informacion campos */
    case "mostrar":
        $datos = $categoria->get_categoria_x_id($_POST["id_categoria"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_categoria"] = $row["id_categoria"];
                $output["nombre_categoria"] = $row["nombre_categoria"];
            }
            echo json_encode($output);
        }
        break;

        /*TODO: Eliminar segun ID */
    case "eliminar":
        $categoria->delete_categoria($_POST["id_categoria"]);
        break;

        /*TODO:  Listar toda la informacion segun formato de datatable */
    case "listar":
        $datos = $categoria->get_categoria();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nombre_categoria"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_categoria"] . ');"  id="' . $row["id_categoria"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_categoria"] . ');"  id="' . $row["id_categoria"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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
        $datos = $categoria->get_categoria();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = " <option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_categoria'] . "'>" . $row['nombre_categoria'] . "</option>";
            }
            echo $html;
        }
        break;
}
<?php
/*TODO: Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/*TODO: Llamando a la clase */
require_once("../models/Perfil.php");
/*TODO: Inicializando Clase */
$perfil = new Perfil();

/*TODO: Opcion de solicitud de controller */
switch ($_GET["op"]) {

        /*TODO: Guardar y editar cuando se tenga el ID */
    case "guardaryeditar":
        if (empty($_POST["id_perfil"])) {
            $perfil->insert_perfil($_POST["nombre_perfil"]);
        } else {
            $perfil->update_perfil($_POST["id_perfil"], $_POST["nombre_perfil"]);
        }
        break;

        /*TODO: Mostrar informacion perfil */
    case "mostrar":
        $datos = $perfil->get_perfil_x_id($_POST["id_perfil"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_perfil"] = $row["id_perfil"];
                $output["nombre_perfil"] = $row["nombre_perfil"];
            }
            echo json_encode($output);
        }
        break;

        /*TODO: Eliminar segun ID */
    case "eliminar":
        $perfil->delete_perfil($_POST["id_perfil"]);
        break;

        /*TODO:  Listar toda la informacion segun formato de datatable */
    case "listar":
        $datos = $perfil->get_perfil();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nombre_perfil"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_perfil"] . ');"  id="' . $row["id_perfil"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_perfil"] . ');"  id="' . $row["id_perfil"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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

        /*TODO:  Listar toda la informacion segun formato de datatable */
    case "combo":
        $datos = $perfil->get_perfil();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = " <option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_perfil'] . "'>" . $row['nombre_perfil'] . "</option>";
            }
            echo $html;
        }
        break;
}
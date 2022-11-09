<?php
require_once("../config/conexion.php");
require_once("../models/Sucursal.php");

$sucursal = new Sucursal();

switch ($_GET["op"]) {

    case "guardaryeditar":

        if (empty($_POST["id_sucursal"])) {

            $sucursal->insert_sucursal($_POST["nombre_sucursal"], $_POST["direccion_sucursal"], $_POST["telefono_sucursal"]);
        } else {

            $sucursal->update_sucursal($_POST["id_sucursal"], $_POST["nombre_sucursal"], $_POST["direccion_sucursal"], $_POST["telefono_sucursal"]);
        }

        break;

    case "mostrar":

        $datos = $sucursal->get_sucursal_id($_POST["id_sucursal"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_sucursal"] = $row["id_sucursal"];
                $output["nombre_sucursal"] = $row["nombre_sucursal"];
                $output["direccion_sucursal"] = $row["direccion_sucursal"];
                $output["telefono_sucursal"] = $row["telefono_sucursal"];
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
        $sucursal->delete_sucursal($_POST["id_sucursal"]);
        break;

    case "listar":
        $datos = $sucursal->get_sucursal();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nombre_sucursal"];
            $sub_array[] = $row["direccion_sucursal"];
            $sub_array[] = $row["telefono_sucursal"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_sucursal"] . ');"  id="' . $row["id_sucursal"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_sucursal"] . ');"  id="' . $row["id_sucursal"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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

    case "total":

        $datos = $sucursal->get_total_sucursal();
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }

        break;


    case "combo":

        $datos = $sucursal->get_total_sucursal();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = " <option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_sucursal'] . "'>" . $row['nombre_sucursal'] . "</option>";
            }
            echo $html;
        }
        break;
}
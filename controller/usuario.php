<?php
/*TODO: Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/*TODO: Llamando a la clase */
require_once("../models/Usuario.php");
/*TODO: Inicializando Clase */
$usuario = new Usuario();

/*TODO: Opcion de solicitud de controller */
switch ($_GET["op"]) {

        /*TODO: Guardar o editar informacion usuario */
    case "guardaryeditar":

        $md5_clave = md5($_POST["clave"]);
        if (empty($_POST["id_usuario"])) {
            $usuario->insert_usuario(
                $_POST["usuario"],
                $md5_clave,
                $_POST["cedula"],
                $_POST["nombres"],
                $_POST["apellidos"],
                $_POST["direccion"],
                $_POST["correo"],
                $_POST["telefono"],
                $_POST["id_perfil"]
            );
        } else {
            $usuario->update_usuario(
                $_POST["id_usuario"],
                $md5_clave,
                $_POST["cedula"],
                $_POST["nombres"],
                $_POST["apellidos"],
                $_POST["direccion"],
                $_POST["correo"],
                $_POST["telefono"],
                $_POST["id_perfil"]
            );
        }
        break;

        /*TODO: Mostrar informacion usuario */
    case "mostrar":
        $datos = $usuario->get_usuario_x_id($_POST["id_usuario"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_usuario"] = $row["id_usuario"];
                $output["usuario"] = $row["usuario"];
                $output["clave"] = $row["clave"];
                $output["cedula"] = $row["cedula"];
                $output["nombres"] = $row["nombres"];
                $output["apellidos"] = $row["apellidos"];
                $output["direccion"] = $row["direccion"];
                $output["correo"] = $row["correo"];
                $output["telefono"] = $row["telefono"];
                $output["id_perfil"] = $row["id_perfil"];
            }
            echo json_encode($output);
        }
        break;

        /*TODO: Eliminar  usuario */
    case "eliminar":
        $usuario->delete_usuario($_POST["id_usuario"]);
        break;

        /*TODO: Listar informacion usuario */
    case "listar":
        $datos = $usuario->get_usuario();
        $data = array();
        foreach ($datos as $row) {
            //Columnas de DataTable para mostrar
            $sub_array = array();
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["nombre_perfil"];
            $sub_array[] = $row["cedula"];
            $sub_array[] = $row["nombres"];
            $sub_array[] = $row["apellidos"];
            $sub_array[] = $row["correo"];
            $sub_array[] = $row["telefono"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id_usuario"] . ');" id="' . $row["id_usuario"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id_usuario"] . ');" id="' . $row["id_usuario"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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


        /*TODO: Actualizar datos de perfil */
    case "update_perfil":
        $md5_clave = md5($_POST["clave"]);
        $usuario->update_usuario_perfil(
            $_POST["id_usuario"],
            $md5_clave,
            $_POST["cedula"],
            $_POST["nombres"],
            $_POST["apellidos"],
            $_POST["direccion"],
            $_POST["correo"],
            $_POST["telefono"]
        );

    case "total":
        $datos = $usuario->get_total_usuarios();
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;
}
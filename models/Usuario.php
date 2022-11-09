<?php
class Usuario extends Conectar
{
    /*TODO: Funcion para Login */
    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $md5_clave = md5($clave);

            if (empty($usuario) and empty($clave)) {
                /*TODO: En caso esten vacios usuario y contraseña, devolver al index con mensaje = 2 */
                header("Location:" . conectar::ruta() . "view/Login/index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuario WHERE usuario=? and clave=? and estado=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $usuario);
                $stmt->bindValue(2, $md5_clave);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["id_usuario"] = $resultado["id_usuario"];
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["cedula"] = $resultado["cedula"];
                    $_SESSION["nombres"] = $resultado["nombres"];
                    $_SESSION["apellidos"] = $resultado["apellidos"];
                    $_SESSION["correo"] = $resultado["correo"];
                    $_SESSION["id_perfil"] = $resultado["id_perfil"];

                    if ($_SESSION["id_perfil"] == 1 || $_SESSION["id_perfil"] == 3) {
                        /*TODO: Si todo esta correcto indexar en home */
                        header("Location:" . Conectar::ruta() . "view/Home/");
                        exit();
                    } else {
                        /*TODO: Si todo esta correcto indexar en home */
                        header("Location:" . Conectar::ruta() . "view/UsuHome/");
                        exit();
                    }
                } else {
                    /*TODO: En caso no coincidan el usuario o la contraseña */
                    header("Location:" . conectar::ruta() . "view/Login/index.php?m=1");
                    exit();
                }
            }
        }
    }

    /*TODO: Consular usuario por usuario */
    public function get_usuario()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * 
                FROM usuario
                INNER JOIN perfil on usuario.id_perfil = perfil.id_perfil
                WHERE estado=1";

        $stmt = $conectar->prepare($sql);

        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    /*TODO: Consular usuario por id */
    public function get_usuario_x_id($id_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE id_usuario=? and estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Consular usuario por usuario */
    public function get_usuario_x_user($usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE usuario=? and estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Consultar usuario por cedula */
    public function get_usuario_x_cedula($cedula)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE cedula=? and estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cedula);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Cantidad de  Usuarios */
    public function get_total_usuarios()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT count(*) as total FROM usuario WHERE estado=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Insertar usuario */
    public function insert_usuario($usuario, $clave, $cedula, $nombres, $apellidos, $direccion, $correo, $telefono, $id_perfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "ALTER TABLE usuario AUTO_INCREMENT=1;
                INSERT INTO usuario (usuario,clave,cedula,nombres,apellidos,direccion,correo,telefono,id_perfil,fecha_create,estado) VALUES (?,?,?,?,?,?,?,?,?,now(),1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $clave);
        $sql->bindValue(3, $cedula);
        $sql->bindValue(4, $nombres);
        $sql->bindValue(5, $apellidos);
        $sql->bindValue(6, $direccion);
        $sql->bindValue(7, $correo);
        $sql->bindValue(8, $telefono);
        $sql->bindValue(9, $id_perfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Actualizar usuario */
    public function update_usuario($id_usuario, $clave, $cedula, $nombres, $apellidos, $direccion, $correo, $telefono, $id_perfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario 
                SET
                    clave = ?,
                    cedula = ?,
                    nombres = ?,
                    apellidos = ?,
                    direccion = ?,
                    correo = ?,
                    telefono = ?,
                    id_perfil=?,
                    fecha_update=now()
                WHERE
                    id_usuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $clave);
        $sql->bindValue(2, $cedula);
        $sql->bindValue(3, $nombres);
        $sql->bindValue(4, $apellidos);
        $sql->bindValue(5, $direccion);
        $sql->bindValue(6, $correo);
        $sql->bindValue(7, $telefono);
        $sql->bindValue(8, $id_perfil);
        $sql->bindValue(9, $id_usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Borrar usuario */
    public function delete_usuario($id_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario 
                SET
                    fecha_delete=now(),
                    estado=0
                WHERE
                    id_usuario = ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_usuario);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    /*TODO: Actualizar la informacion del perfil del usuario segun usuario */
    public function update_usuario_perfil($id_usuario, $clave, $cedula, $nombres, $apellidos, $direccion, $correo, $telefono)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario 
             SET
                 clave = ?,
                 cedula = ?,
                 nombres = ?,
                 apellidos = ?,
                 direccion = ?,
                 correo = ?,
                 telefono = ?,
                 fecha_update=now()
             WHERE
                 id_usuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $clave);
        $sql->bindValue(2, $cedula);
        $sql->bindValue(3, $nombres);
        $sql->bindValue(4, $apellidos);
        $sql->bindValue(5, $direccion);
        $sql->bindValue(6, $correo);
        $sql->bindValue(7, $telefono);
        $sql->bindValue(8, $id_usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Funcion para registrar Cliente
    public function registrar()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["registrar"])) {


            $user = $_POST["usuario"];
            $clave = $_POST["clave"];
            $md5_clave = md5($clave);
            $cedula = $_POST["cedula"];
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $id_perfil = 2;

            $stmt = "SELECT * FROM usuario WHERE usuario=? and estado=1";
            $stmt = $conectar->prepare($stmt);
            $stmt->bindValue(1, $user);
            $stmt->execute();
            $resultado_usuario = $stmt->fetch();
            if (is_array($resultado_usuario) and count($resultado_usuario) > 0) {
                header("Location:" . conectar::ruta() . "view/Login/registro.php?m=1");
                exit();
            } else {
                $stmt = "SELECT * FROM usuario WHERE cedula=? and estado=1";
                $stmt = $conectar->prepare($stmt);
                $stmt->bindValue(1, $cedula);
                $stmt->execute();
                $resultado_cedula = $stmt->fetch();
                if (is_array($resultado_cedula) and count($resultado_cedula) > 0) {
                    header("Location:" . conectar::ruta() . "view/Login/registro.php?m=2");
                    exit();
                } else {
                    Usuario::insert_usuario($user, $md5_clave, $cedula, $nombres, $apellidos, $direccion, $correo, $telefono, $id_perfil);
                    header("Location:" . conectar::ruta() . "view/Login/registro.php?m=3");
                    exit();
                }
            }
        }
    }
}
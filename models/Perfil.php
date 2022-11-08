<?php
class Perfil extends Conectar
{
    /*TODO: Consular Perfil por id */
    public function get_perfil()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * 
                FROM perfil";

        $stmt = $conectar->prepare($sql);

        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    /*TODO: Consular Perfil por id */
    public function get_perfil_x_id($id_oerfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM perfil WHERE id_perfil=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_oerfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Insertar perfil */
    public function insert_perfil($nombre_perfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "ALTER TABLE perfil AUTO_INCREMENT=1;
                INSERT INTO perfil (nombre_perfil) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_perfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Actualizar perfil */
    public function update_perfil($id_perfil, $nombre_perfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE perfil 
                SET
                    nombre_perfil = ?            
                WHERE
                    id_perfil = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_perfil);
        $sql->bindValue(2, $id_perfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Borrar perfil */
    public function delete_perfil($id_perfil)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM perfil
                WHERE id_perfil = ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_perfil);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
}
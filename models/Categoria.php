<?php
class Categoria extends Conectar
{
    /*TODO: Consular Categoria  */
    public function get_categoria()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * 
                FROM categoria
                WHERE estado = 1";

        $stmt = $conectar->prepare($sql);

        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    /*TODO: Consular Categoria por id */
    public function get_categoria_x_id($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categoria WHERE id_categoria=? and estado=1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Insertar categoria */
    public function insert_categoria($nombre_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "ALTER TABLE categoria AUTO_INCREMENT=1;
                INSERT INTO categoria (nombre_categoria, fecha_create, estado) VALUES (?, now(), 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Actualizar categoria */
    public function update_categoria($id_categoria, $nombre_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE categoria 
                SET
                    nombre_categoria = ?,
                    fecha_update=now()            
                WHERE
                    id_categoria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_categoria);
        $sql->bindValue(2, $id_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Borrar categoria */
    public function delete_categoria($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE categoria 
                SET
                    fecha_delete=now(),
                    estado = 0            
                WHERE
                    id_categoria = ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_categoria);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
}
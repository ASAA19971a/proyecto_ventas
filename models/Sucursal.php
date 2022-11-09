<?php
class Sucursal extends Conectar
{

    public function get_sucursal()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * 
                FROM sucursal
                WHERE estado = 1";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_sucursal_id($id_sucursal)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * 
                FROM sucursal
                WHERE 
                    id_sucursal=? and    
                    estado = 1";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_sucursal);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_total_sucursal()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT count(*) as total 
                FROM sucursal
                WHERE estado = 1";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_sucursal($nombre_sucursal, $direccion_sucursal, $telefono_sucursal)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "ALTER TABLE sucursal AUTO_INCREMENT=1;
                INSERT INTO sucursal 
                (nombre_sucursal,
                direccion_sucursal,
                telefono_sucursal,
                fecha_create,
                estado)
                VALUES
                (?,?,?,now(),1);";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_sucursal);
        $sql->bindValue(2, $direccion_sucursal);
        $sql->bindValue(3, $telefono_sucursal);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_sucursal($id_sucursal, $nombre_sucursal, $direccion_sucursal, $telefono_sucursal)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE sucursal 
                SET
                    nombre_sucursal = ?,
                    direccion_sucursal = ?,
                    telefono_sucursal = ?,
                    fecha_update = now()
                WHERE
                    id_sucursal = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_sucursal);
        $sql->bindValue(2, $direccion_sucursal);
        $sql->bindValue(3, $telefono_sucursal);
        $sql->bindValue(4, $id_sucursal);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_sucursal($id_sucursal)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE sucursal 
                SET
                    fecha_delete = now(),
                    estado = 0
                WHERE
                    id_sucursal = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_sucursal);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
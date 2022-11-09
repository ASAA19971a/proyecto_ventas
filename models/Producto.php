<?php
class Producto extends Conectar
{

    /*TODO: Consular Producto  */
    public function get_producto()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    producto.id_producto,
                    producto.id_categoria,
                    categoria.nombre_categoria,
                    producto.nombre_prod,
                    producto.descripcion_prod,
                    producto.precio,
                    producto.stock,
                    producto.imagen,
                    producto.estado
                FROM producto
                INNER JOIN categoria on producto.id_categoria = categoria.id_categoria
                WHERE producto.estado=1";

        $stmt = $conectar->prepare($sql);

        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    /*TODO: Consular Producto por id */
    public function get_producto_x_id($id_producto)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    producto.id_producto,
                    producto.id_categoria,
                    categoria.nombre_categoria,
                    producto.nombre_prod,
                    producto.descripcion_prod,
                    producto.precio,
                    producto.stock,
                    producto.imagen,
                    producto.estado
                FROM producto
                INNER JOIN categoria on producto.id_categoria = categoria.id_categoria
                WHERE producto.id_producto = ? and producto.estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Cantidad Productos */
    public function get_total_productos()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT count(*) as total FROM producto WHERE estado=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Insertar Producto */
    public function insert_producto($id_categoria, $nombre_prod, $descripcion_prod, $precio, $stock, $imagen)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "ALTER TABLE producto AUTO_INCREMENT=1;
                INSERT INTO producto (id_categoria, nombre_prod, descripcion_prod, precio, stock, imagen, fecha_create, estado) VALUES (?, ?, ?, ?, ?, ?, now(), 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_categoria);
        $sql->bindValue(2, $nombre_prod);
        $sql->bindValue(3, $descripcion_prod);
        $sql->bindValue(4, $precio);
        $sql->bindValue(5, $stock);
        $sql->bindValue(6, $imagen, PDO::PARAM_LOB);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    /*TODO: Actualizar Producto */
    public function update_producto($id_producto, $id_categoria, $nombre_prod, $descripcion_prod, $precio, $stock)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE producto 
                SET
                    id_categoria = ?,
                    nombre_prod = ?,
                    descripcion_prod = ?,
                    precio = ?,
                    stock = ?,
                    fecha_update=now()            
                WHERE
                    id_producto = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_categoria);
        $sql->bindValue(2, $nombre_prod);
        $sql->bindValue(3, $descripcion_prod);
        $sql->bindValue(4, $precio);
        $sql->bindValue(5, $stock);
        $sql->bindValue(6, $id_producto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Actualizar Producto con imagen */
    public function update_producto_imagen($id_producto, $id_categoria, $nombre_prod, $descripcion_prod, $precio, $stock, $imagen)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE producto 
                SET
                    id_categoria = ?,
                    nombre_prod = ?,
                    descripcion_prod = ?,
                    precio = ?,
                    stock = ?,
                    imagen = ?,
                    fecha_update=now()            
                WHERE
                    id_producto = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_categoria);
        $sql->bindValue(2, $nombre_prod);
        $sql->bindValue(3, $descripcion_prod);
        $sql->bindValue(4, $precio);
        $sql->bindValue(5, $stock);
        $sql->bindValue(6, $imagen, PDO::PARAM_LOB);
        $sql->bindValue(7, $id_producto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /*TODO: Borrar Producto */
    public function delete_producto($id_producto)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE producto 
                SET
                    fecha_delete=now(),
                    estado = 0            
                WHERE
                    id_producto = ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_producto);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
}
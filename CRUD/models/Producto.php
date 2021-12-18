<?php
include_once("../conexion.php");
class Producto{

    public static function crear($nombre, $precio, $stock){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "INSERT INTO producto (nombre, precio, stock) VALUES (?,?,?)";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($nombre, $precio, $stock));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }

    public static function getProductos(){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM producto";
            $sql = $conexionBD->prepare($query);
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getProducto($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM producto WHERE id_producto = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function editar($id, $nombre, $precio, $stock){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "UPDATE producto SET nombre = ?, precio = ?, stock = ? WHERE id_producto = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($nombre, $precio, $stock, $id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }

    public static function eliminar($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = ("DELETE FROM producto WHERE id_producto = ?");
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }
}
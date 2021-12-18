<?php
include_once (__DIR__  . "/../conexion.php");
include_once(__DIR__  . "/Producto.php");
include_once(__DIR__  . "/Cliente.php");
class Venta
{
    public static function crear($importe_total, $producto_id, $cliente_id, $stock_vendido){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "INSERT INTO venta (importe_total, producto_id, cliente_id, stock_vendido) VALUES (?, ?, ?, ?)";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($importe_total, $producto_id, $cliente_id, $stock_vendido));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }    
    }

    public static function editar($id, $importe_total, $producto_id, $cliente_id, $stock_vendido){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "UPDATE venta SET importe_total = ?, producto_id = ?, cliente_id = ?, stock_vendido = ? WHERE id_venta = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($importe_total, $producto_id, $cliente_id, $stock_vendido, $id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }    
    }

    public static function getVentas(){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM venta";
            $sql = $conexionBD->prepare($query);
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getVenta($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM venta WHERE id_venta = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getProducto($id){
        try{
            $venta = Venta::getVenta($id);
            return Producto::getProducto($venta["producto_id"]);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getCliente($id){
        try{
            $venta = Venta::getVenta($id);
            return Cliente::getCliente($venta["cliente_id"]);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function eliminar($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "DELETE FROM venta WHERE id_venta = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }
}
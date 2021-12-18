<?php
include_once (__DIR__  . "/../conexion.php");
class Cliente
{
    public static function crear($nombre, $dni){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "INSERT INTO cliente (nombre, dni) VALUES (?,?)";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($nombre, $dni));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }

    public static function getClientes(){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM cliente";
            $sql = $conexionBD->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getCliente($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM cliente WHERE id_cliente = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function getVentas($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "SELECT * FROM venta WHERE cliente_id = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
            return array();
        }
    }

    public static function editar($id, $nombre, $dni){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "UPDATE cliente SET nombre = ?, dni = ? WHERE id_cliente = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($nombre, $dni, $id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }

    public static function eliminar($id){
        try{
            $conexionBD = Conexion::getConexion();
            $query = "DELETE FROM cliente WHERE id_cliente = ?";
            $sql = $conexionBD->prepare($query);
            $sql->execute(array($id));
        } catch (Exception $e){
            echo("Ha ocurrido un error " . $e);
        }
    }
}
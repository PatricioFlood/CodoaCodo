<?php
require_once(__DIR__  . "/../models/Venta.php");
require_once(__DIR__  . "/../models/Producto.php");
if(isset($_POST)){
    $producto_id = $_POST["producto_id"];
    $cliente_id = $_POST["cliente_id"];
    $stock_vendido = $_POST["stock_vendido"];
    $producto = Producto::getProducto($producto_id);
    $precio = $producto["precio"];
    $importe_total = $precio * $stock_vendido;
    Venta::editar($_POST["id"], $importe_total, $producto_id, $cliente_id, $stock_vendido);
    header("Location: /views/viewVentas.php");
} else {
    echo("Error en el envio de formulario");
}

?>
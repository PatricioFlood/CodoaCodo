<?php
include_once("conexion.php");
require_once("models/Venta.php");
require_once("models/Producto.php");
if(isset($_POST)){
    $producto_id = $_POST["producto_id"];
    $cliente_id = $_POST["cliente_id"];
    $stock_vendido = $_POST["stock_vendido"];
    $producto = Producto::getProducto($producto_id);
    $precio = $producto["precio"];
    $stock = $producto["stock"];
    if($stock >= $stock_vendido){
        $importe_total = $precio * $stock_vendido;
        Venta::crear($importe_total, $producto_id, $cliente_id, $stock_vendido);
        Producto::editar($producto_id, $producto["nombre"], $precio, ($stock - $stock_vendido));
        header("Location: /views/viewVentas.php");
    }
    else{
        echo("El stock solicitado es mayor al stock del producto"); 
    }
} else {
    echo("Error en el envio de formulario");
}

?>
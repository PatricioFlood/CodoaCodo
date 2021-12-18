<?php
include_once("conexion.php");
require_once("models/Producto.php");
if(isset($_GET)){
    Producto::eliminar($_GET["id"]);
    header("Location: /views/viewProductos.php");
} else {
    echo("Error en el envio de formulario");
}

?>
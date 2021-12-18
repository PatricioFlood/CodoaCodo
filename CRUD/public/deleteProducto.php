<?php
require_once(__DIR__  . "/../models/Producto.php");
if(isset($_GET)){
    Producto::eliminar($_GET["id"]);
    header("Location: /views/viewProductos.php");
} else {
    echo("Error en el envio de formulario");
}

?>
<?php
require_once(__DIR__  . "/../models/Producto.php");
if(isset($_POST)){
    Producto::editar($_POST["id"], $_POST["nombre"], $_POST["precio"], $_POST["stock"]);
    header("Location: /views/viewProductos.php");
} else {
    echo("Error en el envio de formulario");
}

?>
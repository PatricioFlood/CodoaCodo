<?php
include_once("conexion.php");
require_once("models/Venta.php");
if(isset($_GET)){
    Venta::eliminar($_GET["id"]);
    header("Location: /views/viewVentas.php");
} else {
    echo("Error en el envio de formulario");
}

?>
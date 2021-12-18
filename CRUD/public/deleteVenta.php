<?php
require_once(__DIR__  . "/../models/Venta.php");
if(isset($_GET)){
    Venta::eliminar($_GET["id"]);
    header("Location: /views/viewVentas.php");
} else {
    echo("Error en el envio de formulario");
}

?>
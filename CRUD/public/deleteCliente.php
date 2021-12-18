<?php
require_once(__DIR__  . "/../models/Cliente.php");
if(isset($_GET)){
    Cliente::eliminar($_GET["id"]);
    header("Location: /views/viewClientes.php");
} else {
    echo("Error en el envio de formulario");
}

?>
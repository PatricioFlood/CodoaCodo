<?php
include_once("conexion.php");
require_once("models/Cliente.php");
if(isset($_POST)){
    Cliente::editar($_POST["id"], $_POST["nombre"], $_POST["dni"]);
    header("Location: /views/viewClientes.php");
} else {
    echo("Error en el envio de formulario");
}

?>
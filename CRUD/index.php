<?php
require_once("views/templates/templateHeader.php");
?>

    <div class="container p-4">
        <h1>Sistema de Ventas</h1>
        <div class="mt-4">
            <a href="views/viewProductos.php" type="button" class="btn btn-primary">Productos</a>
            <a href="views/viewClientes.php" type="button" class="mx-2 btn btn-secondary">Clientes</a>
            <a href="views/viewVentas.php" type="button" class="btn btn-success">Ventas</a>
        </div>   
        <div class="mt-4"> 
            <a href="views/viewVentas.php" type="button" class="btn btn-info">Código en Github</a>
        </div>
    </div>

<?php
require_once("views/templates/templateFooter.php");
?>
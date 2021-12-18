<?php
require_once("templates/templateHeader.php");
?>
    <div class="container py-4">
        <h1>Crear Cliente</h1>

        <form action="../createCliente.php" method="post">
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">DNI</span>
                <input type="number" class="form-control" name="dni" required>
            </div>
            <button class="btn btn-primary">Crear</button>
            <a href="viewClientes.php" class="btn btn-danger">Cancelar</a>
        </form>

    </div>

<?php
require_once("templates/templateFooter.php");
?>
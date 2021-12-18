<?php
require_once("templates/templateHeader.php");
require_once("../models/Cliente.php");
$cliente = Cliente::getCliente($_GET["id"]);
?>
    <div class="container py-4">
        <h1>Editar Cliente</h1>

        <form action="../editCliente.php" method="post">
            <input type="number" name="id" value=<?= $_GET["id"] ?> hidden>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                <input type="text" class="form-control" name="nombre"  value="<?= $cliente["nombre"] ?>" required>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">DNI</span>
                <input type="number" class="form-control" name="dni" value=<?= $cliente["dni"] ?> required>
            </div>
            <button class="btn btn-primary">Guardar Cambios</button>
            <a href="viewClientes.php" class="btn btn-danger">Cancelar</a>
        </form>

    </div>

<?php
require_once("templates/templateFooter.php");
?>
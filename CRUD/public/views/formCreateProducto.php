<?php
require_once("templates/templateHeader.php");
?>
    <div class="container py-4">
        <h1>Crear Producto</h1>

        <form action="../createProducto.php" method="post">
        <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="my-3 input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Precio</span>
                <span class="input-group-text" id="addon-wrapping">$</span>
                <input type="number" class="form-control" name="precio" required>
            </div>
            <div class="my-3 input-group">
            <span class="input-group-text" id="addon-wrapping">Stock</span>
                <input type="number" class="form-control" name="stock">
            </div>
            <button class="btn btn-primary">Crear</button>
            <a href="viewProductos.php" class="btn btn-danger">Cancelar</a>
        </form>

    </div>

<?php
require_once("templates/templateFooter.php");
?>
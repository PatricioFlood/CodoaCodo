<?php
require_once("templates/templateHeader.php");
require_once("../models/Producto.php");
$producto = Producto::getProducto($_GET["id"]);
?>
    <div class="container py-4">
        <h1>Editar Producto</h1>

        <form action="../editProducto.php" method="post">
            <input type="number" name="id" value=<?php echo($_GET["id"]) ?> hidden>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                <input type="text" class="form-control" name="nombre" value="<?= $producto["nombre"] ?>" required>
            </div>
            <div class="my-3 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Precio</span>
                <span class="input-group-text" id="addon-wrapping">$</span>
                <input type="number" class="form-control" name="precio" value=<?= $producto["precio"] ?> required>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Stock</span>
                <input type="number" class="form-control" name="stock" value=<?= $producto["stock"] ?>>
            </div>
            <button class="btn btn-primary">Guardar Cambios</button>
            <a href="viewProductos.php" class="btn btn-danger">Cancelar</a>
        </form>

    </div>

<?php
require_once("templates/templateFooter.php");
?>
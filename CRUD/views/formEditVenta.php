<?php
require_once("templates/templateHeader.php");
require_once("../models/Producto.php");
require_once("../models/Cliente.php");
require_once("../models/Venta.php");
$clientes = Cliente::getClientes();
$productos = Producto::getProductos();
$venta = Venta::getVenta($_GET["id"]);
?>
    <div class="container py-4">
        <h1>Editar Venta</h1>

        <form action="../editVenta.php" method="post">
            <input type="number" name="id" value=<?= $_GET["id"] ?> hidden>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Cliente</span>
                <select class="form-select" name="cliente_id" required>
                    <?php 
                        foreach($clientes as $cliente){
                            $id = $cliente["id_cliente"];
                            $nombre = $cliente["nombre"];
                            echo('<option value="' . $id . '"');
                            if($id == $venta["cliente_id"]){
                                echo('selected');
                            }
                            echo('>' . $nombre . ' (#' . $id .  ')</option>');
                        } 
                    ?>
                </select>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Producto</span>
                <select class="form-select" name="producto_id" id="producto_id" required>
                    <?php foreach($productos as $producto): 
                        $id = $producto["id_producto"];
                        $nombre = $producto["nombre"];
                        $precio = $producto["precio"];
                        $stock = $producto["stock"];
                    ?>
                        <option value=<?= $id ?> data-stock="<?= $stock ?>" data-precio="<?= $precio ?>"
                        <?php if($id == $venta["producto_id"]) echo('selected'); ?>
                        ><?= $nombre ?> (#<?= $id ?>) - $ <?= $precio ?> - Stock: <?= $stock ?> </option>
                    
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Cantidad</span>
                <input type="number" class="form-control" name="stock_vendido" id="cantidad" value=<?php echo($venta["stock_vendido"])?> min="1">
            </div>
            <div class="my-3 input-group">
            <span class="input-group-text" id="addon-wrapping">Importe Total</span>
                <span class="input-group-text" id="addon-wrapping">$</span>
                <input type="number" class="form-control" value="<?= $venta['importe_total'] ?>" id="precioTotal" min="1" max="1" disabled readonly>
            </div>
            <button class="btn btn-primary">Guardar Cambios</button>
            <a href="viewVentas.php" class="btn btn-danger">Cancelar</a>
        </form>

    </div>

    <script>
        const select = document.querySelector('#producto_id')
        const precioTotal = document.querySelector('#precioTotal')
        const cantidad = document.querySelector('#cantidad')
        select.addEventListener('change', e => changeTotal())
        cantidad.addEventListener('change', e => changeTotal())
        const changeTotal = () => {
            const producto = select.options[select.selectedIndex]
            cantidad.setAttribute('max', parseInt(producto.dataset.stock))
            const precio = producto.dataset.precio
            precioTotal.value = parseFloat(precio) * parseInt(cantidad.value)
        }
    </script>

<?php
require_once("templates/templateFooter.php");
?>
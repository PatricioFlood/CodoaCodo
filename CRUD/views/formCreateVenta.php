<?php
require_once("templates/templateHeader.php");
require_once("../models/Producto.php");
require_once("../models/Cliente.php");
$clientes = Cliente::getClientes();
$productos = Producto::getProductos();
?>
    <div class="container py-4">
        <h1>Crear Venta</h1>

        <form action="../createVenta.php" method="post">
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Cliente</span>
                <select class="form-select" name="cliente_id" required>
                    <option selected value="">Seleccionar</option>
                    <?php foreach($clientes as $cliente):
                            $id = $cliente["id_cliente"];
                            $nombre = $cliente["nombre"];
                    ?>
                        <option value="<?= $id ?>"><?= $nombre ?> (#<?= $id ?>)</option>
                    
                    <?php endforeach ?>
                </select>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Producto</span>
                <select class="form-select" name="producto_id" id="producto_id" required>
                    <option selected value="">Seleccionar</option>
                    <?php foreach($productos as $producto):
                        $id = $producto["id_producto"];
                        $nombre = $producto["nombre"];
                        $precio = $producto["precio"];
                        $stock = $producto["stock"];
                    ?>
                    <option value="<?= $id ?>" data-stock="<?= $stock ?>" data-precio="<?= $precio ?>"><?= $nombre ?> (#<?= $id ?>) - $<?= $precio ?> - Stock: <?= $stock ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="my-3 input-group">
                <span class="input-group-text" id="addon-wrapping">Cantidad</span>
                <input type="number" class="form-control" value="1" name="stock_vendido" id="cantidad" min="1" max="1">
            </div>
            <div class="my-3 input-group">
            <span class="input-group-text" id="addon-wrapping">Importe Total</span>
                <span class="input-group-text" id="addon-wrapping">$</span>
                <input type="number" class="form-control" value="" id="precioTotal" min="1" max="1" disabled readonly>
            </div>
            <button class="btn btn-primary">Crear</button>
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
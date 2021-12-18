<?php
require_once("templates/templateHeader.php");
require_once("../../models/Venta.php");
$ventas = Venta::getVentas();
?>
    <div class="container py-4">
        <h1>Ventas</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Importe</th>
                <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($ventas as $venta){
                    $id = $venta["id_venta"];
                    $producto = Venta::getProducto($id);
                    $cliente = Venta::getCliente($id);
                    echo(
                        '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $cliente["nombre"] . '</td>
                        <td>' . $producto["nombre"] . '</td>
                        <td>' . $venta["stock_vendido"] . '</td>
                        <td>$' . $venta["importe_total"] . '</td>
                        <td>' . $venta["fecha"] . '</td>
                        <td><a href="formEditVenta.php?id=' . $id . '" class="material-icons edit">edit</a></td>
                        <td><a href="../deleteVenta.php?id=' . $id . '" class="material-icons delete">delete</a></td>
                        </tr>'
                    );
                }
                ?>
            </tbody>
        </table>
        <a href="formCreateVenta.php" class="btn btn-success">Crear Venta</a>
        <a href="../" class="btn btn-warning">Volver</a>
    </div>

<?php
require_once("templates/templateFooter.php");
?>
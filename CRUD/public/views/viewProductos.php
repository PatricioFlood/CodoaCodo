<?php
require_once("templates/templateHeader.php");
require_once("../../models/Producto.php");
$productos = Producto::getProductos();
?>
    <div class="container py-4">
        <h1>Mis Productos</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($productos as $producto){
                    $id = $producto["id_producto"];
                    echo(
                        '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $producto["nombre"] . '</td>
                        <td>$' . $producto["precio"] . '</td>
                        <td>' . $producto["stock"] . '</td>
                        <td><a href="formEditProducto.php?id=' . $id . '" class="material-icons edit">edit</a></td>
                        <td><a href="../deleteProducto.php?id=' . $id . '" class="material-icons delete">delete</a></td>
                        </tr>'
                    );
                }
                ?>
            </tbody>
        </table>
        <a href="formCreateProducto.php" class="btn btn-success">Crear Producto</a>
        <a href="../" class="btn btn-warning">Volver</a>
    </div>

<?php
require_once("templates/templateFooter.php");
?>
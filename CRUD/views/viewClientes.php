<?php
require_once("templates/templateHeader.php");
require_once("../models/Cliente.php");
$clientes = Cliente::getClientes();
?>
    <div class="container py-4">
        <h1>Clientes</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($clientes as $cliente){
                    $id = $cliente["id_cliente"];
                    echo(
                        '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $cliente["nombre"] . '</td>
                        <td>' . $cliente["dni"] . '</td>
                        <td><a href="formEditCliente.php?id=' . $id . '" class="material-icons edit">edit</a></td>
                        <td><a href="../deleteCliente.php?id=' . $id . '" class="material-icons delete">delete</a></td>
                        </tr>'
                    );
                }
                ?>
            </tbody>
        </table>
        <a href="formCreateCliente.php" class="btn btn-success">Crear Cliente</a>
        <a href="../" class="btn btn-warning">Volver</a>
    </div>

<?php
require_once("templates/templateFooter.php");
?>
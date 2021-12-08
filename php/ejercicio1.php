<?php 

$nombre = "Patricio";
$apellido = "Flood";
$edad = 22;
$editorDeCodigoPreferido = "VSCode";
$SistemaOperativoUtilizado = "Windows";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codo A Codo</title>
</head>
<body>
    <p>Nombre: <?php echo($nombre) ?> </p>
    <p>Apellido: <?php echo($apellido) ?> </p>
    <p>Edad: <?php echo($edad) ?> </p>
    <p>Editor de Código Preferido: <?php echo($editorDeCodigoPreferido) ?> </p>
    <p>Sistema Operativo Utilizado: <?php echo($SistemaOperativoUtilizado) ?> </p>
</body>
</html>


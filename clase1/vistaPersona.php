<?php
    require '../config/config.php';
    require 'Persona.php';
    // instanciamos objeto de tipo Persona
    $Persona = new Persona;
    $Persona->setNombre('Rick');
    $Persona->setApellido('Sanchez');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?= mostrar($Persona) ?>
    <h1>VistaPersona</h1>
    <div class="objeto">
        <?= $Persona->verDatos(); ?>
    </div>

</body>
</html>

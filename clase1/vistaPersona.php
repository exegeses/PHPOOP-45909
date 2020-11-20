<?php
    require 'Persona.php';
    // instanciamos objeto de tipo Persona
    $Persona = new Persona;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>VistaPersona</h1>
    <div class="objeto">
        <?= $Persona->verDatos(); ?>
    </div>

</body>
</html>

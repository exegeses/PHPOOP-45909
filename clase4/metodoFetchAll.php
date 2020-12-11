<?php
    require '../config/config.php';

    $link = new PDO(
        'mysql:host=localhost;dbname=agencia',
        'root',
        'root'
    );
    $sql = "SELECT regID, regNombre
                FROM regiones";
    $stmt = $link->prepare($sql);
    $stmt->execute();

    /* para traer registros tenemos dos métodos
        método  fetch()   que trae 1 sólo registro
        método  fetchAll()   que trae TODOS los registros
    */
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
    mostrar($lista);


    $stmt->execute();
    $regiones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //mostrar($regiones);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de regiones</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
        <h1>Listado de regiones</h1>

        <ul>
<?php
        foreach ( $regiones as $region ){
?>
            <li>
                <?= $region['regID'] ?>
                <?= $region['regNombre'] ?>
            </li>
<?php
        }
?>
        </ul>

</body>
</html>
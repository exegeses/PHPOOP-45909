<?php

    $x = 10;
    const MONEDA = 'usd';
    define('CURSO', 'PHP OOP');

    function foo()
    {
        return CURSO;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= CURSO ?></title>
</head>
<body>
<?php
    echo foo();
    echo '<br>';
    //unset($x);
    echo $x;

?>


</body>
</html>
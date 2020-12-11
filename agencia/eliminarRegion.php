<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $Region = new Region;
    $chequeo = $Region->eliminarRegion();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de una región</h1>

<?php
        $css = 'danger';
        $mensaje = 'No se pudo eliminar la región';
        if( $chequeo ){
            $css = 'success';
            $mensaje = 'Región: '.$Region->getRegNombre().' eliminada corectamente.';
        }
?>
            <div class="alert alert-<?= $css ?> shadow-sm p-4 col-6 mx-auto">
                <?= $mensaje ?>
                <a href="adminRegiones.php" class="btn btn-outline-secondary ml-4">
                    volver a panel
                </a>
            </div>

    </main>

<?php
    include 'includes/footer.php';
?>
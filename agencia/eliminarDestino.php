<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $Destino = new Destino;
    $chequeo = $Destino->eliminarDestino();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de un destino</h1>

<?php
        $css = 'danger';
        $mensaje = 'No se pudo eliminar el destino';
        if( $chequeo ){
            $css = 'success';
            $mensaje = 'Destino: '.$Destino->getDestNombre().' eliminado corectamente.';
        }
?>
            <div class="alert alert-<?= $css ?> shadow-sm p-4 col-6 mx-auto">
                <?= $mensaje ?>
                <a href="adminDestinos.php" class="btn btn-outline-secondary ml-4">
                    volver a panel
                </a>
            </div>

    </main>

<?php
    include 'includes/footer.php';
?>
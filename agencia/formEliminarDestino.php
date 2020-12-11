<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $Destino = new Destino;
    $Destino->verDestinoPorID();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de un destino</h1>

        <div class="alert bg-light border-danger text-danger shadow-sm col-5 mx-auto p-4">
            Se eliminará el Destino <span class="lead"><?= $Destino->getDestNombre(); ?></span>
            <form action="eliminarDestino.php" method="post">
                <input type="hidden" name="destID"
                       value="<?= $Destino->getDestID() ?>">
                <input type="hidden" name="destNombre"
                       value="<?= $Destino->getDestNombre() ?>">
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="adminDestinos.php" class="btn btn-outline-secondary btn-block my-2">
                    volver a panel
                </a>
            </form>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Si confirma la baja, se eliminará el destino seleccionado',
                'warning'
            )
        </script>

    </main>

<?php
    include 'includes/footer.php';
?>
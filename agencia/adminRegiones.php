<?php
    require 'config/config.php';
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Panel de administración de regiones</h1>

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <th>#</th>
                <th>Región</th>
                <th colspan="2">
                    <a href="formAgregarRegion.php" class="btn btn-outline-secondary">
                        Agregar
                    </a>
                </th>
            </thead>
            <tbody>
                <td>id</td>
                <td>nombre</td>
                <td>
                    <a href="formAgregarModificar.php" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="formAgregarEliminar.php" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tbody>
        </table>


    </main>

<?php
    include 'includes/footer.php';
?>
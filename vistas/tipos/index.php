<!DOCTYPE html>
<html lang="es">

<head>
    <? require_once("../modulos/links.php"); ?>
    <title>Tipos de Libros - <?= COMPANY; ?></title>
</head>

<body class="app sidebar-mini">
    <? require_once("../modulos/navbar.php"); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-layer-group"></i> Tipos de Libros</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Tipos de Libros</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        <a href="<?= BASE_URL ?>vistas/tipos/form.php" class="btn btn-info mb-2"><i class="fas fa-plus fa-lg"></i>&nbsp;Nuevo tipo</a>
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered datatable text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("../../modelos/TipoModelo.php");
                                    $obj = new TipoModelo();
                                    foreach ($obj->fetch_all() as $tipo) { ?>
                                        <tr>
                                            <td><?= $tipo->tipo_id; ?></td>
                                            <td><?= $tipo->tipo_nombre; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>vistas/tipos/form.php?id=<?= $tipo->tipo_id; ?>">Editar</a>
                                                <a href="<?= BASE_URL; ?>procesos/Tipos.php?action=delete&id=<?= $tipo->tipo_id; ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                                <?php if (isset($_SESSION['mensaje'])) { ?>
                                    <tfoot>
                                        <?php
                                        echo $_SESSION['mensaje'];
                                        unset($_SESSION['mensaje']);
                                        ?>
                                    </tfoot>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <? require_once("../modulos/scripts.php"); ?>
</body>

</html>
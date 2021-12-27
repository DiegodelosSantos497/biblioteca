<!DOCTYPE html>
<html lang="es">

<head>
    <? require_once("../modulos/links.php"); ?>
    <title>Libros - <?= COMPANY; ?></title>
</head>

<body class="app sidebar-mini">
    <? require_once("../modulos/navbar.php"); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-book-open"></i> Libros</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Libros</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        <a href="<?= BASE_URL ?>vistas/libros/form.php" class="btn btn-info mb-2"><i class="fas fa-plus fa-lg"></i>&nbsp;Nuevo libro</a>
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered datatable text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Título</th>
                                        <th>Área</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>País</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Edición</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("../../modelos/LibroModelo.php");
                                    $obj = new LibroModelo();
                                    foreach ($obj->fetch_all() as $libro) { ?>
                                        <tr>
                                            <td><?= empty($libro->libro_isbn) ? "Nulo" : $libro->libro_isbn ?></td>
                                            <td><?= $libro->libro_titulo; ?></td>
                                            <td><?= $libro->area; ?></td>
                                            <td><?= $libro->autor; ?></td>
                                            <td><?= $libro->editorial; ?></td>
                                            <td><?= $libro->pais; ?></td>
                                            <td><?= $libro->tipo; ?></td>
                                            <td><?= $libro->libro_fecha; ?></td>
                                            <td><?= $libro->libro_edicion; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>vistas/libros/form.php?id=<?= $libro->libro_id; ?>">Editar</a>
                                                <a href="<?= BASE_URL; ?>procesos/Libros.php?action=delete&id=<?= $libro->libro_id; ?>&fotoActual=<?= $libro->libro_foto; ?>">Eliminar</a>
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
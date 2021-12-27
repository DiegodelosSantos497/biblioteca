<!DOCTYPE html>
<html lang="es">

<head>
    <? require_once("../modulos/links.php"); ?>
    <title>Usuários - <?= COMPANY; ?></title>
</head>

<body class="app sidebar-mini">
    <? require_once("../modulos/navbar.php"); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-users"></i> Usuários</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Usuários</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        <a href="<?= BASE_URL ?>vistas/usuarios/form.php" class="btn btn-info mb-2"><i class="fas fa-plus fa-lg"></i>&nbsp;Nuevo usuário</a>
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered datatable text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("../../modelos/UsuarioModelo.php");
                                    $obj = new UsuarioModelo();
                                    foreach ($obj->fetch_all() as $user) { ?>
                                        <tr>
                                            <td><?= $user->usuario_id; ?></td>
                                            <td><?= $user->usuario_nombre; ?></td>
                                            <td><?= $user->usuario_apellido; ?></td>
                                            <td><?= $user->usuario_email; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>vistas/usuarios/form.php?id=<?= $user->usuario_id; ?>">Editar</a>
                                                <a href="<?= BASE_URL; ?>procesos/Usuarios.php?action=delete&id=<?= $user->usuario_id; ?>">Eliminar</a>
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
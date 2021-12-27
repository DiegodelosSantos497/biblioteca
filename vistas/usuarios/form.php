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
        <?php
        require_once("../../modelos/UsuarioModelo.php");
        $obj = new UsuarioModelo();
        if (!empty($_GET['id'])) {
            $user = $obj->fetch($_GET['id']);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title text-center"><?= empty($user) ? "Registro" : "Actualización" ?> de Usuário</h3>
                    <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="tile-header">
                            <?php
                            echo $_SESSION['mensaje'];
                            unset($_SESSION['mensaje']);
                            ?>
                        </div>
                    <?php } ?>
                    <form action="<?= BASE_URL; ?>procesos/Usuarios.php?action=<?= empty($user) ? "insert" : "update" ?>" method="POST">
                        <div class="tile-body">
                            <div class="form-row mb-2">
                                <input class="form-control" type="hidden" name="id" value="<?= empty($user) ? "" : $user->usuario_id ?>">
                                <div class="col-6">
                                    <label class="control-label">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" value="<?= empty($user) ? "" : $user->usuario_nombre ?>">
                                </div>
                                <div class="col-6">
                                    <label class="control-label">Apellido</label>
                                    <input class="form-control" type="text" name="apellido" value="<?= empty($user) ? "" : $user->usuario_apellido ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Correo Electrónico</label>
                                <input class="form-control" type="email" name="email" value="<?= empty($user) ? "" : $user->usuario_email ?>">
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-6">
                                    <label class="control-label">Contraseña</label>
                                    <input class="form-control" type="text" name="clave">
                                </div>
                                <div class="col-6">
                                    <label class="control-label">Confirmar contraseña</label>
                                    <input class="form-control" type="text" name="clave2">
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= BASE_URL; ?>vistas/usuarios/"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <? require_once("../modulos/scripts.php"); ?>
</body>

</html>
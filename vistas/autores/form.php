<!DOCTYPE html>
<html lang="es">

<head>
    <? require_once("../modulos/links.php"); ?>
    <title>Autores - <?= COMPANY; ?></title>
</head>

<body class="app sidebar-mini">
    <? require_once("../modulos/navbar.php"); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-users"></i> Autores</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Autores</a></li>
            </ul>
        </div>
        <?php
        require_once("../../modelos/AutorModelo.php");
        $obj = new AutorModelo();
        if (!empty($_GET['id'])) {
            $autor = $obj->fetch($_GET['id']);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title text-center"><?= empty($autor) ? "Registro" : "Actualización" ?> de Autores</h3>
                    <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="tile-header">
                            <?php
                            echo $_SESSION['mensaje'];
                            unset($_SESSION['mensaje']);
                            ?>
                        </div>
                    <?php } ?>
                    <form action="<?= BASE_URL; ?>procesos/Autores.php?action=<?= empty($autor) ? "insert" : "update" ?>" method="POST">
                        <div class="tile-body">
                        <input class="form-control" type="hidden" name="id" value="<?= empty($autor) ? "" : $autor->autor_id ?>">
                                
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="<?= empty($autor) ? "" : $autor->autor_nombre ?>">
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= BASE_URL; ?>vistas/autores/"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <? require_once("../modulos/scripts.php"); ?>
</body>

</html>
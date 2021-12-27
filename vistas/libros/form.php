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
        <?php
        require_once("../../modelos/LibroModelo.php");
        $obj = new LibroModelo();
        if (!empty($_GET['id'])) {
            $libro = $obj->fetch($_GET['id']);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title text-center"><?= empty($libro) ? "Registro" : "Actualización" ?> de Libro</h3>
                    <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="tile-header">
                            <?php
                            echo $_SESSION['mensaje'];
                            unset($_SESSION['mensaje']);
                            ?>
                        </div>
                    <?php } ?>
                    <form action="<?= BASE_URL; ?>procesos/Libros.php?action=<?= empty($libro) ? "insert" : "update" ?>" method="POST" enctype="multipart/form-data">
                        <div class="tile-body">
                            <div class="form-row mb-2">
                                <input class="form-control" type="hidden" name="id" value="<?= empty($libro) ? "" : $libro->libro_id ?>">
                                <div class="col-3">
                                    <label class="control-label">ISBN</label>
                                    <input class="form-control" type="text" name="isbn" value="<?= empty($libro) ? "" : $libro->libro_isbn ?>">
                                </div>
                                <div class="col-9">
                                    <label class="control-label">Título</label>
                                    <input class="form-control" type="text" name="titulo" value="<?= empty($libro) ? "" : $libro->libro_titulo ?>">
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-md-4">
                                    <label for="area">Área</label>
                                    <select class="custom-select" name="area">
                                        <option selected disabled value="">Seleccionar...</option>
                                        <?php foreach ($obj->fetch_all_tables('area') as $area) { ?>
                                            <option value="<?= $area->area_id; ?>" <?= empty($libro) ? "" : (($libro->libro_area_id == $area->area_id) ? "selected" : "") ?>>
                                                <?= $area->area_nombre; ?>
                                                <? //= empty($libro) ? "" : $libro->libro_area_id  
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="autor">Autor</label>
                                    <select class="custom-select" name="autor">
                                        <option selected disabled value="">Seleccionar...</option>
                                        <?php foreach ($obj->fetch_all_tables('autor') as $autor) { ?>
                                            <option value="<?= $autor->autor_id; ?>" <?= empty($libro) ? "" : (($libro->libro_autor_id == $autor->autor_id) ? "selected" : "") ?>>
                                                <?= $autor->autor_nombre; ?>
                                                <? //= empty($libro) ? "" : $libro->libro_autor_id  
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="editorial">Editorial</label>
                                    <select class="custom-select" name="editorial">
                                        <option selected disabled value="">Seleccionar...</option>
                                        <?php foreach ($obj->fetch_all_tables('editorial') as $editorial) { ?>
                                            <option value="<?= $editorial->editorial_id; ?>" <?= empty($libro) ? "" : (($libro->libro_editorial_id == $editorial->editorial_id) ? "selected" : "") ?>>
                                                <?= $editorial->editorial_nombre; ?>
                                                <? //= empty($libro) ? "" : $libro->libro_editorial_id  
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-4">
                                    <label for="pais">Pais</label>
                                    <select class="custom-select" name="pais">
                                        <option selected disabled value="">Seleccionar...</option>
                                        <?php foreach ($obj->fetch_all_tables('pais') as $pais) { ?>
                                            <option value="<?= $pais->pais_id; ?>" <?= empty($libro) ? "" : (($libro->libro_pais_id == $pais->pais_id) ? "selected" : "") ?>>
                                                <?= $pais->pais_nombre; ?>
                                                <? //= empty($libro) ? "" : $libro->libro_pais_id  
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="tipo">Tipo</label>
                                    <select class="custom-select" name="tipo">
                                        <option selected disabled value="">Seleccionar...</option>
                                        <?php foreach ($obj->fetch_all_tables('tipo') as $tipo) { ?>
                                            <option value="<?= $tipo->tipo_id; ?>" <?= empty($libro) ? "" : (($libro->libro_tipo_id == $tipo->tipo_id) ? "selected" : "") ?>>
                                                <?= $tipo->tipo_nombre; ?>
                                                <? //= empty($libro) ? "" : $libro->libro_tipo_id  
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label class="control-label">Fecha</label>
                                    <input class="form-control" type="text" maxlength="4" name="fecha" value="<?= empty($libro) ? "" : $libro->libro_fecha ?>">
                                </div>
                                <div class="col-2">
                                    <label class="control-label">Edición</label>
                                    <input class="form-control" type="number" name="edicion" value="<?= empty($libro) ? "" : $libro->libro_edicion ?>">
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-6">
                                    <label class="control-label">Foto de portada</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="foto">
                                        <label class="custom-file-label" for="foto">Seleccionar foto de portada...</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="control-label">Link del Libro</label>
                                    <input class="form-control" type="text" name="url" value="<?= empty($libro) ? "" : $libro->libro_url ?>">
                                </div>
                            </div>
                            <?php if (!empty($libro)) { ?>
                                <div class="form-row mb-2">
                                    <div class="col-6">
                                        <label class="control-label">Foto actual</label><br>
                                        <img src="../../assets/images/libros/<?= $libro->libro_foto ?>" class="w-50" alt="<?= $libro->libro_titulo ?>">
                                        <input class="form-control" type="hidden" name="fotoActual" value="<?= $libro->libro_foto ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= BASE_URL; ?>vistas/libros/"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <? require_once("../modulos/scripts.php"); ?>
</body>

</html>
<?php
if (empty($_GET['id'])) {
    header("location:./index.php");
}
require_once("./config/Config.php");
require_once("./modelos/LibroModelo.php");
require_once("./modelos/AreaModelo.php");
require_once("./modelos/AutorModelo.php");
require_once("./modelos/EditorialModelo.php");
require_once("./modelos/PaisModelo.php");

$area = new AreaModelo();
$areas = $area->fetch_all();

$autor = new AutorModelo();
$autores = $autor->fetch_all();

$editorial = new EditorialModelo();
$editoriales = $editorial->fetch_all();

$pais = new PaisModelo();
$paises = $pais->fetch_all();

$libro = new LibroModelo();
$libros = $libro->fetch($_GET['id']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inicio - <?= COMPANY; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= BASE_URL; ?>assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?= BASE_URL; ?>"><?= COMPANY; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>">Home</a></li>
                </ul>
                <a class="btn btn-outline-dark" href="<?= BASE_URL; ?>vistas/">Acceder</a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder"><?= COMPANY; ?></h1>
                <p class="lead fw-normal text-white-50 mb-0">Bienvenido a nuestra biblioteca virtual</p>
            </div>
        </div>
    </header>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top" src="<?= BASE_URL; ?>assets/images/libros/<?= $libros->libro_foto ?>" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $libros->libro_titulo ?></h1>
                    <div class="fs-5 mb-5">
                        <span>Autor:
                            <?php foreach ($autores as $valor) {
                                if ($libros->libro_autor_id == $valor->autor_id) {
                                    echo $valor->autor_nombre;
                                }
                            } ?>
                            <br>
                            <span>Área:
                                <?php foreach ($areas as $valor) {
                                    if ($libros->libro_area_id == $valor->area_id) {
                                        echo $valor->area_nombre;
                                    }
                                } ?>
                                <br>
                                <span>Editorial:
                                    <?php foreach ($editoriales as $valor) {
                                        if ($libros->libro_editorial_id == $valor->editorial_id) {
                                            echo $valor->editorial_nombre;
                                        }
                                    } ?>
                                    <br>
                                    <span>País:
                                        <?php foreach ($paises as $valor) {
                                            if ($libros->libro_pais_id == $valor->pais_id) {
                                                echo $valor->pais_nombre;
                                            }
                                        } ?><br>
                                        <span>Fecha: <?= $libros->libro_fecha ?></span><br>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-outline-dark flex-shrink-0" href="<?= $libros->libro_url ?>" target="_blank">
                            <i class="fas fa-download"></i>
                            Descargar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?= COMPANY; ?> 2021</p>
        </div>
    </footer>
    <script src="<?= BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <!-- Fontawesome js plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/fontawesome.js"></script>
    <!-- Core theme JS-->
    <script src="<?= BASE_URL; ?>assets/js/scripts.js"></script>
</body>

</html>
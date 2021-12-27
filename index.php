<?php
require_once("./config/Config.php");
require_once("./modelos/LibroModelo.php");
$obj = new LibroModelo();
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
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($obj->fetch_all() as $libro) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top " src="<?= BASE_URL . "assets/images/libros/" . $libro->libro_foto ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $libro->libro_titulo ?></h5>
                                    <?= $libro->autor ?> - <?= $libro->libro_fecha ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="<?= BASE_URL."detalles.php?id=".$libro->libro_id?>" title="Ver más"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-dark mt-auto" href="" title="Descargar"><i class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?=COMPANY;?> 2021</p>
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
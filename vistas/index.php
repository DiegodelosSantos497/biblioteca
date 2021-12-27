<?
session_start();
require_once("../config/Config.php");
if (isset($_SESSION['usuario'])) {
    redireccionar("./inicio/");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Login</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1><?= COMPANY; ?></h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="../procesos/Login.php?action=login" method="POST">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-lock"></i> Iniciar Sesión</h3>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="email" name="email" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Clave</label>
                    <input class="form-control" type="password" name="clave">
                </div>
                <div class="form-group btn-container ">
                    <button class="btn btn-primary btn-block mt-4 mb-2" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
                   
                   <?php
                    if (isset($_SESSION['mensaje'])) {
                        echo $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                    }
                    ?>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <!-- Pace js plugin  -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/pace.min.js"></script>
    <!-- Fontawesome js plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/fontawesome.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>
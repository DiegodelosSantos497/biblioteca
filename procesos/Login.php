<?php
if (isset($_REQUEST['action'])) {
    session_start();
    require_once("../config/Config.php");
    require_once("../modelos/UsuarioModelo.php");
    $obj = new UsuarioModelo();

    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    $clave = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : "";

    switch ($_REQUEST['action']) {


        case 'login':
            if (empty($email) || empty($clave)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/");
            } else {
                if ($obj->login($email, base64_encode($clave)) != "") {
                    $_SESSION['usuario'] = $obj->login($email, base64_encode($clave));
                    redireccionar("../vistas/inicio/");
                } else {
                    mensaje("danger", "Email y/o clave incorrectos");
                    redireccionar("../vistas/");
                }
            }
            break;
        case 'logout':
            session_destroy();
            unset($_SESSION['usuario']);
            redireccionar("../vistas/");
        break;
        default:
            # code...
            break;
    }
}

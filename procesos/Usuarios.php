<?php


if (isset($_REQUEST['action'])) {
    session_start();
    require_once("../config/Config.php");
    require_once("../modelos/UsuarioModelo.php");
    $obj = new UsuarioModelo();

    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
    $apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : "";
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    $clave = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : "";
    $clave2 = isset($_REQUEST['clave2']) ? $_REQUEST['clave2'] : "";
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

    switch ($_REQUEST['action']) {

        case 'insert':
            if (empty($nombre) || empty($apellido) || empty($email) || empty($clave) || empty($clave2)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/usuarios/form.php");
            } elseif ($obj->validate_duplicate_email($email)) {
                mensaje("danger", "El email ingresado ya existe");
                redireccionar("../vistas/usuarios/form.php");
            } elseif ($clave != $clave2) {
                mensaje("danger", "Las contraseñas deben ser iguales");
                redireccionar("../vistas/usuarios/form.php");
            } else {
                if ($obj->insert($nombre, $apellido, $email, base64_encode($clave))) {
                    mensaje("success", "Registro insertado con éxito");
                    redireccionar("../vistas/usuarios/form.php");
                } else {
                    mensaje("danger", "Error al insertar el nuevo registro");
                    redireccionar("../vistas/usuarios/form.php");
                }
            }
            break;
        case 'update':
            $verificar = $obj->fetch($id);
            if (empty($nombre) || empty($apellido) || empty($email) || empty($clave) || empty($clave2) || empty($id)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/usuarios/form.php?id=$id");
            } elseif ($clave != $clave2) {
                mensaje("danger", "Las contraseñas deben ser iguales");
                redireccionar("../vistas/usuarios/form.php?id=$id");
            } else {
                if ($obj->update($nombre, $apellido, $email, base64_encode($clave), $id)) {
                    mensaje("success", "Registro actualizado con éxito");
                    redireccionar("../vistas/usuarios/form.php?id=$id");
                } else {
                    mensaje("danger", "Error al actualizar el registro");
                    redireccionar("../vistas/usuarios/form.php?id=$id");
                }
            }
            break;
        case 'delete':
            if (empty($id)) {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/usuarios/index.php");
            } elseif ($obj->delete($id)) {
                mensaje("success", "Registro eliminado con éxito");
                redireccionar("../vistas/usuarios/index.php");
            } else {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/usuarios/index.php");
            }
            break;
        default:
            # code...
            break;
    }
}

<?php


if (isset($_REQUEST['action'])) {
    session_start();
    require_once("../config/Config.php");
    require_once("../modelos/PaisModelo.php");
    $obj = new PaisModelo();

    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

    switch ($_REQUEST['action']) {

        case 'insert':
            if (empty($nombre)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/paises/form.php");
            } elseif ($obj->validate_duplicate_name($nombre)) {
                mensaje("danger", "El registro ingresado ya existe");
                redireccionar("../vistas/paises/form.php");
            } else {
                if ($obj->insert($nombre)) {
                    mensaje("success", "Registro insertado con éxito");
                    redireccionar("../vistas/paises/form.php");
                } else {
                    mensaje("danger", "Error al insertar el nuevo registro");
                    redireccionar("../vistas/paises/form.php");
                }
            }
            break;
        case 'update':
            $verificar = $obj->fetch($id);
            if (empty($nombre) || empty($id)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/paises/form.php?id=$id");
            }  else {
                if ($obj->update($nombre, $id)) {
                    mensaje("success", "Registro actualizado con éxito");
                    redireccionar("../vistas/paises/index.php");
                } else {
                    mensaje("danger", "Error al actualizar el registro");
                    redireccionar("../vistas/paises/form.php?id=$id");
                }
            }
            break;
        case 'delete':
            if (empty($id)) {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/paises/index.php");
            } elseif ($obj->delete($id)) {
                mensaje("success", "Registro eliminado con éxito");
                redireccionar("../vistas/paises/index.php");
            } else {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/paises/index.php");
            }
            break;
        default:
            # code...
            break;
    }
}

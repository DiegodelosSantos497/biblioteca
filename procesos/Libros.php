<?php
if (isset($_REQUEST['action'])) {
    session_start();
    require_once("../config/Config.php");
    require_once("../modelos/LibroModelo.php");
    $obj = new LibroModelo();

    $isbn = isset($_REQUEST['isbn']) ? $_REQUEST['isbn'] : "";
    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : "";
    $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : "";
    $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : "";
    $editorial = isset($_REQUEST['editorial']) ? $_REQUEST['editorial'] : "";
    $pais = isset($_REQUEST['pais']) ? $_REQUEST['pais'] : "";
    $tipo = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";
    $fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : "";
    $edicion = isset($_REQUEST['edicion']) ? $_REQUEST['edicion'] : "";
    $foto = isset($_FILES['foto']) ? $_FILES['foto'] : "";
    $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : "";
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
    $fotoActual = isset($_REQUEST['fotoActual']) ? $_REQUEST['fotoActual'] : "";
    /* variables permitidas */
    $extensiones_permitidas = array('jpg', 'jpeg', 'png');
    $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $ruta = "../assets/images/libros/";

    switch ($_REQUEST['action']) {


        case 'insert':
            if (empty($titulo) || empty($area) || empty($autor) || empty($editorial) || empty($pais) || empty($tipo) || empty($fecha) || empty($edicion) || empty($foto['name']) || empty($url)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/libros/form.php");
            } elseif (!is_numeric($fecha)) {
                mensaje("danger", "El campo fecha debe tener el año de edición del libro");
                redireccionar("../vistas/libros/form.php");
            } elseif (!in_array($extension, $extensiones_permitidas)) {
                mensaje("danger", "El archivo seleccionado debe ser una imagen");
                redireccionar("../vistas/libros/form.php");
            } else {
                if (move_uploaded_file($foto['tmp_name'], $ruta . $foto['name']) && $obj->insert($isbn, $titulo, $area, $autor, $editorial, $pais, $tipo, $fecha, $edicion, $foto['name'], $url)) {
                    mensaje("success", "Registro insertado con éxito");
                    redireccionar("../vistas/libros/form.php");
                } else {
                    mensaje("danger", "Error al insertar el nuevo registro");
                    redireccionar("../vistas/libros/form.php");
                }
            }

            break;
        case 'update':
            if (empty($titulo) || empty($area) || empty($autor) || empty($editorial) || empty($pais) || empty($tipo) || empty($fecha) || empty($edicion) || empty($url) || empty($id)) {
                mensaje("danger", "Todos los campos son obligatorios");
                redireccionar("../vistas/libros/form.php?id=$id");
            } elseif (!is_numeric($fecha)) {
                mensaje("danger", "El campo fecha debe tener el año de edición del libro");
                redireccionar("../vistas/libros/form.php?id=$id");
            } elseif (!empty($foto['name'])) {
                if (!in_array($extension, $extensiones_permitidas)) {
                    mensaje("danger", "El archivo seleccionado debe ser una imagen");
                    redireccionar("../vistas/libros/form.php?id=$id");
                } else {
                    if (unlink($ruta.$fotoActual) && move_uploaded_file($foto['tmp_name'], $ruta . $foto['name']) && $obj->update($isbn, $titulo, $area, $autor, $editorial, $pais, $tipo, $fecha, $edicion, $foto['name'], $url, $id)) {
                        mensaje("success", "Registro insertado con éxito");
                        redireccionar("../vistas/libros/index.php");
                    } else {
                        mensaje("danger", "Error al insertar el nuevo registro");
                        redireccionar("../vistas/libros/form.php?id=$id");
                    }
                }
            } else {
                if ($obj->update($isbn, $titulo, $area, $autor, $editorial, $pais, $tipo, $fecha, $edicion, $fotoActual, $url, $id)) {
                    mensaje("success", "Registro insertado con éxito");
                    redireccionar("../vistas/libros/index.php");
                } else {
                    mensaje("danger", "Error al insertar el nuevo registro");
                    redireccionar("../vistas/libros/form.php?id=$id");
                }
            }
            break;
        case 'delete':
            if (empty($id) || empty($fotoActual)) {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/libros/index.php");
            } elseif (unlink($ruta . $fotoActual) && $obj->delete($id)) {
                mensaje("success", "Registro eliminado con éxito");
                redireccionar("../vistas/libros/index.php");
            } else {
                mensaje("danger", "Error al eliminar el registro");
                redireccionar("../vistas/libros/index.php");
            }
            break;

        default:
            # code...
            break;
    }
}

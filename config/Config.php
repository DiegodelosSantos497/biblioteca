<?php
/* nombre del sistema */
define("COMPANY","Biblioteca Online");

/* constante con el ruta base del sistema */
define("BASE_URL","http://localhost/biblioteca/");

function redireccionar($ruta)
{
  return header("location:".$ruta);
}

function mensaje($tipo, $mensaje)
{
    return $_SESSION['mensaje'] = "<p class='alert alert-".$tipo."' role='alert'>".$mensaje."</p>";
}




<!DOCTYPE html>
<html lang="es">

<head>
  <? require_once("../modulos/links.php"); ?>
  <title>Inicio - <?= COMPANY; ?></title>
</head>

<body class="app sidebar-mini">
  <? require_once("../modulos/navbar.php"); ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fas fa-home"></i> Inicio</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">Create a beautiful dashboard</div>
        </div>
      </div>
    </div>
  </main>
  <? require_once("../modulos/scripts.php"); ?>
</body>

</html>
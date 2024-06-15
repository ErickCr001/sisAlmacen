<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de almacen</title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css"/>
    <!-- AGREGANDO JQUERY -->
    <script src="<?php echo base_url() ?>jquery/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AGREGANDO ETILOS DATATABLES -->
    <link href="<?= base_url() ?>DataTables/datatables.min.css" rel="stylesheet">
 
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarProductoLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarProductoLink">
            <li><a class="dropdown-item" href="#">Consulta</a></li>
            <li><a class="dropdown-item" href="#">Registrar</a></li>
            <li><a class="dropdown-item" href="#">Modicar-Eliminar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarVentaLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ventas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarVentaLink">
            <li><a class="dropdown-item" href="#">Realizar venta</a></li>
            <li><a class="dropdown-item" href="#">Reporte de venta</a></li>
            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarInventarioLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarInventarioLink">
            <li><a class="dropdown-item" href="#">Reporte</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Este layout se reutiliza en cualquier vista
Renderizar sección significa que solo esta parte va cambiar -->
<?php $this->renderSection('contenido') ?>
</body>
</html>
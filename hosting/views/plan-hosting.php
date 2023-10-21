<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hosting</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="agregar_u.php">Agregar</a></li>
            <li><a class="dropdown-item" href="lista_u.php">Lista de usuarios</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Facturacion
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="facturacion.php">Agregar</a></li>
            <li><a class="dropdown-item" href="facturas.php">Lista de Facturas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Planes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="plan-hosting.php">Agregar</a></li>
            <li><a class="dropdown-item" href="lista_plan.php">Lista de Planes</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sitios Web
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="sitios-web.php">Agregar</a></li>
            <li><a class="dropdown-item" href="lista_sitios-web.php">Lista de Sitios</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ver Mas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="configuraciones-globales-hosting.php">Configuraciones Globales del Hosting</a></li>
            <li><a class="dropdown-item" href="soporte-tecnico.php">Soporte Tecnico</a></li>
            <li><a class="dropdown-item" href="sitios-web.php">Sitios Web</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
    <?php
            include "../controller/c_agregar_plan.php";
            ?> 
        <form class="mt-5" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Plan</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Recursos asignados(espacio en disco, ancho de banda, numero de sitios permitidos, etc)</label>
                <input type="text" name="recursos_asignados" class="form-control" >
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <div class="form-floating">
                    <input type="number" name="precio_mes" class="form-control" id="floatingInputGroup1" placeholder="Username">
                    <label for="floatingInputGroup1">Precio Mensual</label>
                </div>
            </div>
            <button type="submit" name="btn_plan" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
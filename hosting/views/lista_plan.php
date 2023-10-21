<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hosting</title>
    <script src="../js/script.js?v=1.0"></script>
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
    <h1 class="text-center">Lista de Planes</h1>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th scope="col-1">Nombre</th>
                        <th scope="col-1">Descripcion</th>
                        <th scope="col-1">Recursos Asignados</th>
                        <th scope="col-1">Precio por Mes</th>
                        <th scope="col-1" style="width: 225px;">EDITAR/ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                            include "../model/conexion_bd.php";
                            $sql=$conexion->query("select * from planes_hosting");
                            while ($datos = $sql->fetch_object()) {
                               ?>
                        <th ><?=$datos->nombre?></th>
                        <th ><?=$datos->descripcion?></th>
                        <th ><?=$datos->recursos_asignados?></th>
                        <th ><?=$datos->precio_mes?></th>
                        <td>
                            <a href="editar_plan.php?id=<?=$datos->id_plan?>" class="btn btn-primary">Editar</a>
                            <a onclick="eliminarPlan(<?=$datos->id_plan?>)" class="btn btn-small btn-danger">Eliminar</i></a>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
            
    </div>
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
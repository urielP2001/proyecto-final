<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hosting</title>
    <script src="../js/script.js?v=1.2"></script>
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
            include "../controller/factura.php";
            ?> 
        <form class="mt-5" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID Usuario:</label>
                <input readonly name="id_usuario" id="id_usuario" value="">
            </div>
            <div class="mb-3">
                <label for="usuario">Seleccionar un usuario:</label>
                <select name="usuario" id="usuario" onchange="rellenarId()">
                     <option value="">Seleccione un usuario</option>
                      <?php
                      // Aquí debes obtener la lista de usuarios desde la base de datos
                      include "../model/conexion_bd.php";

                      $sql = "SELECT id, nombre, apellido, tipo_plan, usuario FROM usuarios ORDER BY nombre";
                      $result = $conexion->query($sql);

                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option  class='" . $row["tipo_plan"] . "' value='" . $row["id"] . "'>" .  $row["nombre"] . " " . $row["apellido"] . " [". $row["usuario"] . "] " . "</option>";
                          }
                        }?>
                  </select>
              
            </div>
            <div class="mb-3">
                <label for="Select" class="form-label">Plan</label>
                <select name="opcion" id="plan" onchange="calcularMonto()"  class="form-select" aria-label="Default select example">
                    <option selected>Seleccione una opcion</option>
                    <option data-precio="1299" value="1">SINGLE </option>
                    <option data-precio="2999" value="2">PREMIUM</option>
                    <option data-precio="3999" value="3">BUSINESS</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Emisión</label>
                <input type="date" class="form-control" name="fechaEmision" id="fechaEmision">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Vencimiento (30 dias)</label>
                <input type="date" class="form-control" name="fechaVencimiento" id="fechaVencimiento">
            </div>
            <div class="mb-3">
                <label for="Select" class="form-label">Estado de la Factura</label>
                <select class="form-select" name="estado" aria-label="Default select example">
                    <option selected>Seleccione una opcion</option>
                    <option value="1">Pendiente</option>
                    <option value="2">Pagada</option>
                    <option value="3">Vencida</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <div class="form-floating">
                    <!-- <input readonly name="id_usuario" id="id_usuario" value=""> -->
                    <input readonly name="montoTotal" class="form-control" id="total" value="" >
                    <label for="floatingInputGroup1">Monto Total</label>
                </div>
            </div>
            <button type="submit" name="btnfact" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
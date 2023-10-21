<?php
include "../model/conexion_bd.php";

// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_web  = $_GET['id'];

    // Consulta SQL para obtener los detalles de la noticia
    $sql = $conexion->prepare("SELECT * FROM sitios_web WHERE id_web = ?");
    $sql->bind_param("i", $id_web);
    $sql->execute();
    $resultado = $sql->get_result();

    // Verificar si se encontró la noticia
    if ($resultado->num_rows == 1) {
        $datos = $resultado->fetch_object();
        // Aquí puedes mostrar un formulario de edición con los detalles de la noticia
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
            <link rel="shortcut icon" href="../img/logo.png" />
            <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../css/style.css">
            <title>Editar Noticia</title>
        </head>
        <body>
            <h2 class="text-center text-dark">Editar Web</h2>
            <form class="formulario1 row d-flex justify-content-center" action="../controller/editar-web.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_web" value="<?php echo $datos->id_web; ?>">
                <div class="col-7 mb-3 text-center">
                    <label class="form-label ">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $datos->nombre; ?>">
                </div>
                <div class="col-7 mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label ">Dominio</label>
                    <input class="form-control" name="dominio" value="<?php echo $datos->dominio; ?>"></input>
                    
                </div>
                <div class="col-7 mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label ">ID Usuario</label>
                    <input readonly class="form-control" id="id_usuario" name="id_usuario" value=""></input>
                </div>

                <div class="col-7 mb-3 text-center">
                    <label for="usuario">Seleccionar un usuario:</label>
                    <select class="form-select" name="usuario" id="usuario" onchange="rellenarId2()">
                        
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

                <div class="col-7 mb-3 text-center">
                    <label class="form-label ">Configuracion del Servidor</label>
                    <input class="form-control" name="config_servidor" value="<?php echo $datos->config_servidor; ?>"></input>
                </div>
                <div class="mb-3 col-7">
                    <label for="Select" class="form-label">Estado</label>
                    <select name="opcion" class="form-select" aria-label="Default select example">
                        <option value="1" <?php if ($datos->estado == 1) echo 'selected'; ?>>Activo</option>
                        <option value="2" <?php if ($datos->estado == 2) echo 'selected'; ?>>Suspendido</option>
                        <option value="3" <?php if ($datos->estado == 3) echo 'selected'; ?>>Eliminado</option>
                    </select>
                </div>

                <div class="row d-flex justify-content-center ">
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" name="btnactualizar_web">Guardar Cambios</button>
                    </div>
                </div>
            </form>
            <script src="../js/script.js?v=1.4"></script>
        </body>
        </html>

        <?php
    } else {
        echo "No se encontró la noticia.";
    }
} else {
    echo "ID de noticia no válido.";
}
?>

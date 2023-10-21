<?php
include "../model/conexion_bd.php";

// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuarios_id = $_GET['id'];

    // Consulta SQL para obtener los detalles de la noticia
    $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->bind_param("i", $usuarios_id);
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
            <h2 class="text-center text-white mt-5">Editar Noticia</h2>
            <form class="formulario1 row d-flex justify-content-center" action="../controller/c_editar_u.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $datos->id; ?>">
                <div class="col-7 mb-3 text-center">
                    <label class="form-label ">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $datos->nombre; ?>">
                </div>
                <div class="col-7 mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label ">Apellido</label>
                    <input class="form-control" name="apellido" value="<?php echo $datos->apellido; ?>"></input>
                </div>
                <div class="col-7 mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label ">Usuario</label>
                    <input class="form-control" name="usuario" value="<?php echo $datos->usuario; ?>"></input>
                </div>
                <div class="col-7 mb-3 text-center">
                    <label class="form-label ">Contraseña</label>
                    <input class="form-control" name="contraseña" value="<?php echo $datos->contraseña; ?>"></input>
                </div>
                <div class="col-7 mb-3 text-center">
                    <label class="form-label ">correo</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $datos->email; ?>"></input>
                </div>
                <div class="mb-3 col-7">
                    <label for="Select" class="form-label">Tipo de Plan</label>
                    <select name="opcion" class="form-select" aria-label="Default select example">
                        <option value="1" <?php if ($datos->tipo_plan == 1) echo 'selected'; ?>>SINGLE</option>
                        <option value="2" <?php if ($datos->tipo_plan == 2) echo 'selected'; ?>>PREMIUM</option>
                        <option value="3" <?php if ($datos->tipo_plan == 3) echo 'selected'; ?>>BUSINESS</option>
                    </select>
                </div>

                <div class="row d-flex justify-content-center ">
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" name="btnactualizar_u">Guardar Cambios</button>
                    </div>
                </div>
            </form>

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

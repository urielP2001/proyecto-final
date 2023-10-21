<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnactualizar_web'])) {
    // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
    include "../model/conexion_bd.php";

    // Verificar si la conexión se estableció correctamente
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario y validarlos
    $id = mysqli_real_escape_string($conexion, $_POST["id_web"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $descripcion = mysqli_real_escape_string($conexion, $_POST["dominio"]);
    $precio_mes = mysqli_real_escape_string($conexion, $_POST["id_usuario"]);
    $recursos_asignado = mysqli_real_escape_string($conexion, $_POST["config_servidor"]);
    $opcion = mysqli_real_escape_string($conexion, $_POST["opcion"]);
    // Preparar la consulta SQL para actualizar el usuario
    $sql = $conexion->prepare("UPDATE sitios_web SET nombre = ?, dominio = ?, id_usuario = ?, config_servidor = ?, estado = ? WHERE id_web  = ?");
    $sql->bind_param("ssissi", $nombre, $descripcion, $precio_mes, $recursos_asignado, $opcion, $id);

    // Ejecutar la consulta SQL
    if ($sql->execute()) {
        // Redireccionar a la página gestor.php
        header("Location: ../views/lista_sitios-web.php");
        exit; // Asegúrate de salir del script para evitar ejecuciones adicionales
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el sitio web: ' . $conexion->error . '</div>';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se ha enviado el formulario de actualización, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}

?>

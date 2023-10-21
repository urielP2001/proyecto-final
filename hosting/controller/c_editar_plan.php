<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btneditarplan'])) {
    // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
    include "../model/conexion_bd.php";

    // Verificar si la conexión se estableció correctamente
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario y validarlos
    $id = mysqli_real_escape_string($conexion, $_POST["id"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);
    $precio_mes = mysqli_real_escape_string($conexion, $_POST["precio"]);
    $recursos_asignado = mysqli_real_escape_string($conexion, $_POST["recursos"]);

    // Preparar la consulta SQL para actualizar el usuario
    $sql = $conexion->prepare("UPDATE planes_hosting SET nombre = ?, descripcion = ?, precio_mes = ?, recursos_asignados = ? WHERE id_plan = ?");
    $sql->bind_param("ssisi", $nombre, $descripcion, $precio_mes, $recursos_asignado, $id);

    // Ejecutar la consulta SQL
    if ($sql->execute()) {
        // Redireccionar a la página gestor.php
        header("Location: ../views/lista_plan.php");
        exit; // Asegúrate de salir del script para evitar ejecuciones adicionales
    } else {
        echo '<div class="alert alert-danger">Error al actualizar el usuario: ' . $conexion->error . '</div>';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se ha enviado el formulario de actualización, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}

?>

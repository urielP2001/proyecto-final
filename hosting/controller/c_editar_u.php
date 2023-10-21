<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnactualizar_u'])) {
    // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
    include "../model/conexion_bd.php";

    // Verificar si la conexión se estableció correctamente
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario y validarlos
    $id = mysqli_real_escape_string($conexion, $_POST["id"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);
    $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $contraseña = mysqli_real_escape_string($conexion, $_POST["contraseña"]);
    $email = mysqli_real_escape_string($conexion, $_POST["email"]);
    $tipo_cuenta = mysqli_real_escape_string($conexion, $_POST["opcion"]);

    // Preparar la consulta SQL para actualizar el usuario
    $sql = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, usuario = ?, contraseña = ?, email = ?, tipo_cuenta = ? WHERE id = ?");
    $sql->bind_param("ssssssi", $nombre, $apellido, $usuario, $contraseña, $email, $tipo_cuenta, $id);

    // Ejecutar la consulta SQL
    if ($sql->execute()) {
        // Redireccionar a la página gestor.php
        header("Location: ../views/lista_u.php");
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

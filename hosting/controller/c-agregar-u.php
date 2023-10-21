<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnagregar-u"])) {
    // Verificar si todos los campos están llenos
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["usuario"]) &&
        !empty($_POST["contraseña"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["opcion"])
    ) {
        // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
        include "../model/conexion_bd.php";
        
        if (!$conexion) {
            die("Error de conexión a la base de datos: " . mysqli_connect_error());
        }       
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $email = $_POST["email"];
        $tipo_cuenta = $_POST["opcion"];
        
        // Preparar la consulta SQL
        $sql = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, usuario, contraseña, email, tipo_plan) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssss", $nombre, $apellido, $usuario, $contraseña, $email, $tipo_cuenta);

        // Ejecutar la consulta SQL
        if ($sql->execute()) {
            echo '<div class="alert alert-success">Usuario agregado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar el usuario: ' . $conexion->error . '</div>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo '<div class="alert alert-danger">Todos los campos del formulario son obligatorios</div>';
    }
}

?>
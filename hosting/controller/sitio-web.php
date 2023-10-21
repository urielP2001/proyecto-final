<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_web"])) {
    // Verificar si todos los campos están llenos
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["dominio"]) &&
        !empty($_POST["usuario"]) &&
        !empty($_POST["id_usuario"]) &&
        !empty($_POST["config"]) &&
        !empty($_POST["estado"])
    ) {
        // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
        include "../model/conexion_bd.php";
        
        if (!$conexion) {
            die("Error de conexión a la base de datos: " . mysqli_connect_error());
        }       
        $nombre = $_POST["nombre"];
        $dominio = $_POST["dominio"];
        $id_usuario = $_POST["id_usuario"];
        $config = $_POST["config"];
        $estado = $_POST["estado"];
        
        // Preparar la consulta SQL
        $sql = $conexion->prepare("INSERT INTO sitios_web (nombre, dominio, id_usuario, config_servidor, estado) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $nombre, $dominio, $id_usuario, $config, $estado);

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
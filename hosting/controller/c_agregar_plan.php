<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_plan"])) {
    // Verificar si todos los campos están llenos
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["descripcion"]) &&
        !empty($_POST["recursos_asignados"]) &&
        !empty($_POST["precio_mes"])
        ) {
        // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
        include "../model/conexion_bd.php";
        
        if (!$conexion) {
            die("Error de conexión a la base de datos: " . mysqli_connect_error());
        }       
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $recursos_asignados = $_POST["recursos_asignados"];
        $precio_mes = $_POST["precio_mes"];
        
        // Preparar la consulta SQL
       
        $sql = $conexion->prepare("INSERT INTO planes_hosting (nombre, descripcion, recursos_asignados, precio_mes) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $nombre, $descripcion, $recursos_asignados, $precio_mes);

        // Ejecutar la consulta SQL
        if ($sql->execute()) {
            echo '<div class="alert alert-success">Agregado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar el plan: ' . $conexion->error . '</div>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo '<div class="alert alert-danger">Todos los campos del formulario son obligatorios</div>';
    }
}

?>
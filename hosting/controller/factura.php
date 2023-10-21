<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnfact"])) {
    // Verificar si todos los campos están llenos
    if (
        !empty($_POST["id_usuario"]) &&
        !empty($_POST["usuario"]) &&
        !empty($_POST["opcion"]) &&
        !empty($_POST["fechaEmision"]) &&
        !empty($_POST["fechaVencimiento"]) &&
        !empty($_POST["estado"]) &&
        !empty($_POST["montoTotal"])
        ) {
        // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
        include "../model/conexion_bd.php";
        
        if (!$conexion) {
            die("Error de conexión a la base de datos: " . mysqli_connect_error());
        }       
        $id_usuario = $_POST["id_usuario"];
        $usuario = $_POST["usuario"];
        $fecha_emision = $_POST["fechaEmision"];
        $fechaVencimiento = $_POST["fechaVencimiento"];
        $estado = $_POST["estado"];
        $montoTotal = $_POST["montoTotal"];
        // Preparar la consulta SQL
       
        $sql = $conexion->prepare("INSERT INTO facturacion (id_usuario, usuario, fecha_emision, fecha_vencimiento, estado, monto_total) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssss", $id_usuario, $usuario, $fecha_emision, $fechaVencimiento, $estado, $montoTotal);
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
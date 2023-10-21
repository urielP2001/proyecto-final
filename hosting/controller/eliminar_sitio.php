<?php
include "../model/conexion_bd.php";
if (!empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql=$conexion->query(" delete from sitios_web where id_web=$id ");
        if ($sql==1) {
            echo '<div class="alert alert-success">Elimanado correctamente</div>';
            header("location: ../views/lista_sitios-web.php");
        }else {
            echo '<div class="alert alert-warning">Error al eliminar</div>';
        }
    }


?>
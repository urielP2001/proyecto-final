<?php
include "../model/conexion_bd.php";
if (!empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql=$conexion->query(" delete from usuarios where id=$id ");
        if ($sql==1) {
            echo '<div class="alert alert-success">Elimanado correctamente</div>';
            header("location: ../views/lista_u.php");
        }else {
            echo '<div class="alert alert-warning">Error al eliminar</div>';
        }
    }


?>
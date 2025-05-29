<?php
    include("../admin/bd.php");

    if (isset($_GET['txtID'])){
        $ID_materia = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_materias WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$ID_materia);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        $pdf = $registro['plan'];

        $ruta = "../assets/documents/".$pdf;

        if(file_exists($ruta)){
            header("Content-disposition: attachment; filename=$pdf");
            header("Content-type: application/pdf");
            readfile($ruta);
        }else{
            echo "El archivo no existe en el servidor";
        }
    }else{
        echo "El archivo no se encontró en la base de datos";
    }
?>
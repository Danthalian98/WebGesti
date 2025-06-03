<?php
    include("../../bd.php");
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

        // ademas de los datos insertados en la base de datos tambien debemos borrar las 
        // imagenes creadas en el directorio, para ello se requiere de una consulta 
        // unicamente al campo de la imagen
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        // para eliminar la imagen
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"]));
            unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
        }
        // para eliminar los datos de la tabla segun su id
        $sentencia=$conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }

    //seleccionar registros
    // esta parte se encarga de extraer los datos de la bdd para luego ser mostradas en la tabla
    $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo;");
    $sentencia->execute();
    $lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID:</th>
                        <th scope="col">Imagen:</th>
                        <th scope="col">Nombre Completo:</th>
                        <th scope="col">Puesto:</th>
                        <th scope="col">X Facebook Linkedin:</th>
                        <th scope="col">Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_equipo as $registros){?>
                    <tr class="">
                        <td scope="col"><?php echo $registros['ID'];?></td>
                        <!-- cambiaremos la sintaxis de la imagen cambiandola por una etiqueta img para mostrar la imagen -->
                        <td scope="col"><img width="100" src="../../../assets/img/team/<?php echo $registros['imagen'];?>"/></td>
                        <!-- la sentencia antigua solo muestra el nombre del archivo: <td scope="col"><?php //echo $registros['imagen'];?></td>-->
                        <td scope="col"><?php echo $registros['nombrecompleto'];?></td>
                        <td scope="col"><?php echo $registros['puesto'];?></td>
                        <td scope="col"><?php echo $registros['X'];?></br><?php echo $registros['linkedin'];?></br><?php echo $registros['facebook'];?></td>
                        <td scope="col">
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
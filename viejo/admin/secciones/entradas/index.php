<?php 
    include("../../bd.php");
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

        // ademas de los datos insertados en la base de datos tambien debemos borrar las 
        // imagenes creadas en el directorio, para ello se requiere de una consulta 
        // unicamente al campo de la imagen
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        // para eliminar la imagen
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"]));
            unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
        }
        // para eliminar los datos de la tabla segun su id
        $sentencia=$conexion->prepare("DELETE FROM tbl_entradas WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }
    //seleccionar registros
    // esta parte se encarga de extraer los datos de la bdd para luego ser mostradas en la tabla
    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas;");
    $sentencia->execute();
    $lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_entradas as $registros) { ?>
                    <tr class="">
                        <td><?php echo $registros["ID"]?></td>
                        <td><?php echo $registros["titulo"]?></td>
                        <td><?php echo $registros["descripcion"]?></td>
                        <td><img width="100" src="../../../assets/img/about/<?php echo $registros["imagen"]?>"/></td>
                        <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                            |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>
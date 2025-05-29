<?php 
    include("../../bd.php");
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

        // para eliminar los datos de la tabla segun su id
        $sentencia=$conexion->prepare("DELETE FROM cComentarios WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }
    //seleccionar registros
    // esta parte se encarga de extraer los datos de la bdd para luego ser mostradas en la tabla
    $sentencia=$conexion->prepare("SELECT * FROM cComentarios;");
    $sentencia->execute();
    $lista_comentarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                        <th scope="col">Nombres</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_comentarios as $registros) { ?>
                    <tr class="">
                        <td><?php echo $registros["id"]?></td>
                        <td><?php echo $registros["nombre"]?></td>
                        <td><?php echo $registros["comentario"]?></td>
                        <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['id']; ?>" role="button">Editar</a>
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['id']; ?>" role="button">Eliminar</a>
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
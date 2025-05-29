<?php 
    include("../../bd.php");
    if (isset($_GET['txtID'])){
        // para eliminar los datos de la tabla segun su id
        $sentencia=$conexion->prepare("DELETE FROM tbl_informacion WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }

    //seleccionar registros
    // esta parte se encarga de extraer los datos de la bdd para luego ser mostradas en la tabla
    $sentencia=$conexion->prepare("SELECT * FROM tbl_informacion;");
    $sentencia->execute();
    $lista_informacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Costos</th>
                        <th scope="col">Competencias</th>
                        <th scope="col">Oportunidades</th>                        
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_informacion as $registros) { ?>
                    <tr class="">
                        <td><?php echo $registros["ID"]?></td>
                        <td><?php echo $registros["nombre"]?></td>
                        <td><?php echo $registros["descripcion"]?></td>
                        <td><?php echo $registros["costos"]?></td>
                        <td><?php echo $registros["competencias"]?></td>
                        <td><?php echo $registros["oportunidades"]?></td>
                        <td>
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                            <a name="" id="" class="btn btn-secondary" href="materias/indexMaterias.php?txtID=<?php echo $registros['ID']; ?>" role="button">Ver Materias</a>
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
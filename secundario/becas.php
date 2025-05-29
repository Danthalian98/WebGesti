<?php include("template/header.php");?>
<section class="py-5" id = "becas">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Becas:</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Becas Card -->
                <?php foreach($lista_becas as $registros){ ?>
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="fw-bolder"><?php echo $registros['nombre']?></h2>
                                    <p><?php echo $registros['descripcion']?></p>
                                    <a href="<?php echo $registros['link']?>">Consulte aqui...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>        
            </div>
        </div>
    </div>
</section>
<!-- Botón de Descarga -->

<?php include("template/footer.php");?>
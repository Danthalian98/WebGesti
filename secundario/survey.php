<?php include("template/header.php");?>
<section class="py-5" id = "survey">
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php foreach ($lista_survey as $registros) { ?>
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3><?php echo $registros['nombre']?></h3>
                        <a class="lead mb-0" href = "<?php echo $registros['link'] ?>">Iniciar cuestionario</a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php include("template/footer.php");?>
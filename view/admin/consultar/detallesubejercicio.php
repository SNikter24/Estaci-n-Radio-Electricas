<?php require './view/header.php'; ?>

<div class="container col-sm-12">
    <h1 class="display-6 border-bottom border-dark">
        <?php echo $this->aviso; ?>
    </h1>

    <div class="container">
        <div class="<?php echo $this->alerta; ?> center" role="alert">
            <?php echo $this->mensaje; ?>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row justify-content-center mb-3">
            <?php
            if (!isset($this->Items)) { ?>
                <div class="container">
                    <div class="alert alert-primary center" role="alert">
                        No hay registros de empleados
                    </div>
                </div>
            <?php } else { ?>
                <form action="<?php echo constant('URL'); ?>Consultar/actualizarsubejercicio" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id</label>
                        <input type="number" name="id" class="form-control" aria-describedby="emailHelp" value="<?php echo $this->Items->id ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $this->Items->nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">contenido</label>
                        <input type="text" name="contenido" class="form-control" value="<?php echo $this->Items->contenido ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">imagen</label>
                        <input type="text" name="imagen" class="form-control" value="<?php echo $this->Items->imagen ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">enlace</label>
                        <input type="text" name="enlace" class="form-control" value="<?php echo $this->Items->enlace ?>">
                    </div>

                    <div class="row g-3">
                                <a type="button" href="<?php echo constant('URL') ?>Consultar/CargarsubEjercicio"
                                    class="btn btn-outline-secondary mb-0">Volver</a>
                                <button class="btn btn-secondary" type="submit">ACTUALIZAR</button>
                    </div>
                    
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function noEditarCampoEntrada() {
        var idnoticiaInput = document.getElementById("id");
        idnoticiaInput.readOnly = true;
    }

    // Llamar a la función cuando se cargue la página
    window.onload = noEditarCampoEntrada;
</script>

<?php require 'view/footer.php'; ?>
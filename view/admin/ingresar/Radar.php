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

    <form action="<?php echo constant('URL'); ?>Ingresar/registrarRadar" method="POST">

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                ID
                            </span>
                            <input type="number" name="id" class="form-control" placeholder="123456789" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Nombre
                            </span>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del ítem" required>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <button class="btn btn-secondary" type="submit">REGISTRAR</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require 'view/footer.php'; ?>

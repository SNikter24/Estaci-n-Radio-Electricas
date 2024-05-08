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

    <form action="<?php echo constant('URL'); ?>Ingresar/registrarProveedor" method="POST">

        <!-- Código, Dir_imagen, Avaluo, Estado-->

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                NIT
                            </span>
                            <input type="number" name="nit" class="form-control" placeholder="123456789" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Nombre Empresa
                            </span>
                            <input type="text" name="nombre" class="form-control" placeholder="PROVEEDORES S.A.S"
                                required>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Correo
                            </span>
                            <input type="email" name="correo" class="form-control" placeholder="proveedor@proveedor.com" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Contacto
                            </span>
                            <input type="number" name="contacto" class="form-control" placeholder="31332569" required>
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
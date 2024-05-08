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

    <form action="<?php echo constant('URL'); ?>Ingresar/registrarProducto" method="POST" enctype="multipart/form-data">

        <!-- Código, Dir_imagen, Avaluo, Estado-->

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Nombre producto
                            </span>
                            <input type="text" name="nombre" class="form-control" placeholder="Ejemplo: Chaqueta de cuero negra">
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Cantidad
                            </span>
                            <input type="text" name="cantidad" class="form-control" placeholder="50">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Ubicación
                            </span>
                            <input type="text" name="ubicacion" class="form-control" placeholder="Estante 3, Lugar 7">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Fecha ingreso
                            </span>
                            <input type="date" name="f_ingreso" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-7">
                        <div class="input-group mb-3">
                            <input name="imagen" id="imagen" class="form-control" type="file">
                            <span class="input-group-text" id="basic-addon1">
                                Imagen
                            </span>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Avaluo
                            </span>
                            <input type="text" name="avaluo" class="form-control" placeholder="1'500.000">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Estado
                            </span>
                            <select name="estado" class="form-select" aria-label="Default select example">
                                <?php
                                foreach ($this->opcEstado as $fila) {
                                    $estado = new EstadoProducto();
                                    $estado = $fila;

                                    ?>
                                    <option value="<?php echo $estado->id ?>"><?php echo $estado->id ?>.<?php echo $estado->descripcion ?></option>
                                    <?php
                                }
                                ?>
                            </select>
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
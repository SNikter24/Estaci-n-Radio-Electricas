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

    <form action="<?php echo constant('URL'); ?>Ingresar/registrarFactura" method="POST">

        <!-- Código, Dir_imagen, Avaluo, Estado-->
        <section class="spikes"></section>
        <div class="card p-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Numero factura
                            </span>
                            <?php
                            foreach ($this->numeroFact as $fila) {
                                $estado = new NumeroProximoFactura();
                                $estado = $fila;

                                ?>
                                <input type="text" name="numeroFactura" class="form-control"
                                    value="<?php echo $estado->numero + 1 ?>" disabled>
                                <?php
                            }

                            if (empty($estado->numero)) { ?>
                                <input type="text" name="numeroFactura" class="form-control" value="1" disabled>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <div class="row g-3">
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Método pago
                            </span><select name="metodoPago" class="form-select" aria-label="Default select example">
                                <?php
                                foreach ($this->opcMetodopago as $fila) {
                                    $estado = new MetodoPago();
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
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Cédula Empleado
                            </span>
                            <input type="number" id="cedulaEmpleado" name="cedulaEmpleado"
                                value="<?php echo $_SESSION['cedulaEmpleado']; ?>" class="form-control" placeholder="" readonly>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Fecha Generación
                            </span>
                            <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control"
                                placeholder="" disabled>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Total
                            </span>
                            <input type="number" name="totalFactura" class="form-control" placeholder="1500000"
                                required>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <button class="btn btn-secondary" type="submit">REGISTRAR</button>
                </div>
            </div>
        </div>
        <section class="spikes"></section>
    </form>
</div>

<script>
    function noEditarCampoEntrada() {
        var cedulaEmpleadoInput = document.getElementById("cedulaEmpleado");
        cedulaEmpleadoInput.readOnly = true;
    }

    // Llamar a la función cuando se cargue la página
    window.onload = noEditarCampoEntrada;
</script>

<script>
    // Obtener referencia al campo de entrada de fecha
    var fechaInput = document.getElementById("fechaRegistro");

    // Obtener la fecha actual
    var fechaActual = new Date();

    // Formatear la fecha en el formato YYYY-MM-DD
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1; // Los meses en JavaScript son indexados desde 0
    var anio = fechaActual.getFullYear();

    // Agregar ceros a la izquierda si es necesario (ejemplo: 01 en lugar de 1)
    if (dia < 10) {
        dia = "0" + dia;
    }
    if (mes < 10) {
        mes = "0" + mes;
    }

    // Establecer la fecha actual en el campo de entrada
    fechaInput.value = anio + "-" + mes + "-" + dia;
</script>

<?php require 'view/footer.php'; ?>
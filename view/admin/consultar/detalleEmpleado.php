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
            <!--<form class="d-flex mb-3" role="Buscar" method="POST"
                action="<?php echo constant('URL'); ?>Consultar/palabraClave">
                <input type="text" id="palabraClave" name="palabraClave" class="form-control me-2" type="search"
                    placeholder="<?php echo $this->vista->palabra; ?>" aria-label="Search">Holis
                <button class="btn btn-sm btn-outline-secondary" type="Buscar">Buscar</button>
            </form>-->
            <?php
            if (!isset($this->empleados)) { ?>
                <div class="container">
                    <div class="alert alert-primary center" role="alert">
                        No hay registros de empleados
                    </div>
                </div>
                <?php
            } else { ?>

                <form action="<?php echo constant('URL'); ?>Consultar/actualizarEmpleado" method="POST">

                    <!-- Código, Dir_imagen, Avaluo, Estado-->

                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            Cédula
                                        </span>
                                        <input type="number" id="cedula" name="cedula"
                                            value="<?php echo $this->empleado->cedula; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            Estado
                                        </span>
                                        <select name="estado" class="form-select" aria-label="Default select example">
                                            <option value="<?php echo $this->empleado->rol ?>"><?php echo $this->empleado->rol ?>.<?php echo $this->empleado->cargo ?>
                                                (Actual)
                                            </option>

                                            <?php
                                            foreach ($this->opcEstado as $fila) {
                                                $estado = new RolEmpleado();
                                                $estado = $fila;

                                                if ($estado->id != $this->empleado->rol) {

                                                    ?>
                                                    <option value="<?php echo $estado->id ?>"><?php echo $estado->id ?>.<?php echo $estado->cargo ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            Apellido
                                        </span>
                                        <input type="text" name="apellido" value="<?php echo $this->empleado->apellido ?>"
                                            class="form-control" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-sm">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            Nombre
                                        </span>
                                        <input type="text" name="nombre" value="<?php echo $this->empleado->nombre ?>"
                                            class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            Correo
                                        </span>
                                        <input type="email" name="correo" value="<?php echo $this->empleado->correo ?>"
                                            class="form-control" placeholder="example@example.com" required>
                                    </div>
                                </div>
                            </div>

                            <?php
                            foreach ($this->opcNumeros as $fila) {
                                $numero = new CelularesEmpleado();
                                $numero = $fila;

                                ?>
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                Telefono
                                            </span>
                                            <input type="number" name="telefono" value="<?php echo $numero->numero ?>"
                                                class="form-control" placeholder="" required>
                                            <a class="btn btn-danger"
                                                href="<?php echo constant('URL') . 'Consultar/eliminarNumeroEmpleado/' . $this->empleado->cedula . '/' . $numero->numero ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div id="telefonos">
                                        <!-- Aquí se agregarán los inputs de número de teléfono -->
                                    </div>
                                    <button type="button" class="btn btn-secondary mb-2" onclick="agregarTelefono()">Agregar
                                        teléfono</button>
                                </div>
                            </div>

                            <div class="row g-3">
                                <a type="button" href="<?php echo constant('URL') ?>Consultar/cargarEmpleado"
                                    class="btn btn-outline-secondary mb-0">Volver</a>
                                <button class="btn btn-secondary" type="submit">ACTUALIZAR</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    function noEditarCampoEntrada() {
        var cedulaEmpleadoInput = document.getElementById("cedulaEmpleado");
        cedulaEmpleadoInput.readOnly = true;
    }

    // Llamar a la función cuando se cargue la página
    window.onload = noEditarCampoEntrada;
</script>

<script type="text/javascript">
    function agregarTelefono() {
        var telefonoContainer = document.getElementById("telefonos");

        // Crear un nuevo elemento input de tipo number
        var telefonoInput = document.createElement("input");
        telefonoInput.type = "number";
        telefonoInput.name = "telefonoNuevo[]"; // Utilizamos corchetes para indicar que es un array
        telefonoInput.classList.add("form-control", "mb-2"); // Agregamos la clase form-control
        telefonoInput.placeholder = "Digite el número"; // Agregamos el atributo placeholder

        // Agregar el nuevo input al contenedor
        telefonoContainer.appendChild(telefonoInput);
    }
</script>

<?php require 'view/footer.php'; ?>
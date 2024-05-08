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
            <div class="overflow-y-scroll" style="max-width: 80%; max-height: 576px;">


                <div class="container">
                    <div class="center m-2 p-2 inline" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16" style="color: blue;">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg> Para consultar todos los empleados sin barra de
                        busqueda, solo de clic en buscar sin ningún
                        dato en la barra
                    </div>
                </div>
                <form class="d-flex mb-3" role="Buscar" method="POST"
                    action="<?php echo constant('URL'); ?>Consultar/palabraClave">
                    <input type="text" id="palabraClave" name="palabraClave" class="form-control me-2" type="search"
                        placeholder="Buscar por nombre" aria-label="Search">
                    <button class="btn btn-sm btn-outline-secondary" type="Buscar">Buscar</button>
                </form>
                <?php
                if (empty($this->empleados)) { ?>
                    <div class="container">
                        <div class="alert alert-primary center" role="alert">
                            No hay registros de empleados
                        </div>
                    </div>
                    <?php
                } else {
                    foreach ($this->empleados as $fila) {
                        $empleado = new Empleado();
                        $empleado = $fila;
                        ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card text-bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $empleado->nombre ?>
                                        <?php echo $empleado->apellido ?>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">
                                        Cargo:
                                        <?php echo $empleado->rol ?>
                                    </h6>
                                    <p class="card-text fw-bold">
                                        Correo:
                                        <?php echo $empleado->correo ?>
                                        <br>
                                        Cédula:
                                        <?php echo $empleado->cedula ?>
                                    </p>
                                    <a href="<?php echo constant('URL') . 'Consultar/verEmpleado/' . $empleado->cedula ?>"
                                        class="btn btn-outline-warning" title="Actualizar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                            class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </a> |
                                    <a href="<?php echo constant('URL') . 'Consultar/eliminarEmpleado/' . $empleado->cedula ?>"
                                        class="btn btn-outline-danger" title="Elimiar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <!--<div class="card">
                            <h5 class="card-header">Nombre y Apellido del Empleado</h5>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>-->
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php require 'view/footer.php'; ?>
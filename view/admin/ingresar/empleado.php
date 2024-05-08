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

    <form action="<?php echo constant('URL'); ?>Ingresar/registrarEmpleado" method="POST">

        <!-- Código, Dir_imagen, Avaluo, Estado-->

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Cédula
                            </span>
                            <input type="number" name="cedula" class="form-control" placeholder="123456789" required>
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
                                    $estado = new RolEmpleado();
                                    $estado = $fila;

                                    ?>
                                    <option value="<?php echo $estado->id ?>"><?php echo $estado->id ?>.<?php echo $estado->cargo ?></option>
                                    <?php
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
                            <input type="text" name="apellido" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Nombre
                            </span>
                            <input type="text" name="nombre" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Correo
                            </span>
                            <input type="email" name="correo" class="form-control" placeholder="example@example.com"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                Clave
                            </span>
                            <div id="clave">
                                <!-- aca clave -->
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="generarContrasena()">Generar
                                contraseña</button>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div id="telefonos">
                            <!-- Aquí se agregarán los inputs de número de teléfono -->
                        </div>
                        <button type="button" class="btn btn-secondary mb-2" onclick="agregarTelefono()">Agregar
                            teléfono</button>
                    </div>
                </div>

                <div class="row g-3">
                    <button class="btn btn-secondary" type="submit">REGISTRAR</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function agregarTelefono() {
        var telefonoContainer = document.getElementById("telefonos");

        // Crear un nuevo elemento input de tipo number
        var telefonoInput = document.createElement("input");
        telefonoInput.type = "number";
        telefonoInput.name = "telefono[]"; // Utilizamos corchetes para indicar que es un array
        telefonoInput.classList.add("form-control", "mb-2"); // Agregamos la clase form-control
        telefonoInput.placeholder = "Digite el número"; // Agregamos el atributo placeholder

        // Agregar el nuevo input al contenedor
        telefonoContainer.appendChild(telefonoInput);
    }

    function generarContrasena() {
        var claveContainer = document.getElementById("clave");

        // Crear un nuevo elemento input de tipo number
        var claveInput = document.createElement("input");
        claveInput.type = "text";
        claveInput.classList.add("form-control", "mb-2");
        claveInput.name = "clave";

        // Caracteres válidos para la contraseña
        var caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var longitud = 8; // Longitud de la contraseña

        var contrasena = "";

        // Generar la contraseña aleatoria
        for (var i = 0; i < longitud; i++) {
            var indice = Math.floor(Math.random() * caracteres.length);
            contrasena += caracteres.charAt(indice);
        }

        // Mostrar la contraseña en el input
        //document.getElementById("clave").value = contrasena;
        claveInput.value = contrasena;
        // Agregar el nuevo input al contenedor
        claveContainer.appendChild(claveInput);
    }
</script>

<?php require 'view/footer.php'; ?>
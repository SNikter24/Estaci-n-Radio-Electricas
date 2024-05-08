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
                <?php
                if (empty($this->Items)) { ?>
                    <div class="container">
                        <div class="alert alert-primary center" role="alert">
                            No hay registros de archivos
                        </div>
                    </div>
                <?php
                } else {
                    foreach ($this->Items as $fila) {
                        $Items = new Archivos();
                        $Items = $fila;
                        ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card text-bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $Items->ID_Archivo ?>
                                    </h5>
                                    <p class="card-text fw-bold">
                                        Nombre del Archivo:
                                        <?php echo $Items->Nombre_Archivo ?>
                                    </p>
                                    <p class="card-text fw-bold">
                                        Usuario que subio el archivo:
                                        <?php echo $Items->cedula ?>
                                    </p>
                                    <p class="card-text fw-bold">
                                        fecha de subida:
                                        <?php echo $Items->Fecha_Subida ?>
                                    </p>
                                </div>
                            </div>
                           
                            <a href="<?php echo constant('URL') . 'Consultar/descargarArchivo/' . $Items->ID_Archivo ?>"
                                    class="btn btn-outline-success" title="Descargar" download>
                                        Descargar PDF
                            </a>
                            <a href="<?php echo constant('URL') . 'Consultar/eliminarArchivos/' . $Items->ID_Archivo ?>"
                             class="btn btn-outline-danger" title="Eliminar">
                                Eliminar 
                             </a>

                            

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

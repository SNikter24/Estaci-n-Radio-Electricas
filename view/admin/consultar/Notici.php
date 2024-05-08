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
                if (empty($this->noticias)) { ?>
                    <div class="container">
                        <div class="alert alert-primary center" role="alert">
                            No hay registros de noticias
                        </div>
                    </div>
                    <?php
                } else {
                    foreach ($this->noticias as $fila) {
                        $noticia = new Noticia();
                        $noticia = $fila;
                        ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card text-bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $noticia->id ?>
                                        <?php echo $noticia->image ?>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">
                                        titulo:
                                        <?php echo $noticia->title ?>
                                    </h6>
                                    <p class="card-text fw-bold">
                                        
                                        <br>
                                        
                                        <?php echo $noticia->description ?>
                                        <?php echo $noticia->link ?>
                                    </p>
                                   
                                </div>
                            </div>
                                <a href="<?php echo constant('URL') . 'Consultar/verNoticia/' . $noticia->id ?>"
                                        class="btn btn-outline-warning" title="Actualizar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                            class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </a> |
                             
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
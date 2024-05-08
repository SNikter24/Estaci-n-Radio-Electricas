<?php require './view/header.php'; ?>

<div class="container col-sm-12">

    <h1 class="display-6 border-bottom border-dark">
        <?php echo $this->aviso; ?>
    </h1>

    <div class="card col-sm-12 col-lg-12">
        <div class="card-header" type="button" data-bs-toggle="collapse" data-bs-target="#menuRegistrar"
            aria-expanded="false" aria-controls="collapseExample">
            <h5>REGISTRAR</h5>
        </div>

        <div id="menuRegistrar" class="collapse container-fluid">
            <div class="container p-2 d-flex justify-content-center">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/proveedor-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">contenido</h5>
                                        <p class="card-text">Registro de nuevos Contenidos 
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                                    <path
                                                        d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarItem">Formulario
                                                Items</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">subitems</h5>
                                        <p class="card-text">Registro de subitems
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarSubitems">Formulario
                                                subitems</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Radar</h5>
                                        <p class="card-text">Registro de Radar
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarRadar">Formulario
                                                Radar</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">subRadar</h5>
                                        <p class="card-text">Registro de subRadar
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarSubRadar">Formulario
                                                SubRadar</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    


                

                </div>
            </div>
            <div class="container p-2">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/abastecimiento-card.jpg"
                                        class="img-fluid rounded-start" alt="abastecimiento">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Ejercicios</h5>
                                        <p class="card-text">Registro de LOS EJERCICIOS
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarEjercicio">Formulario
                                                Ejercicios</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/empleado-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Usuarios</h5>
                                        <p class="card-text">Registro de nuevos Usuarios
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarEmpleado">Formulario
                                                Usuarios</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/empleado-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">SubEjercicios</h5>
                                        <p class="card-text">Registro de nuevos sub ejercicios
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarSubejercicios">Formulario
                                                subejercicios</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                      

                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Programacion</h5>
                                        <p class="card-text">Registro de Programacion
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarProgramas">Formulario
                                                Programacion</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
               



                 <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Sub Programacion</h5>
                                        <p class="card-text">Registro de SubProgramacion
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarSubPrograma">Formulario
                                                SubProgramacion</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-3" style="max-width: 550px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo constant('URL'); ?>/view/public/img/factura-card.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Comentarios</h5>
                                        <p class="card-text">Registro de Comentarios
                                        </p>
                                        <p>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                                    <path
                                                        d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                                </svg>
                                            </span>
                                            <a type="button" class="btn btn-outline-dark"
                                                href="<?php echo constant('URL'); ?>Ingresar/cargarComentarios">Formulario
                                                Comentarios</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                
                 

            </div>
        </div>
    </div>

    <div class="card col-sm-12 col-lg-12 mt-3">
        <div class="card-header" type="button" data-bs-toggle="collapse" data-bs-target="#menuConsultar"
            aria-expanded="false" aria-controls="collapseExample">
            <h5>CONSULTAR</h5>
        </div>

        <div id="menuConsultar" class="collapse container-fluid">
            <a href="<?php echo constant('URL') ?>Consultar/cargarEmpleado" class="m-2 btn btn-secondary"> usuario </a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarItems" class="m-2 btn btn-secondary"> item </a>
            <a href="<?php echo constant('URL') ?>Consultar/Cargarsubitems" class="m-2 btn btn-secondary">subitems</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarNoticias" class="m-2 btn btn-secondary"> noticias</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarEjercicio" class="m-2 btn btn-secondary"> Ejericio</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarsubEjercicio" class="m-2 btn btn-secondary"> subejercicio</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarRadar" class="m-2 btn btn-secondary"> Radar</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarsubRadar" class="m-2 btn btn-secondary"> SubRadar</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarPrograma" class="m-2 btn btn-secondary"> Programa</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarsubPrograma" class="m-2 btn btn-secondary"> SubPrograma</a>
            <a href="<?php echo constant('URL') ?>Consultar/CargarArchivo" class="m-2 btn btn-secondary"> Observaciones</a>
        </div>
    </div>
</div>

<?php require 'view/footer.php'; ?>
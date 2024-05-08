<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/view/public/img/ico2.ico" />
    <title>
        <?php echo $this->titulo; ?> | Redes Inalambricas
    </title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/view/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/view/public/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/view/public/css/separator.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/view/public/css/carta-productos.css">
</head>

<body>
    <?php
    if (isset($_SESSION['rol']) && $_SESSION['rol'] != 3) { ?>

        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="badge text-dark navbar-brand font-monospace text-wrap">
                    <marquee>
                        Sesión Abierta:
                        <?php echo $_SESSION['rolMostrar']; ?> |
                        <?php echo $_SESSION['nombreEmpleado']; ?>
                    </marquee>
                </a>
                <a class="btn btn-danger" title="Cerrar sesión" href="<?php echo constant('URL'); ?>Login/cerrarSesion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg"
                        viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </a>
            </div>
        </nav>

        <?php
    }
    ?>
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo constant('URL'); ?>">
                <img src="<?php echo constant('URL'); ?>/view/public/img/logoU.png" class="rounded-circle" alt="logo"
                  style="width:70px; height:70px;">
            </a>
            <a class="navbar-brand" href="<?php echo constant('URL'); ?>">
                <p class="lead font-italic">
                 Estación  Radio Electricas (Bandas Diferentes a IMT)
                </p>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="btn btn-outline-dark"><a class="dropdown-item"
                                href="<?php echo constant('URL'); ?>">Inicio</a></li>&nbsp&nbsp&nbsp
                        <li class="btn btn-outline-dark"><a class="dropdown-item"
                                href="<?php echo constant('URL'); ?>Contenido">Proyecto</a></li>&nbsp&nbsp&nbsp
                        <li class="btn btn-outline-dark"><a class="dropdown-item"
                                href="<?php echo constant('URL'); ?>Ejercicios">Integrantes</a></li>&nbsp&nbsp&nbsp
                        <li class="btn btn-outline-dark"><a class="dropdown-item"
                                href="<?php echo constant('URL'); ?>Programa">Programación</a></li>&nbsp&nbsp&nbsp       
                     
                        
                        
                    </ul>
                    <?php
                    if (isset($_SESSION['rol']) && $_SESSION['rol'] != 3) {
                        ?>
                        <a class="btn btn-dark" href="<?php echo constant('URL'); ?>Login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-house" viewBox="0 0 16 16">
                                <path
                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                            </svg>
                        </a>
                        <?php

                    } else {
                        ?>
                        <div class="d-flex">
                            <a class="btn btn-outline-dark" href="<?php echo constant('URL'); ?>Login">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                                <path fill-rule="evenodd"
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                            </svg>
                                        </div>
                                        <div class="col">
                                            Ingresar
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    &nbsp&nbsp
                   
                </div>
            </div>
        </div>
    </nav>
    



    
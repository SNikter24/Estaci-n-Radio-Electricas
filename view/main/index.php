<?php require 'view/header.php'; ?>

<div class="container">

    
 <div class="container overflow-auto" background-color:white;">
       <div class="embed-responsive embed-responsive-16by9 rounded">
            <div class=" display-3 h4 pb-2 mb-4 text-dark border-bottom border-dark">
                ¡Fotos del proyecto!
            </div>
            <div id="carouselExampleControls" class="carousel slide rounded" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        
                        <img src="./view/public/img/Antena1.jpg" class="d-block w-100 "
                            style=" width: 30px;  height: 600px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        
                        <img src="./view/public/img/conectar.jpeg" class="d-block w-100 "
                            style=" width: 30px;  height: 600px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        
                        <img src="./view/public/img/universidad.png" class="d-block w-100 "
                            style=" width: 30px;  height: 600px;" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>
            <br>
                   <h1>Aca comienza las otras tarjetas</h1>
                   
                   <?php 
                      require_once "libs/BaseDatos.php";

                      // Crear una instancia de la clase BaseDatos
                      $baseDatos = new BaseDatos();
                      
                      // Realizar la consulta SQL para obtener los datos de la tabla
                      $query = $baseDatos->conectar()->query('SELECT * FROM noticias');
                      $resultado = $query->fetchAll();
                      
                      // Verificar si se obtuvieron resultados
                      if (count($resultado) > 0) {
                          // Inicializar contador para las columnas
                          $columnCount = 0;
                      
                          // Iterar sobre los resultados y mostrar las tarjetas
                          foreach ($resultado as $row) {
                              // Si se alcanza el límite de 3 columnas, cerrar la fila y abrir una nueva
                              if ($columnCount % 3 === 0) {
                                  echo '<div class="row">';
                              }
                               
                              echo '<div class="col-md-4 text-center">';
                                echo '<div class="card mx-auto" style="width: 18rem;">';
                                echo '<img src="' . $row["image"] . '" class="card-img-top" alt="...">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $row["title"] . '</h5>';
                                echo '<p class="card-text">' . $row["description"] . '</p>';
                                echo '<a href="' . $row["link"] . '" target="_blank" class="btn btn-primary">Ir a la noticia</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</br>';

                              // Incrementar el contador de columnas
                              $columnCount++;
                      
                              // Si se alcanza el límite de 3 columnas, cerrar la fila
                              if ($columnCount % 3 === 0) {
                                  echo '</div>';
                              }
                          }
                      
                          // Si el número total de columnas no es divisible por 3, cerrar la fila
                          if ($columnCount % 3 !== 0) {
                              echo '</div>';
                          }
                      } else {
                          echo "No se encontraron tarjetas.";
                      }
                      
                     
                        
                    ?>
  
                 
        </div>
        <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark">
        
        </div> 
            
        
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" style="text-align:center;">
                <h2 class="display-6">
                     Descripcion
                </h2>
                <p class="text-justify">
                 Bienvenido al tutorial educativo de desarrollo <br> del pensamiento computacional
                  mediante  la programación de un radar en Arduino. En esta página web,
                   encontrarás todo lo que necesitas para adentrarte en el apasionante 
                   mundo de la programación y el pensamiento computacional utilizando 
                   la plataforma Arduino. Aprenderás a construir un radar funcional 
                   que te permitirá detectar objetos y visualizarlos en tiempo real.
                    Nuestro tutorial está diseñado de manera clara y accesible, 
                    proporcionando instrucciones detalladas, ejemplos de código y explicaciones paso a paso. 
                    No importa si eres un principiante o tienes experiencia previa en programación, 
                    nuestro contenido te guiará desde los conceptos básicos hasta los niveles más avanzados

                </p>

            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" style="text-align:center;">
                <h2 class="display-6">
                    Objetivo General
                </h2>
                <p class="text-justify">
                    Diseñar un tutorial educativo para el desarrollo de pensamiento computacional
                    a través de la programación de 
                    un radar con Arduino
                </p>

            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" style="text-align:center;">
                <h2 class="display-6">
                    Objetivos Especificos
                </h2>
                <p class="text-justify">
                        • Elaborar el estado del arte de la aplicación de Arduino para el desarrollo del pensamiento 
                        computacional<br> 
                        • Diseñar un modelo de tutorial educativo para el desarrollo de pensamiento computacional en 
                        estudiantes de primer semestre del Proyecto Curricular de Sistematización de Datos<br> 
                        • Desarrollar un prototipo de tutorial educativo para el desarrollo de pensamiento computacional en 
                        estudiantes de primer semestre del Proyecto Curricular de Sistematización de Datos <br>
                        • Validar el modelo diseñado a través de la aplicación del prototipo
                </p>

            </div>
        </div>
        <br>
        <br>

        
    </div>
       
    <!-- Gallery 
    <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark">
        <h1 class="display-5">GALERÍA</h1>
        <h1 class="display-5">
            <?php
            //$this->showMessages();
            ?>
        </h1>
    </div>
    <div class="container overflow-auto" style="height:800px">
        <?php
        for ($i = 1; $i <= 7; $i++) {
            ?>
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="./view/public/img/img1.jpeg" class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water" />

                    <img src="./view/public/img/img2.jpeg" class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="./view/public/img/img3.jpeg" class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds" />

                    <img src="./view/public/img/ico.ico" class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="./view/public/img/img2.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                    <img src="./view/public/img/img1.jpeg" class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park" />
                </div>
            </div>
            <?php
        }
        ?>
    </div>-->
</div>


<?php require 'view/footer.php'; ?>
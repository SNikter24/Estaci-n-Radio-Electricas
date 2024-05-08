<?php 
require './view/header.php'; 
require_once "libs/BaseDatos.php";

$baseDatos = new BaseDatos();
$items = $baseDatos->conectar()->query('SELECT * FROM radar')->fetchAll(PDO::FETCH_ASSOC);
$subitems = $baseDatos->conectar()->query('SELECT * FROM subradar')->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Incluye Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Incluye jQuery y Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav" id="items-navbar">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contenidos
          </a>
          <ul class="dropdown-menu" id="items-dropdown">
            <?php
            foreach ($items as $item) {
                echo "<li><a class=\"dropdown-item item-link\" href=\"#\" data-item-id=\"{$item['id']}\">{$item['nombre']}</a></li>";
            }
            ?>
          </ul>
        </li>
        <!-- Aquí se agregarán los subitems cuando se seleccione un item -->
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4" id="content-container">
    <!-- Aquí se mostrará el contenido del subitem cuando se haga clic en él -->
</div>

<script>
$(document).ready(function(){
  // Almacena los subitems en una variable para evitar consultas a la base de datos cada vez que se hace clic en un item
  const subitems = <?php echo json_encode($subitems); ?>;
  
  // Función que se ejecuta cuando se hace clic en un item
  $('.item-link').on('click', function(e) {
    e.preventDefault();  // Evita que la página se recargue al hacer clic en el enlace

    const itemId = $(this).data('item-id');
    
    // Filtra los subitems para obtener solo los que corresponden al item seleccionado
    const relevantSubitems = subitems.filter(subitem => subitem.id_item === itemId);
    
    // Limpia la sección de subitems de la barra de navegación
    $('#items-navbar .subitem-link').parent().remove();
    
    // Añade los subitems relevantes a la barra de navegación
    relevantSubitems.forEach(subitem => {
      $('#items-navbar').append(`
        <li class="nav-item">
          <a class="nav-link subitem-link" href="#" data-subitem-id="${subitem.id}">${subitem.nombre}</a>
        </li>
      `);
    });
  });

  // Función que se ejecuta cuando se hace clic en un subitem
  $(document).on('click', '.subitem-link', function(e) {
  e.preventDefault();  // Evita que la página se recargue al hacer clic en el enlace

  const subitemId = $(this).data('subitem-id');

  // Busca el subitem correspondiente
  const subitem = subitems.find(subitem => subitem.id === subitemId);

  // Muestra el contenido del subitem
  const formattedContent = subitem.contenido.replace(/\./g, '.<br>'); // Añade un salto de línea después de cada punto
  
  // Prepara el contenido del contenedor
  let containerContent = `
    <h5>${subitem.nombre}</h5>
    <p class="text-justify">${formattedContent}</p>
    ${subitem.imagen ? `<img src="${subitem.imagen}" alt="${subitem.nombre}" class="img-fluid">` : ''}
  `;

  // Si el subitem es "Evaluación", prepara la visualización del video
  if (subitem.nombre === "Evaluación" && subitem.enlace) {
    const driveFileId = subitem.enlace.split('/file/d/')[1].split('/view')[0];
    containerContent += `
      <iframe src="https://drive.google.com/file/d/${driveFileId}/preview" width="1100" height="700"></iframe>
      <a href="${subitem.enlace}" class="btn btn-primary mt-4" target="_blank">Clic aca si no carga el video</a>
    `;
  }

  // Si el subitem tiene un enlace y no es "Evaluación", añade el enlace al contenedor
  else if (subitem.enlace) {
    containerContent += `<a href="${subitem.enlace}" class="btn btn-primary mt-4" target="_blank">Ver más</a>`;
  }

  $('#content-container').html(containerContent);
});

});
</script>

<?php require 'view/footer.php'; ?>

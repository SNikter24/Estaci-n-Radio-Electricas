<?php require 'view/header-error.php'; ?>

<div class="container mt-5">
  <div class="card card border-danger mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor"
      class="card-header card-img-top bi bi-exclamation-octagon-fill text-danger p-3" viewBox="0 0 16 16">
      <path
        d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <div class="card-body">
      <h5 class="card-title">404 - RECURSO NO ENCONTRADO</h5><figure class="text-end">
        <blockquote class="blockquote">
          <p>Lo sentimos, en el momento no encontramos el recurso solicitado, por favor dar clic <a
              href="<?php echo constant('URL'); ?>" class="fst-italic">AQUÍ</a> para volver a inicio</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Tienda Latitud0. <cite title="Source Title">Siempre de tu lado</cite>
        </figcaption>
      </figure>
    </div>
  </div>
</div>

</body>

</html>
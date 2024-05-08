<?php require 'view/header.php'; ?>

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Iniciar Sesión</h4>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="<?php echo $this->alert; ?> fs-6 center m-3" role="alert">
              <h6>
                <?php echo $this->mensaje; ?>
              </h6>
            </div>
          </div>
          <form method="POST" action="<?php echo constant('URL'); ?>Login/validando">
            <div class="mb-3">
              <label for="username" class="form-label">Cédula:</label>
              <input type="text" class="form-control" id="cedula" name="cedula" placeholder="12345..." required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Clave</label>
              <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'view/footer.php'; ?>
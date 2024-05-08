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

    <!DOCTYPE html>
    <html>
    <head>
    <title>Registro de SUBPROGRAMA</title>
    </head>
    <body>
    <h2>Registrar SUBPROGRAMA</h2>

    <form method="post" action="<?php echo constant('URL'); ?>Ingresar/registrarSubPrograma">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido"></textarea><br>

        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen"><br>

        <label for="enlace">Enlace:</label>
        <input type="text" id="enlace" name="enlace"><br>

        <label for="id_item">Item:</label>
        <select name="id_item" id="id_item">
            <?php foreach ($this->items as $item): ?>
                <option value="<?= $item->id ?>"><?= $item->nombre ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Registrar SUBPROGRAMA">
    </form>
</body>
</html>

</div>

<?php require 'view/footer.php'; ?>

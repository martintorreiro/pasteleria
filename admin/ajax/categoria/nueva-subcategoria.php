<?php
$id=$_GET["id"];
?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Subcategoria</h2>
    </div>
    <form id="formulario-manejado" action="servicio/guardar-subcategoria.php" method="post">
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <div class="form_body">
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button id="cancelar" type="button">Cancelar</button>
            </div>
        </div>
    </form>
</div>
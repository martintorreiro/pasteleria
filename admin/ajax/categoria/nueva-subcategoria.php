<?php
$id=$_GET["id"];
?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Subcategoria</h2>
    </div>
    <form id="formulario-manejado" method="post"
        onSubmit="return enviarForm('servicio/categoria/guardar-subcategoria.php','categoria/cargar-categorias.php')">
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <div class="form_body">
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button type="button" onClick="cerrarForm()">Cancelar</button>
            </div>
        </div>
    </form>
</div>
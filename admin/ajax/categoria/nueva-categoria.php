<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Categoria</h2>
    </div>
    <form id="formulario-manejado" method="post"
        onSubmit="return enviarForm('servicio/categoria/guardar-categoria.php','categoria/cargar-categorias.php')">
        <div class="form_body">
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="imagenes_producto">
                <h4>Imagenes producto</h4>
                <div class="form_group form_group__files">
                    <label for="imagen">Cargar Imagenes</label>
                    <input onChange="cargarPreview(this)" type="file" id="imagen" name="imagen"
                        accept=".jpg, .jpeg, .png">
                </div>
                <div id="contenedor-preview"></div>
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button type="button" onClick="cerrarForm()">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Subcategoria</h2>
    </div>
    <form id="nueva-subcategoria-form" action="servicio/guardar-subcategoria.php" method="post">
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
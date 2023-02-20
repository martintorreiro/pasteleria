<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Categoria</h2>
    </div>
    <form id="nueva-categoria-form" action="servicio/guardar-categoria.php" method="post">
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
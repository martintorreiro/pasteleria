<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Usuario</h2>
    </div>
    <form id="formulario-manejado" method="post" enctype="multipart/form-data"
        onSubmit="return enviarForm('servicio/usuario/guardar-usuario.php','usuario/cargar-usuario.php')">
        <div class="form_body">


            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="form_group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">
            </div>

            <div class="form_group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo">
            </div>

            <div class="form_group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="form_group">
                <div>
                    <label for="admin">Permisos Administracion</label>
                    <input type="checkbox" id="admin" name="admin" value="true">
                </div>
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button type="button" onClick="cerrarForm()">Cancelar</button>
            </div>
        </div>
    </form>
</div>
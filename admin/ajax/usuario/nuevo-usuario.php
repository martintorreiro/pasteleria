<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Producto</h2>
    </div>
    <form id="nuevo-usuario-form" method="post" enctype="multipart/form-data">
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
                <button id="cancelar" type="button">Cancelar</button>
            </div>
        </div>
    </form>
</div>
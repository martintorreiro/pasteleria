<?php
include "../../db.php";

$id = $_GET["id"];

$res = $db->query("SELECT * FROM usuario WHERE id = $id");
                            
if($row = $res->fetch_assoc()){
?>


<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Editar Producto</h2>
    </div>
    <form id="formulario-manejado" method="post" enctype="multipart/form-data">
        <div class="form_body">

            <input type="hidden" name="id" value=<?php echo $id?>>

            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value='<?php echo $row["nombre"]?>'>
            </div>

            <div class="form_group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value='<?php echo $row["apellidos"]?>'>
            </div>

            <div class="form_group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value='<?php echo $row["correo"]?>'>
            </div>

            <!--  <div class="form_group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required>
            </div> -->

            <div class="form_group">
                <div>
                    <label for="admin">Permisos Administracion</label>
                    <input type="checkbox" id="admin" name="admin" value="true"
                        <?php  if($row["admin"]==1) echo "checked" ?>>
                </div>
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button id="cancelar" type="button">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<?php

}

?>
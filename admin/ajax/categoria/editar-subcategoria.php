<?php
include "../../db.php";
$id=$_GET["id"];
$res = $db->query("SELECT * FROM subcategoria WHERE id = $id");
$row = $res->fetch_assoc();
?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Editar Subcategoria</h2>
    </div>
    <form id="formulario-manejado"
        onSubmit="return enviarForm('servicio/categoria/editar-subcategoria.php','categoria/cargar-categorias.php')">
        <div class="form_body">
            <input type="hidden" name="id" value=<?php echo $id ?>>
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']?>">
            </div>
        </div>

        <div class="controls">
            <button>Enviar</button>
            <button type="button" onClick="cerrarForm()">Cancelar</button>
        </div>
    </form>
</div>
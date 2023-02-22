<?php
include "../../db.php";
$id=$_GET["id"];
$res = $db->query("SELECT * FROM categoria WHERE id = $id");
$row = $res->fetch_assoc();
?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Editar Categoria</h2>
    </div>
    <form id="editar-categoria-form">
        <div class="form_body">
            <input type="hidden" name="id" value=<?php echo $id ?>>
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']?>">
            </div>
        </div>

        <div class="controls">
            <button>Enviar</button>
            <button id="cancelar" type="button">Cancelar</button>
        </div>
    </form>
</div>
<?php
include "../db.php";
$id=$_GET["id"];
$resCat = $db->query("SELECT * FROM categoria");
$resSub = $db->query("SELECT * FROM subcategoria");
?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Categoria</h2>
    </div>
    <form id="nuevo-producto-form" action="servicio/producto/guardar-producto.php" method="post">
        <div class="form_body">
            <div class="form_group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="form_group">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio">
            </div>

            <div class="form_group">
                <label for="stock">Stock:</label>
                <input type="text" id="stock" name="stock">
            </div>

            <div class="form_group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>

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
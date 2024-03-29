<?php
include "../../db.php";
$resCat = $db->query("SELECT * FROM categoria");
$resSub = $db->query("SELECT * FROM subcategoria");
?>


<script type="text/javascript">
$(document).ready(function() {
    $('.positive-integer').numeric({
        negative: false,
        decimal: false
    });

    $('.decimal').numeric({
        negative: false,
        decimal: ".",
        decimalPlaces: 2
    });

});
</script>
<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Producto</h2>
    </div>
    <form id="formulario-manejado" method="post" enctype="multipart/form-data"
        onSubmit="return enviarForm('servicio/producto/guardar-producto.php','producto/cargar-productos.php')">
        <div class="form_body">
            <div class="form_inputs">
                <div>
                    <div class="form_group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                    </div>

                    <div class="form_group">
                        <label for="precio">Precio:</label>
                        <input class="decimal" type="text" id="precio" name="precio">
                    </div>

                    <div class="form_group">
                        <label for="stock">Stock:</label>
                        <input class="positive-integer" type="text" id="stock" name="stock">
                    </div>

                    <div class="form_group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" id="descripcion" name="descripcion">
                    </div>

                    <div class="form_group">
                        <div>
                            <label for="gluten"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i>Libre de
                                Gluten:</label>
                            <input type="checkbox" id="gluten" name="gluten" value="true">
                        </div>
                    </div>

                    <div class="form_group">
                        <label for="categoria">Categoría: </label>
                        <select name="categoria" id="categoria">
                            <option value="">--Seleccionar Categoria--</option>
                            <?php

                            if($resCat->num_rows){
                                while($row = $resCat->fetch_assoc()){
                                
                                    echo "<option value='".$row['id']."'>".$row['nombre']."</option>";

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de los autores</p>";
                            }

                        ?>

                        </select>
                    </div>

                    <div class="form_group">
                        <label for="subcategoria">Subcategoría: </label>
                        <select name="subcategoria" id="subcategoria" required>
                            <option value="">--Seleccionar Categoria--</option>
                        </select>
                    </div>
                </div>
                <div class="imagenes_producto">
                    <h4>Imagenes producto</h4>
                    <div class="form_group form_group__files">
                        <label for="imagenes">Cargar Imagenes</label>
                        <input onChange="cargarPreview(this)" type="file" id="imagenes" name="imagenes[]" multiple
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div id="contenedor-preview"></div>
                </div>
            </div>

            <div class="controls">
                <button>Enviar</button>
                <button type="button" onClick="cerrarForm()">Cancelar</button>
            </div>
        </div>
    </form>
</div>
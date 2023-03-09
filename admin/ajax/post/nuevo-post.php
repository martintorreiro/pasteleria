<?php
include "../../db.php";
$res = $db->query("SELECT * FROM usuario");

?>


<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Añadir Post</h2>
    </div>
    <form id="formulario-manejado" method="post" enctype="multipart/form-data">
        <div class="form_body">
            <div class="form_inputs">
                <div>
                    <div class="form_group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" id="titulo" name="titulo">
                    </div>

                    <div class="form_group">
                        <label for="texto">Texto:</label>
                        <textarea id="texto" name="texto" ></textarea>
                    </div>

                    <div class="form_group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                    </div>

                    <div class="form_group">
                        <label for="autor">Autor: </label>
                        <select name="autor" id="autor">
                            <option value="">--Seleccionar Autor--</option>
                            <?php

                            if($res->num_rows){
                                while($row = $res->fetch_assoc()){
                                
                                    echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellidos']."</option>";

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de los autores</p>";
                            }

                        ?>

                        </select>
                    </div>

                </div>
                <div class="imagenes_producto">
                    <h4>Imagenes post</h4>
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
                <button id="cancelar" type="button">Cancelar</button>
            </div>
        </div>
    </form>
</div>


<script>tinymce.init({selector:'textarea'});</script>
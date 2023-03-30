<?php
include "../../db.php";
$id=$_GET["id"];
$resUsuarios = $db->query("SELECT * FROM usuario");
$resPost = $db->query("SELECT * FROM post WHERE id = $id");
if($rowPost = $resPost -> fetch_assoc()){
?>


<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Editar Post</h2>
    </div>
    <form id="formulario-manejado" method="post" enctype="multipart/form-data"
        onSubmit="return enviarForm('servicio/post/editar-post.php?id=<?php echo $id ?>'),'post/cargar-posts.php'">
        <div class="form_body">
            <div class="form_inputs">

                <input type="hidden" name="id" value=<?php echo $id?>>
                <div>
                    <div class="form_group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" id="titulo" name="titulo" value='<?php echo $rowPost["titulo"]?>'>
                    </div>

                    <div class="form_group">
                        <label for="texto">Texto:</label>
                        <textarea name="texto" id="texto"><?php echo $rowPost["texto"]?></textarea>

                    </div>

                    <div class="form_group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" value='<?php echo $rowPost["fecha"]?>'>
                    </div>

                    <div class="form_group">
                        <label for="autor">Autor: </label>
                        <select name="autor" id="autor">
                            <option value="">--Seleccionar Autor--</option>
                            <?php

                            if($resUsuarios->num_rows){
                                while($row = $resUsuarios->fetch_assoc()){
                                
                                    if($row["id"]==$rowPost["id_usuario"]){
                                        echo "<option selected value='".$row['id']."'>".$row['nombre']." ".$row['apellidos']."</option>"; 
                                    }else{
                                        echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellidos']."</option>";
                                    }

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de los autores</p>";
                            };

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
                        <div id="contenedor-preview"></div>
                    </div>

                    <div class="imagenes_guardadas">
                        <h5>Imagenes guardadas</h5>
                        <div class="contenedor_imagenes">

                        </div>
                    </div>

                </div>

            </div>
            <div class="controls">
                <button>Enviar</button>
                <button type="button" onClick="cerrarForm()">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<script>
cargarFotosForm(<?php echo $id ?>, "post")
</script>

<?php

    }

?>
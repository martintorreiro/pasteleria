<?php
include "../../db.php";

$id = $_GET["id"];
$resProducto = $db->query("SELECT p.*,s.nombre AS nombreSubcategoria,s.id AS idSub,c.id AS idCat, c.nombre AS nombreCategoria FROM producto p 
                            LEFT JOIN subcategoria s ON p.id_subcategoria = s.id
                            LEFT JOIN categoria c ON c.id = s.id_categoria
                            WHERE p.id=$id");
                            
$resCat = $db->query("SELECT * FROM categoria");

$resFotos = $db->query("SELECT * FROM fotos_producto WHERE id_producto = $id");



if($rowP = $resProducto->fetch_assoc()){
    $idCat = $rowP["idCat"];
    $resSub = $db->query("SELECT * FROM subcategoria WHERE id_categoria=$idCat");
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
        <h2>Editar Producto</h2>
    </div>
    <form id="formulario-manejado" enctype="multipart/form-data" method="post">
        <div class="form_body">
            <div class="form_inputs">
                <div>
                    <input type="hidden" name="id" value=<?php echo $id?>>

                    <div class="form_group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $rowP["nombre"]?>">
                    </div>

                    <div class="form_group">
                        <label for="precio">Precio:</label>
                        <input class="decimal" type="text" id="precio" name="precio" value=<?php echo $rowP["precio"]?>>
                    </div>

                    <div class="form_group">
                        <label for="stock">Stock:</label>
                        <input class="positive-integer" type="text" id="stock" name="stock"
                            value=<?php echo $rowP["stock"]?>>
                    </div>

                    <div class="form_group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" id="descripcion" name="descripcion"
                            value="<?php echo $rowP["descripcion"]?>">
                    </div>

                    <div class="form_group">
                        <div>
                            <label for="gluten"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i>Libre de
                                Gluten:</label>
                            <input type="checkbox" id="gluten" name="gluten" value="true"
                                <?php  if($rowP["gluten_free"]==1) echo "checked" ?>>
                        </div>
                    </div>

                    <div class="form_group">
                        <label for="categoria">Categoría: </label>
                        <select name="categoria" id="categoria">

                            <?php

                            if($resCat->num_rows){
                                while($row = $resCat->fetch_assoc()){

                                    if($rowP["idCat"]==$row['id']){
                                        echo "<option selected  value='".$row['id']."'>".$row['nombre']."</option>";
                                    }else{    
                                        echo "<option  value='".$row['id']."'>".$row['nombre']."</option>";
                                    }
                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de las categorias</p>";
                            }

                        ?>

                        </select>
                    </div>

                    <div class="form_group">
                        <label for="subcategoria">Subcategoría: </label>
                        <select name="subcategoria" id="subcategoria">

                            <?php

                            if($resSub->num_rows){
                                while($row = $resSub->fetch_assoc()){

                                    if($rowP["idSub"]==$row['id']){
                                        echo "<option selected  value='".$row['id']."'>".$row['nombre']."</option>";
                                    }else{    
                                        echo "<option  value='".$row['id']."'>".$row['nombre']."</option>";
                                    }
                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de las categorias</p>";
                            }

                        ?>

                        </select>
                    </div>
                </div>
                <div class="imagenes_producto">
                    <h4>Imagenes producto</h4>
                    <div class="form_group form_group__files">
                        <label for="imagenes">Cargar Imagenes</label>
                        <input onChange="cargarPreview(this)" type="file" id="imagenes" name="imagenes[]" multiple
                            accept=".jpg, .jpeg, .png">
                        <div id="contenedor-preview">

                        </div>
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
                <button id="cancelar" type="button">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<script>
cargarFotosForm(<?php echo $id?>, "producto")
</script>
<?php
    }
?>
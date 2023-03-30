<?php
include "db.php";
include "header.php";

?>
<main>
    <h1>Listado Categorias</h1>
    <div class="contenedor-tabla">
        <div class="controles" id="controles">
            <button onClick="cargarForm('ajax/categoria/nueva-categoria.php')">Añadir Categoria</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Añadir Subcategoria</th>
                    <th>Subcategorias</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody id="body-tabla">

            </tbody>
        </table>

        <div id="modal-formulario"></div>
    </div>


</main>



<script src="js/cargarCategorias.js"></script>
<script>
$(function() {
    cargarCategorias();
})
</script>
<?php
include "footer.php";
?>
<?php
include "header.php";
include "db.php";

?>
<main>
    <h1>Listado Categorias</h1>
    <div class="contenedor-tabla">
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
            <tbody id="contenedor-categorias">

            </tbody>
        </table>

        <div class="controles" id="controles-categorias">
            <button id="añadir-categoria">Añadir Categoria</button>
        </div>
    </div>


</main>


<script src="js/controles/controlesCategorias.js"></script>
<script src="js/cargarCategorias.js"></script>
<script>
$(function() {
    cargarCategorias();
})
</script>
<?php
include "footer.php";
?>
<?php
include "db.php";
include "header.php";

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
            <tbody id="body-tabla">

            </tbody>
        </table>

        <div class="controles" id="controles">
            <button id="añadir">Añadir Categoria</button>
        </div>
    </div>


</main>



<script src="js/cargarCategorias.js"></script>
<script>
$(function() {
    cargarCategorias();
    manejarFormulario({
        guardar: "ajax/categoria/nueva-categoria.php",
        editar: "ajax/categoria/editar-categoria.php",
        guardar2: "ajax/categoria/nueva-subcategoria.php",
        editar2: "ajax/categoria/editar-subcategoria.php"
    }, {
        guardar: "servicio/categoria/guardar-categoria.php",
        editar: "servicio/categoria/editar-categoria.php",
        guardar2: "servicio/categoria/guardar-subcategoria.php",
        editar2: "servicio/categoria/editar-subcategoria.php"
    }, cargarCategorias)
})
</script>
<?php
include "footer.php";
?>
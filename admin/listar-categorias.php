<?php
include "header.php";
include "db.php";

?>
<div>
    <h1>Listado Categorias</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Subcategorias</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody id="contenedor-categorias">

            </tbody>
        </table>
    </div>

    <div id="controles-categorias">
        <button id="añadir-categoria">Añadir Categoria</button>
    </div>
</div>


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
<?php
include "header.php";
include "db.php";

?>
<div>
    <h1>Listado Subcategorias</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody id="contenedor-subcategorias">

            </tbody>
        </table>
    </div>

    <div id="controles-subcategorias">
        <button id="añadir-subcategoria">Añadir Subcategoria</button>
    </div>
</div>


<script src="js/controles/controlesSubcategorias.js"></script>
<script src="js/cargarSubcategorias.js"></script>
<script>
$(function() {
    cargarSubcategorias();
})
</script>
<?php
include "footer.php";
?>
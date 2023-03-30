<?php 
    include "db.php";
    include "header.php";
?>
<main>

    <h1>Listado Productos</h1>
    <div class="contenedor-tabla">
        <div class="controles" id="controles">
            <button onClick="cargarForm('ajax/producto/nuevo-producto.php')">Añadir Producto</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagenes</th>
                    <th>Sin Gluten</th>
                    <th>Categoria</th>
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



<script src="js/cargarProductos.js"></script>
<script>
$(function() {
    cargarProductos();
})
</script>

<?php 
    include "footer.php"
?>
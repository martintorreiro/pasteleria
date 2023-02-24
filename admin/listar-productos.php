<?php 
    include "header.php"
?>
<main>

    <h1>Listado Productos</h1>
    <div class="contenedor-tabla">
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
            <tbody id="contenedor-productos">

            </tbody>
        </table>

        <div class="controles" id="controles">
            <button id="añadir">Añadir Producto</button>
        </div>
    </div>


</main>


<!-- <script src="js/controles/controlesProductos.js"></script> -->
<script src="js/cargarProductos.js"></script>
<script>
    
$(function() {
    cargarProductos();
    manejarGuardado("ajax/producto/nuevo-producto.php","servicio/producto/guardar-producto.php",cargarProductos)
})
</script>

<?php 
    include "footer.php"
?>
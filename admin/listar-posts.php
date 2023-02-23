<?php 
    include "header.php"
?>

<main>

    <h1>Listado Posts</h1>
    <div class="contenedor-tabla">
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Fecha</th>
                    <th>Autor</th>
                    <th>Imagenes</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody id="contenedor-posts">

            </tbody>
        </table>

        <div class="controles" id="controles-post">
            <button id="añadir-post">Añadir Post</button>
        </div>
    </div>


</main>


<script src="js/controles/controlesPosts.js"></script>
<script src="js/cargarPosts.js"></script>
<script>
$(function() {
    cargarPosts();
})
</script>

<?php 
    include "footer.php"
?>
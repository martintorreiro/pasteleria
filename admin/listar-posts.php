<?php 
    include "header.php";
    include "db.php";
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

        <div class="controles" id="controles">
            <button id="añadir">Añadir Post</button>
        </div>
    </div>


</main>


<script src="js/cargarPosts.js"></script>
<script>
$(function() {
    cargarPosts();
    manejarFormulario({
        guardar: "ajax/post/nuevo-post.php",
        editar: "ajax/post/editar-post.php"
    }, {
        guardar: "servicio/post/guardar-post.php",
        editar: "servicio/post/editar-post.php"
    }, cargarPosts)
})
</script>

<?php 
    include "footer.php"
?>
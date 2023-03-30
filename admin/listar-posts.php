<?php 
    include "db.php";
    include "header.php";
?>

<main>

    <h1>Listado Posts</h1>

    <div class="contenedor-tabla">
        <div class="controles" id="controles">
            <button type="button" onClick="cargarForm('ajax/post/nuevo-post.php')">Añadir
                Post</button>
        </div>
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
            <tbody id="body-tabla">

            </tbody>
        </table>



        <div id="modal-formulario"></div>
    </div>


</main>


<script src="js/cargarPosts.js"></script>

<script>
$(function() {
    cargarPosts();
})
</script>

<?php 
    include "footer.php"
?>
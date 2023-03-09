<?php 
    include "db.php";
    include "header.php";
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
            <tbody id="body-tabla">

            </tbody>
        </table>

        <div class="controles" id="controles">
            <button id="añadir">Añadir Post</button>
        </div>
    </div>
<!-- <div class="absolute top-0"><textarea name="" id="" cols="30" rows="10"></textarea></div> -->
    
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
<?php
include "header.php";
include "db.php";

?>
<main>
    <h1>Listado Usuarios</h1>
    <div class="contenedor-tabla">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Admin</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody id="contenedor-usuarios">

            </tbody>
        </table>

        <div class="controles" id="controles-usuario">
            <button id="añadir-usuario">Añadir Usuario</button>
        </div>
    </div>


</main>


<script src="js/controles/controlesUsuarios.js"></script>
<script src="js/cargarUsuarios.js"></script>
<script>
$(function() {
    cargarUsuarios();
})
</script>
<?php
include "footer.php";
?>
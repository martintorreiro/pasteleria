<?php
include "db.php";
include "header.php";

?>
<main>
    <h1>Listado Usuarios</h1>
    <div class="contenedor-tabla">
        <div class="controles" id="controles">
            <button onClick="cargarForm('ajax/usuario/nuevo-usuario.php')">Añadir Usuario</button>
        </div>
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
            <tbody id="body-tabla">

            </tbody>
        </table>
        <div id="modal-formulario"></div>

    </div>


</main>


<script src="js/cargarUsuarios.js"></script>
<script>
$(function() {
    cargarUsuarios();
})
</script>
<?php
include "footer.php";
?>
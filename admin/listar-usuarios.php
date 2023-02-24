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

        <div class="controles" id="controles">
            <button id="añadir">Añadir Usuario</button>
        </div>
    </div>


</main>


<script src="js/cargarUsuarios.js"></script>
<script>
$(function() {
    cargarUsuarios();
    manejarFormulario({
        guardar: "ajax/usuario/nuevo-usuario.php",
        editar: "ajax/usuario/editar-usuario.php"
    }, {
        guardar: "servicio/usuario/guardar-usuario.php",
        editar: "servicio/usuario/editar-usuario.php"
    }, cargarUsuarios);
})
</script>
<?php
include "footer.php";
?>
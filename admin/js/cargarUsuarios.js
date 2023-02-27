const cargarUsuarios = () => {
  $.post(`servicio/usuario/cargar-usuario.php`, function (data) {
    $("#body-tabla").html(data);
    manejarFormulario(
      {
        guardar: "ajax/usuario/nuevo-usuario.php",
        editar: "ajax/usuario/editar-usuario.php",
      },
      {
        guardar: "servicio/usuario/guardar-usuario.php",
        editar: "servicio/usuario/editar-usuario.php",
      },
      cargarUsuarios
    );
  });
};

const cargarUsuarios = () => {
  $.post(`servicio/usuario/cargar-usuario.php`, function (data) {
    $("#contenedor-usuarios").html(data);
    eventosUsuarios();
  });
};

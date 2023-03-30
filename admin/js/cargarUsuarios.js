const cargarUsuarios = () => {
  $.post(`servicio/usuario/cargar-usuario.php`, function (data) {
    $("#body-tabla").html(data);
  });
};

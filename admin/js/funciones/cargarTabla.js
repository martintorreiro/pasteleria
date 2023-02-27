const cargarPosts = (servicio) => {
  $.post(servicio, function (data) {
    $("#body-tabla").html(data);
  });
};

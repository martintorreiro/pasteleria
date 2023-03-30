const cargarCategorias = () => {
  $.post(`servicio/categoria/cargar-categorias.php`, function (data) {
    $("#body-tabla").html(data);
  });
};

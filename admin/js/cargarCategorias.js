const cargarCategorias = () => {
  $.post(`servicio/categoria/cargar-categorias.php`, function (data) {
    $("#contenedor-categorias").html(data);
    eventosCategorias();
  });
};

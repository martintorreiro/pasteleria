const cargarCategorias = () => {
  $.post(`servicio/cargar-categorias.php`, function (data) {
    $("#contenedor-categorias").html(data);
    eventosCategorias();
  });
};

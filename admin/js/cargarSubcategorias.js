const cargarSubcategorias = () => {
  $.post(`servicio/cargar-subcategorias.php`, function (data) {
    $("#contenedor-subcategorias").html(data);
    eventosSubcategorias();
  });
};

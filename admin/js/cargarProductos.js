const cargarProductos = () => {
  $.post(`servicio/producto/cargar-productos.php`, function (data) {
    $("#contenedor-productos").html(data);
    eventosProductos();
  });
};

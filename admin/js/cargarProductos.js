const cargarProductos = () => {
  $.post(`servicio/producto/cargar-productos.php`, function (data) {
    $("#body-tabla").html(data);
  });
};

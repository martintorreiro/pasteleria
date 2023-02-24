const cargarProductos = () => {
  $.post(`servicio/producto/cargar-productos.php`, function (data) {
    $("#contenedor-productos").html(data);
    manejarEditado("ajax/producto/editar-producto.php","servicio/producto/editar-producto.php",cargarProductos)
  });
};

const cargarProductos = () => {
  $.post(`servicio/producto/cargar-productos.php`, function (data) {
    $("#contenedor-productos").html(data);
    manejarFormulario(
      {
        guardar: "ajax/producto/nuevo-producto.php",
        editar: "ajax/producto/editar-producto.php",
      },
      {
        guardar: "servicio/producto/guardar-producto.php",
        editar: "servicio/producto/editar-producto.php",
      },
      cargarProductos
    );
  });
};

const cargarCategorias = () => {
  $.post(`servicio/categoria/cargar-categorias.php`, function (data) {
    $("#contenedor-categorias").html(data);
    manejarFormulario(
      {
        guardar: "ajax/categoria/nueva-categoria.php",
        editar: "ajax/categoria/editar-categoria.php",
        guardar2: "ajax/categoria/nueva-subcategoria.php",
        editar2: "ajax/categoria/editar-subcategoria.php",
      },
      {
        guardar: "servicio/categoria/guardar-categoria.php",
        editar: "servicio/categoria/editar-categoria.php",
        guardar2: "servicio/categoria/guardar-subcategoria.php",
        editar2: "servicio/categoria/editar-subcategoria.php",
      },
      cargarCategorias
    );
  });
};

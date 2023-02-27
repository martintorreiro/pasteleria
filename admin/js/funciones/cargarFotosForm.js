const cargarFotosForm = (id_tabla, tabla) => {
  $(".contenedor_imagenes").load("ajax/formulario/cargar-fotos.php", {
    id_tabla,
    tabla,
  });
};

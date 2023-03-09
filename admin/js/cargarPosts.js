const cargarPosts = () => {
  $.post(`servicio/post/cargar-posts.php`, function (data) {
    $("#body-tabla").html(data);
    /*  manejarFormulario(
      {
        guardar: "ajax/post/nuevo-post.php",
        editar: "ajax/post/editar-post.php",
      },
      {
        guardar: "servicio/post/guardar-post.php",
        editar: "servicio/post/editar-post.php",
      },
      cargarPosts
    ); */
  });
};

const cargarPosts = () => {
  $.post(`servicio/post/cargar-posts.php`, function (data) {
    $("#contenedor-posts").html(data);
    eventosPosts();
  });
};

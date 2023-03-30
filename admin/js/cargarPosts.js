const cargarPosts = () => {
  $.post(`servicio/post/cargar-posts.php`, function (data) {
    $("#body-tabla").html(data);
  });
};

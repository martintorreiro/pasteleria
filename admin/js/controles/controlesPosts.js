const eventosPosts = () => {
  $("#añadir-post").click(function () {
    $("#controles-post").load("ajax/post/nuevo-post.php", () => {
      $("#controles-post").addClass("modal");
      $("#cancelar").click(() => {
        $("#controles-post").removeClass("modal");
        $("#controles-post").html(
          "<button id='añadir-post'>Añadir Post</button>"
        );
        eventosPosts();
      });

      $("#nuevo-post-form").submit(function (e) {
        e.preventDefault();
  
        const fdata = new FormData($("#nuevo-post-form").get(0));

        $.ajax({
          url: "servicio/post/guardar-post.php",
          type: "POST",
          data: fdata,
          processData: false,
          contentType: false,
          beforeSend: function () {
            //something before send
          },
          success: function (data) {
            cargarPosts();
            /* const respuesta = JSON.parse(data);
  
              if (respuesta.estado === "ok") {
                console.log("----->exito", respuesta.mensaje);
                
                $("#nuevo-producto-form input").each(function () {
                  this.value = "";
                });
              } else {
                console.log("----->error", data);
              } */
          },
        });
      });
    });
  });

  $(".editar").click(function () {
    $("#controles-post").addClass("modal");
    const idPost = $(this).attr("data-id");
    $("#controles-post").load(
      `ajax/post/editar-post.php?id=${idPost}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-post").removeClass("modal");
          $("#controles-post").html(
            "<button id='añadir-post'>Añadir Post</button>"
          );
          eventosPosts();
        });

        $("#editar-post-form").submit(function (e) {
          
          e.preventDefault();

          const editData = new FormData($("#editar-post-form").get(0));

          $.ajax({
            url: "servicio/post/editar-post.php",
            type: "POST",
            data: editData,
            processData: false,
            contentType: false,
            beforeSend: function () {
              //something before send
            },
            success: function (data) {
              
              if (data) {
                $("#controles-post").removeClass("modal");
                $("#controles-post").html(
                  "<button id='añadir-post'>Añadir Post</button>"
                );
                cargarPosts();
              } else {
              }
            },
          });
        });
      }
    );
  });
};

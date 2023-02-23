const cargarPreview = (input) => {
  $("#contenedor-preview").empty();
  if (input.files && input.files[0]) {
    for (let i = 0; i < input.files.length; i++) {
      const reader = new FileReader();
      reader.onload = function (e) {
        console.log("----->", e.target.result);
        $("#contenedor-preview").append(
          `<img src='${e.target.result}' alt='preview'>`
        );
      };

      reader.readAsDataURL(input.files[i]);
    }
  }
};

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

      $("#nuevo-usuario-form").submit(function (e) {
        e.preventDefault();

        const fdata = new FormData($("#nuevo-usuario-form").get(0));

        $.ajax({
          url: "servicio/usuario/guardar-usuario.php",
          type: "POST",
          data: fdata,
          processData: false,
          contentType: false,
          beforeSend: function () {
            //something before send
          },
          success: function (data) {
            console.log("usuario creado", data);
            /* const respuesta = JSON.parse(data);
  
              if (respuesta.estado === "ok") {
                console.log("----->exito", respuesta.mensaje);
                cargarProductos();
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
    $("#controles-usuario").addClass("modal");
    const idProducto = $(this).attr("data-id");
    $("#controles-usuario").load(
      `ajax/usuario/editar-usuario.php?id=${idProducto}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-usuario").removeClass("modal");
          $("#controles-usuario").html(
            "<button id='añadir-usuario'>Añadir Usuario</button>"
          );
          eventosUsuarios();
        });

        $("#editar-usuario-form").submit(function (e) {
          e.preventDefault();

          const editData = new FormData($("#editar-usuario-form").get(0));

          $.ajax({
            url: "servicio/usuario/editar-usuario.php",
            type: "POST",
            data: editData,
            processData: false,
            contentType: false,
            beforeSend: function () {
              //something before send
            },
            success: function (data) {
              if (data) {
                $("#controles-usuario").removeClass("modal");
                $("#controles-usuario").html(
                  "<button id='añadir-usuario'>Añadir Usuario</button>"
                );
                cargarUsuarios();
              } else {
              }
            },
          });
        });
      }
    );
  });
};

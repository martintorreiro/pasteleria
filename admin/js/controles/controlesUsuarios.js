const eventosUsuarios = () => {
  $("#añadir-usuario").click(function () {
    $("#controles-usuario").load("ajax/usuario/nuevo-usuario.php", () => {
      $("#controles-usuario").addClass("modal");
      $("#cancelar").click(() => {
        $("#controles-usuario").removeClass("modal");
        $("#controles-usuario").html(
          "<button id='añadir-usuario'>Añadir Usuario</button>"
        );
        eventosUsuarios();
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

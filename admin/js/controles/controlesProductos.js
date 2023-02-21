const eventosProductos = () => {
  $("#añadir-producto").click(function () {
    $("#controles-productos").load("ajax/producto/nuevo-producto.php", () => {
      $("#cancelar").click(() => {
        $("#controles-productos").html(
          "<button id='añadir-producto'>Añadir Producto</button>"
        );
        eventosProductos();
      });

      $("#nuevo-producto-form").submit(function (e) {
        e.preventDefault();

        const fdata = new FormData($("#nuevo-producto-form").get(0));

        $.ajax({
          url: "servicio/producto/guardar-producto.php",
          type: "POST",
          data: fdata,
          processData: false,
          contentType: false,
          beforeSend: function () {
            //something before send
          },
          success: function (data) {
            if (data) {
              cargarCategorias();
              $("#nuevo-producto-form input").each(function () {
                this.value = "";
              });
            } else {
            }
          },
        });
      });
    });
  });

  $(".editarCat").click(function () {
    const idCategoria = $(this).attr("data-id");
    $("#controles-categorias").load(
      `ajax/editar-categoria.php?id=${idCategoria}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-categorias").html(
            "<button id='añadir-categoria'>Añadir Categoria</button>"
          );
          eventosCategorias();
        });

        $("#editar-categoria-form").submit(function (e) {
          e.preventDefault();

          const editData = new FormData($("#editar-categoria-form").get(0));

          $.ajax({
            url: "servicio/editar-categoria.php",
            type: "POST",
            data: editData,
            processData: false,
            contentType: false,
            beforeSend: function () {
              //something before send
            },
            success: function (data) {
              if (data) {
                $("#controles-categorias").html(
                  "<button id='añadir-categoria'>Añadir Categoria</button>"
                );
                cargarCategorias();
              } else {
              }
            },
          });
        });
      }
    );
  });
};

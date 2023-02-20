const eventosSubcategorias = () => {
  $("#añadir-subcategoria").click(function () {
    $("#controles-subcategorias").load("ajax/nueva-subcategoria.php", () => {
      $("#cancelar").click(() => {
        $("#controles-subcategorias").html(
          "<button id='añadir-subcategoria'>Añadir Subcategoria</button>"
        );
        eventosSubcategorias();
      });

      $("#nueva-subcategoria-form").submit(function (e) {
        e.preventDefault();

        const fdata = new FormData($("#nueva-subcategoria-form").get(0));

        $.ajax({
          url: "servicio/guardar-subcategoria.php",
          type: "POST",
          data: fdata,
          processData: false,
          contentType: false,
          beforeSend: function () {
            //something before send
          },
          success: function (data) {
            if (data) {
              cargarSubcategorias();
              $("#nueva-subcategoria-form input").each(function () {
                this.value = "";
              });
            } else {
            }
          },
        });
      });
    });
  });

  $(".editar").click(function () {
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

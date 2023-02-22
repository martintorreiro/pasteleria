const eventosCategorias = () => {
  $("#añadir-categoria").click(function () {
    $("#controles-categorias").load(
      "ajax/categoria/nueva-categoria.php",
      () => {
        $("#cancelar").click(() => {
          $("#controles-categorias").html(
            "<button id='añadir-categoria'>Añadir Categoria</button>"
          );
          eventosCategorias();
        });

        $("#nueva-categoria-form").submit(function (e) {
          e.preventDefault();

          const fdata = new FormData($("#nueva-categoria-form").get(0));

          $.ajax({
            url: "servicio/categoria/guardar-categoria.php",
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
                $("#nueva-categoria-form input").each(function () {
                  this.value = "";
                });
              } else {
              }
            },
          });
        });
      }
    );
  });

  $(".editarCat").click(function () {
    const idCategoria = $(this).attr("data-id");
    $("#controles-categorias").load(
      `ajax/categoria/editar-categoria.php?id=${idCategoria}`,
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
            url: "servicio/categoria/editar-categoria.php",
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

  $(".añadirSub").click(function () {
    const idCategoria = $(this).attr("data-id");
    $("#controles-categorias").load(
      `ajax/categoria/nueva-subcategoria.php?id=${idCategoria}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-categorias").html(
            "<button id='añadir-categoria'>Añadir Categoria</button>"
          );
          eventosCategorias();
        });

        $("#nueva-subcategoria-form").submit(function (e) {
          e.preventDefault();

          const editData = new FormData($("#nueva-subcategoria-form").get(0));

          $.ajax({
            url: "servicio/categoria/guardar-subcategoria.php",
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

  $(".editarSub").click(function () {
    const idCategoria = $(this).attr("data-id");
    $("#controles-categorias").load(
      `ajax/categoria/editar-subcategoria.php?id=${idCategoria}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-categorias").html(
            "<button id='añadir-categoria'>Añadir Categoria</button>"
          );
          eventosCategorias();
        });

        $("#editar-subcategoria-form").submit(function (e) {
          e.preventDefault();

          const editData = new FormData($("#editar-subcategoria-form").get(0));

          $.ajax({
            url: "servicio/categoria/editar-subcategoria.php",
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

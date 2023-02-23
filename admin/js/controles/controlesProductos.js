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

const eventosProductos = () => {
  $("#añadir-producto").click(function () {
    $("#controles-productos").load("ajax/producto/nuevo-producto.php", () => {
      $("#controles-productos").addClass("modal");
      $("#cancelar").click(() => {
        $("#controles-productos").removeClass("modal");
        $("#controles-productos").html(
          "<button id='añadir-producto'>Añadir Producto</button>"
        );
        eventosProductos();
      });

      $(".form_group #categoria").change(function () {
        const id_categoria = $(this).val();
        $(".form_group #subcategoria").load(
          "ajax/producto/cargar-subcategorias.php",
          {
            id_categoria: id_categoria,
          }
        );
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
            const respuesta = JSON.parse(data);

            if (respuesta.estado === "ok") {
              console.log("----->exito", respuesta.mensaje);
              cargarProductos();
              $("#nuevo-producto-form input").each(function () {
                this.value = "";
              });
            } else {
              console.log("----->error", data);
            }
          },
        });
      });
    });
  });

  $(".editar").click(function () {
    $("#controles-productos").addClass("modal");
    const idProducto = $(this).attr("data-id");
    $("#controles-productos").load(
      `ajax/producto/editar-producto.php?id=${idProducto}`,
      () => {
        $("#cancelar").click(() => {
          $("#controles-productos").removeClass("modal");
          $("#controles-productos").html(
            "<button id='añadir-producto'>Añadir Producto</button>"
          );
          eventosProductos();
        });

        $(".form_group #categoria").change(function () {
          const id_categoria = $(this).val();
          $(".form_group #subcategoria").load(
            "ajax/producto/cargar-subcategorias.php",
            {
              id_categoria: id_categoria,
            }
          );
        });

        $("#editar-producto-form").submit(function (e) {
          e.preventDefault();

          const editData = new FormData($("#editar-producto-form").get(0));

          $.ajax({
            url: "servicio/producto/editar-producto.php",
            type: "POST",
            data: editData,
            processData: false,
            contentType: false,
            beforeSend: function () {
              //something before send
            },
            success: function (data) {
              $("#controles-productos").removeClass("modal");
              if (data) {
                $("#controles-productos").html(
                  "<button id='añadir-producto'>Añadir Producto</button>"
                );
                cargarProductos();
              } else {
              }
            },
          });
        });
      }
    );
  });
};

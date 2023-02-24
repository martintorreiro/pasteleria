const manejarGuardado = (form,servicio,callback) =>  {
    $("#añadir").click(function () {

        $("#controles").load(form, () => {

          $("#controles").addClass("modal");

          $("#cancelar").click(() => {
            $("#controles").removeClass("modal");
            $("#controles").html(
              "<button id='añadir'>Añadir Post</button>"
            );
            manejarGuardado(form,servicio,callback);
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
    
          $("#formulario-manejado").submit(function (e) {
            e.preventDefault();
            console.log(servicio)
            const fdata = new FormData($("#formulario-manejado").get(0));
    
            $.ajax({
              url: servicio,
              type: "POST",
              data: fdata,
              processData: false,
              contentType: false,
              beforeSend: function () {
                //something before send
              },
              success: function (data) {
                callback();
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
}




const manejarEditado = (form,servicio,callback) =>{
    
      $(".editar").click(function () {
        console.log("editar")
        $("#controles").addClass("modal");
        const idProducto = $(this).attr("data-id");
        $("#controles").load(
          `${form}?id=${idProducto}`,
          () => {
            $("#cancelar").click(() => {
              $("#controles").removeClass("modal");
              $("#controles").html(
                "<button id='añadir'>Añadir Producto</button>"
              );
              manejarEditado(form,servicio,callback);
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
    
            $(form).submit(function (e) {
              e.preventDefault();
    
              const editData = new FormData($(form).get(0));
    
              $.ajax({
                url: servicio,
                type: "POST",
                data: editData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                  //something before send
                },
                success: function (data) {
                  $("#controles").removeClass("modal");
                  if (data) {
                    $("#controles").html(
                      "<button id='añadir'>Añadir Producto</button>"
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


}

const manejarFormulario = (form, servicio, callback) => {
  $(".borrar").click(function (e) {
    $("#confirmacion-modal").remove();
    $id = $(this).attr("data-id");
    $tabla = $(this).attr("data-tabla");
    console.log($id, $tabla);
    $ejeY = e.pageY;
    $ejeX = e.pageX;

    $("main").append(
      "<div id=confirmacion-modal><p>Esta seguro de que desea borrar esta fila?</p><button id='confirmar-borrado'>Confirmar</button></div>"
    );
    $("#confirmacion-modal")
      .css("width", "200px")
      .css("top", $ejeY)
      .css("left", $ejeX - 200);

    $("#confirmar-borrado").click(function () {
      $.post(
        "servicio/borrar-tabla.php",
        { id: $id, tabla: $tabla },
        function (data) {
          console.log(data);

          $("#confirmacion-modal").remove();
          callback();
        }
      );
    });

    /*  $(document).click(function (e) {
      console.log(e);
      var obj = $("#confirmacion-modal");
      if (!obj.is(event.target) && !obj.has(event.target).length) {
        $("#confirmacion-modal").remove();
      }
    }); */
  });

  $("#añadir").click(function () {
    const controlActual = $("#controles").html();
    $("#controles").load(form.guardar, () => {
      $("#controles").addClass("modal");
      alert("AQUI");
      tinymce.init({ selector: "textarea" });
      $("#cancelar").click(() => {
        $("#controles").html(controlActual);
        //manejarFormulario(form, servicio, callback);
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

        const fdata = new FormData($("#formulario-manejado").get(0));

        $.ajax({
          url: servicio.guardar,
          type: "POST",
          data: fdata,
          processData: false,
          contentType: false,
          beforeSend: function () {
            //something before send
          },
          success: function (data) {
            console.log("--->", data);
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

  $(".editar").click(function () {
    const controlActual = $("#controles").html();
    $("#controles").addClass("modal");
    const idProducto = $(this).attr("data-id");

    $("#controles").load(`${form.editar}?id=${idProducto}`, () => {
      $("#cancelar").click(() => {
        $("#controles").removeClass("modal");
        $("#controles").html(controlActual);
        manejarFormulario(form, servicio, callback);
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

        const editData = new FormData($("#formulario-manejado").get(0));

        $.ajax({
          url: servicio.editar,
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
              console.log(data);
              $("#controles").html(controlActual);
              callback();
            } else {
            }
          },
        });
      });
    });
  });

  $(".añadir2").click(function () {
    const controlActual = $("#controles").html();
    const id = $(this).attr("data-id");
    $("#controles").load(`${form.guardar2}?id=${id}`, () => {
      $("#controles").addClass("modal");

      $("#cancelar").click(() => {
        $("#controles").removeClass("modal");
        $("#controles").html(controlActual);
        manejarFormulario(form, servicio, callback);
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

        const fdata = new FormData($("#formulario-manejado").get(0));

        $.ajax({
          url: servicio.guardar2,
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

  $(".editar2").click(function () {
    const controlActual = $("#controles").html();
    $("#controles").addClass("modal");
    const idProducto = $(this).attr("data-id");
    $("#controles").load(`${form.editar2}?id=${idProducto}`, () => {
      $("#cancelar").click(() => {
        $("#controles").removeClass("modal");
        $("#controles").html(controlActual);
        manejarFormulario(form, servicio, callback);
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

        const editData = new FormData($("#formulario-manejado").get(0));

        $.ajax({
          url: servicio.editar2,
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
              $("#controles").html(controlActual);
              callback();
            } else {
            }
          },
        });
      });
    });
  });
};

function cargarForm(form) {
  $("#modal-formulario").load(form, () => {
    $("#modal-formulario").addClass("modal");
    tinymce.init({ selector: "textarea" });
  });
}

function cerrarForm() {
  $("#modal-formulario").removeClass("modal");
  $("#modal-formulario").empty();
  tinyMCE.remove();
}

function enviarForm(service) {
  tinymce.triggerSave();

  const fdata = new FormData($("#formulario-manejado").get(0));

  $.ajax({
    url: service,
    type: "POST",
    data: fdata,
    processData: false,
    contentType: false,
    beforeSend: function () {
      //something before send
    },
    success: function (data) {
      console.log("enviado", data);
      $("#modal-formulario").removeClass("modal");
      $("#modal-formulario").empty();
      tinyMCE.remove();
    },
  });
  return false;
}

function borrarFila(id, tabla) {
  $("#confirmacion-modal").remove();

  $ejeY = e.pageY;
  $ejeX = e.pageX;

  $("main").append(
    "<div id=confirmacion-modal><p>Esta seguro de que desea borrar esta fila?</p><button id='confirmar-borrado'>Confirmar</button></div>"
  );
  $("#confirmacion-modal")
    .css("width", "200px")
    .css("top", $ejeY)
    .css("left", $ejeX - 200);

  $("#confirmar-borrado").click(function () {
    $.post("servicio/borrar-tabla.php", { id, tabla }, function (data) {
      console.log(data);

      $("#confirmacion-modal").remove();
      callback();
    });
  });
}

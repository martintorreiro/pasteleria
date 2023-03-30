function cargarForm(form) {
  $("#modal-formulario").load(form, () => {
    $("#modal-formulario").addClass("modal");
    tinymce.init({ selector: "textarea" });

    $(".form_group #categoria").change(function () {
      const id_categoria = $(this).val();
      $(".form_group #subcategoria").load(
        "ajax/producto/cargar-subcategorias.php",
        {
          id_categoria: id_categoria,
        }
      );
    });
  });
}

function cerrarForm() {
  $("#modal-formulario").removeClass("modal");
  $("#modal-formulario").empty();
  tinyMCE.remove();
}

function enviarForm(service, rutaCarga) {
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
      cargarTabla(rutaCarga);
      $("#modal-formulario").removeClass("modal");
      $("#modal-formulario").empty();
      tinyMCE.remove();
    },
  });
  return false;
}

function borrarFila(id, tabla, rutaCarga) {
  $("#confirmacion-modal").remove();
  console.log(id, tabla);
  $ejeY = event.pageY;
  $ejeX = event.pageX;
  event.stopPropagation();

  $("main").append(
    "<div id=confirmacion-modal><p>Esta seguro de que desea borrar esta fila?</p><button id='confirmar-borrado'>Confirmar</button></div>"
  );
  $("#confirmacion-modal")
    .css("width", "200px")
    .css("top", $ejeY)
    .css("left", $ejeX - 200);

  $(document).click(function (e) {
    if (
      !$("#confirmacion-modal").is(e.target) &&
      !$("#confirmacion-modal").has(e.target).length
    ) {
      $("#confirmacion-modal").remove();
      $(document).off();
    }
  });

  $("#confirmar-borrado").click(function () {
    $.post("servicio/borrar-tabla.php", { id, tabla }, function (data) {
      console.log("--", data);
      cargarTabla(rutaCarga);
      $("#confirmacion-modal").remove();
    });
  });
}

const cargarTabla = (rutaCarga) => {
  $.post(`servicio/${rutaCarga}`, function (data) {
    $("#body-tabla").html(data);
  });
};

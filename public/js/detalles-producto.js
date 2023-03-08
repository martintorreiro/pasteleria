function cargarReviews(idProd, nombreP) {
  $("#details-content").load(
    "service/cargar-reviews.php?idProd=" + idProd + "&nombreP=" + nombreP,
    function () {
      console.log("cargadas");
      gestionEstrellas();
      manejadorReview(idProd, nombreP);
    }
  );
}

function gestionEstrellas() {
  $(".contenedor-estrellas label").hover(function () {
    const grupo = $(this).attr("data-grupo");
    $(`#grupo-${grupo} label i`).removeClass("estrella-on");

    for (let i = 0; i <= $(this).attr("data-position"); i++) {
      $(`#grupo-${grupo} label:nth-child(${i}) i`).addClass("estrella-on");
    }

    $(".contenedor-estrellas").mouseleave(function () {
      $(`#grupo-${grupo} label i`).removeClass("estrella-on");
    });
  });

  $(".contenedor-estrellas input").change(function () {
    const grupo = $(this).attr("data-grupo");
    $(`#grupo-${grupo} label i`).removeClass("estrella-check");

    for (let i = 0; i <= $(this).val(); i++) {
      $(`#grupo-${grupo} label:nth-child(${i}) i`).addClass("estrella-check");
    }
  });
}

function manejadorReview(idProd, nombreP) {
  $(".review-form form").submit(function (e) {
    e.preventDefault();
    const fdata = new FormData($(".review-form form").get(0));

    $.ajax({
      type: "POST",
      url: "service/guardar-comentarios-prod.php",
      data: fdata,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log("--->", idProd, nombreP);
        cargarReviews(idProd, nombreP);
      },
    });
  });
}

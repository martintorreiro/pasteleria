function eventosCarrito() {
  $(".añadircarrito").click(function () {
    id_producto = $(this).data("id_producto");

    $.post(
      "service/addCart.php",
      { id_producto: id_producto, cantidad: 1 },
      function (data) {
        if (data == "OK") {
          $("#cantidadCarrito").load("service/carritoCantidad.php");
          $("#contenido-carrito").load(
            "service/cargar-carrito.php",
            function () {
              $(".añadircarrito").off();
              $(".eliminaruno").off();
              eventosCarrito();
            }
          );
        } else {
        }
      }
    );
  });

  $(".eliminaruno").click(function () {
    id_producto = $(this).data("id_producto");
    console.log("carrito", id_producto);
    $.post(
      "service/removeOneCart.php",
      { id_producto: id_producto },
      function (data) {
        if (data == "OK") {
          $("#cantidadCarrito").load("service/carritoCantidad.php");
          $("#contenido-carrito").load(
            "service/cargar-carrito.php",
            function () {
              $(".eliminaruno").off();
              $(".añadircarrito").off();
              eventosCarrito();
            }
          );
        } else {
        }
      }
    );
  });
}

$("#carrito").click(function () {
  $(this).toggleClass("abierto");
  $("#contenido-carrito").toggleClass("disp-none");

  if ($(this).hasClass("abierto")) {
    $(document).click(function detectaClick(e) {
      if (
        !$("#carrito").is(e.target) &&
        !$("#carrito").has(e.target).length &&
        !$("#contenido-carrito").is(e.target) &&
        !$("#contenido-carrito").has(e.target).length
      ) {
        console.log("out");
        $("#carrito").removeClass("abierto");
        $("#contenido-carrito").addClass("disp-none");
        $(document).off();
      } else if (
        !$("#carrito").is(e.target) &&
        !$("#carrito").has(e.target).length
      ) {
        $(document).off();
      }
    });
  }
});

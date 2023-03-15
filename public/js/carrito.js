function cargarCarrito(){
  $("#contenido-carrito").load(
    "service/cargar-carrito.php",
    function () {
      $(".añadircarrito").off();
      eventosCarrito();
    }
  );
}

function eventosCarrito() {

  

  $(".añadircarrito").click(function () {
    id_producto = $(this).data("id_producto");
    cantidad = $(this).data("cantidad");
    $.post(
      "service/addCart.php",
      { id_producto: id_producto, cantidad: cantidad },
      function (data) {
        if (data == "OK") {
          $("#cantidadCarrito").load("service/carritoCantidad.php");
          cargarCarrito()
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

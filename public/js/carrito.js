function cargarCarrito() {
  $("#tabla-carrito").load("service/cargar-carro.php", function () {
    $(".añadircarrito").off();
    $(".cantidad-producto").off();
    $(".añadirN").off();
    eventosCarrito();
  });
  $("#contenido-carrito").load("service/cargar-carrito.php", function () {
    $(".positive-integer").numeric({
      negative: false,
      decimal: false,
    });
    $(".añadircarrito").off();
    $(".cantidad-producto").off();
    $(".añadirN").off();
    eventosCarrito();
  });
}

//--------AÑADIR AL CARRITO

function eventosCarrito() {
  $(".añadircarrito").click(function () {
    id_producto = $(this).data("id_producto");
    cantidad = $(this).data("cantidad");
    $.post("service/addCart.php", { id_producto, cantidad }, function (data) {
      if (data == "OK") {
        $("#cantidadCarrito").load("service/carritoCantidad.php");
        cargarCarrito();
      } else {
      }
    });
  });

  $(".cantidad-producto").change(function () {
    id_producto = $(this).data("id_producto");
    cantidad = $(this).val();
    console.log("----", cantidad, id_producto);
    $.post("service/setCart.php", { id_producto, cantidad }, function (data) {
      if (data == "OK") {
        console.log("terminado ok");
        $("#cantidadCarrito").load("service/carritoCantidad.php");
        cargarCarrito();
      } else {
      }
    });
  });

  $(".añadirN").submit(function (e) {
    e.preventDefault();
    id_producto = e.target.elements.id_producto.value;
    cantidad = e.target.elements.cantidad.value;

    console.log("submit", id_producto, cantidad);
    $.post("service/addCart.php", { id_producto, cantidad }, function (data) {
      if (data == "OK") {
        console.log("terminado ok");
        $("#cantidadCarrito").load("service/carritoCantidad.php");
        cargarCarrito();
      } else {
      }
    });
  });
}

//---------ABRIR Y CERRAR CARRITO

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

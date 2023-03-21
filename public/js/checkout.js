$("#shipping-address").submit(function (e) {
  e.preventDefault();

  $("#checkout-shipping").css({ display: "none" });
  $("#checkout-review").css({ display: "block" });
  $(".checkout-header li").toggleClass("active");
  $(".address-details").html(
    "<p>" +
      e.target.elements.nombre.value +
      " " +
      e.target.elements.apellidos.value +
      "</p>" +
      "<p>" +
      e.target.elements.direccion1.value +
      "</p>" +
      "<p>" +
      e.target.elements.ciudad.value +
      ", " +
      e.target.elements.provincia.value +
      " " +
      e.target.elements.cp.value +
      "</p>" +
      "<p>" +
      e.target.elements.pais.value +
      "</p>" +
      "<p>" +
      e.target.elements.telefono.value +
      "</p>"
  );
  $(".step1").addClass("pointer");
  $(".step1").click(function () {
    $("#checkout-shipping").css({ display: "block" });
    $("#checkout-review").css({ display: "none" });
    $(".checkout-header li").toggleClass("active");
    $(".step1").off();
    $(".step1").removeClass("pointer");
    $(".address-details").html("");
  });
});

$("#same-billing").change(function () {
  if ($(this).is(":checked")) {
    $("#place-order").css({ opacity: 1, cursor: "pointer" });
    $("#place-order").addClass("hover-bg-negro");
    $("#billing-address-details").removeClass("disp-none");
    $("#form-billing").addClass("disp-none");
  } else {
    $("#place-order").css({ opacity: 0.5, cursor: "auto" });
    $("#place-order").removeClass("hover-bg-negro");
    $("#billing-address-details").addClass("disp-none");
    $("#form-billing").removeClass("disp-none");
  }
});

$("#billing-address").submit(function (e) {
  e.preventDefault();

  $("#place-order").css({ opacity: 1, cursor: "pointer" });
  $("#place-order").addClass("hover-bg-negro");
  $("#billing-address-details").removeClass("disp-none");
  $("#form-billing").addClass("disp-none");

  $("#same-billing").prop("checked", true);

  $("#billing-address-details").html(
    "<p>" +
      e.target.elements.nombre.value +
      " " +
      e.target.elements.apellidos.value +
      "</p>" +
      "<p>" +
      e.target.elements.direccion1.value +
      "</p>" +
      "<p>" +
      e.target.elements.ciudad.value +
      ", " +
      e.target.elements.provincia.value +
      " " +
      e.target.elements.cp.value +
      "</p>" +
      "<p>" +
      e.target.elements.pais.value +
      "</p>" +
      "<p>" +
      e.target.elements.telefono.value +
      "</p>"
  );
});

$("#place-order").click(function () {
  if ($("#same-billing").is(":checked")) {
    const shippForm = new FormData($("#shipping-address").get(0));
    const billForm = new FormData($("#billing-address").get(0));

    let shipp = {};
    shippForm.forEach((value, key) => (shipp[key] = value));

    let bill = {};
    billForm.forEach((value, key) => (bill[key] = value));

    const json = JSON.stringify({ shipp, bill });

    $.post("service/guardar-pedido.php", { json }, function (data) {
      if (data == "ok") {
        showMsg("<p class='ta-center'>Su compra se ha realizado con éxito</p>");

        $.post(
          "service/removeFromCart.php",
          { id_producto: "all" },
          function (data) {
            console.log(data);
            cargarCarrito();
            $("#cantidadCarrito").load("service/carritoCantidad.php");
            window.location = "checkout-succes.php";
          }
        );
      } else {
        showMsg("<p class='ta-center'>Error al realizar compra");
      }
    });
  }
});

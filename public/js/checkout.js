$("#shipping-address").submit(function (e) {
  e.preventDefault();

  $("#checkout-shipping").css({ display: "none" });
  $("#checkout-review").css({ display: "block" });
  $(".checkout-header li").toggleClass("active");
  $(".billing-address-details").html(
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
  $("#step1").addClass("pointer");
  $("#step1").click(function () {
    $("#checkout-shipping").css({ display: "block" });
    $("#checkout-review").css({ display: "none" });
    $(".checkout-header li").toggleClass("active");
    $("#step1").off();
  });
});

$("#same-billing").change(function () {
  console.log("checked", $(this).is(":checked"));
  if ($(this).is(":checked")) {
    $("#billing-addres-details").removeClass("disp-none");
    $("#form-billing").addClass("disp-none");
  } else {
    $("#billing-addres-details").addClass("disp-none");
    $("#form-billing").removeClass("disp-none");
  }
});

$("#shipping-address").submit(function (e) {
  e.preventDefault();

  $("#billing-addres-details").html(
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

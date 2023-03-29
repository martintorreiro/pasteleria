function crearCuenta() {
  $("#create-acount input[name=cpassword]").blur(function (e) {
    $("#create-acount .alerta").remove();
    $("#cpassword").removeClass("input-error");
    if ($("#create-acount input[name=password]").val() != $(this).val()) {
      $("#cpassword").addClass("input-error");
      $("#cpassword").after(
        "<p class='alerta color-rojo'>Las contraseñas deben coincidir</p>"
      );
    }
    console.log($(this).val());
  });

  $("#create-acount").submit(function (e) {
    e.preventDefault();
    console.log($("#create-acount .required input"));
    /*  $("#create-acount .required input").forEach((element) => {
      console.log(element);
    }); */
  });
}

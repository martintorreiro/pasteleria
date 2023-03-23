function crearCuenta() {
  $("#create-acount input").blur(function (e) {
    console.log(e);
  });

  $("#create-acount").submit(function (e) {
    e.preventDefault();
    console.log(
      e.target.elements.cpassword.value,
      e.target.elements.password.value
    );
  });
}

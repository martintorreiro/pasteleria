function showMsg(msg) {
  const body = document.querySelector("body");
  const popup = document.getElementById("popup");

  if (popup !== null) {
    popup.remove();
  }

  const container = document.createElement("div");
  container.setAttribute("id", "popup");
  container.classList.add(
    "fixed",
    "top-0",
    "left-0",
    "w-x-100",
    "flex",
    "column",
    "jc-center",
    "zindex-10",
    "padd-20",
    "pointer",
    "font-s-12"
  );
  container.innerHTML =
    msg + "<p class='ta-center font-s-10'>CLICK PARA CERRAR</p>";
  body.appendChild(container);

  document.getElementById("popup").addEventListener("click", function () {
    this.remove();
  });
}

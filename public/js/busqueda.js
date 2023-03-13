const headerNav = document.getElementById("header-nav");
const toggleSearch = document.getElementById("toggle-search");
const searchIcon = document.querySelector("#search-icon");
const closeIcon = document.querySelector("#close-icon");
const navMenu = document.getElementById("nav-menu");
const navSearch = document.getElementById("nav-search");
const navInput = document.getElementById("nav-input");
const formSearch = document.getElementById("form-search");
const resultContainer = document.getElementById("contenedor-resultados");

//--------abrir y cerrar search

const abrirSearch = () => {
  navInput.focus();
  headerNav.classList.add("bg-color-gris-claro");
  navMenu.classList.remove("show-menu");
  navSearch.classList.add("slide-left");
  searchIcon.classList.remove("mostrar-search");
  closeIcon.classList.add("mostrar-search");
};
const cerrarSearch = () => {
  resultContainer.innerHTML = "";
  headerNav.classList.remove("bg-color-gris-claro");
  navMenu.classList.add("show-menu");
  navSearch.classList.remove("slide-left");
  searchIcon.classList.add("mostrar-search");
  closeIcon.classList.remove("mostrar-search");
};

const handleFocus = (e) => {
  console.log("focus", e);
  if (
    e.relatedTarget == null ||
    (e.relatedTarget.id !== "search-button" &&
      e.relatedTarget.classList !== "producto-search")
  ) {
    document.addEventListener("click", function newFocus(e) {
      if (e.target.id !== "close-icon" && e.target.id !== "close-label") {
        toggleSearch.checked = false;
      }
      document.removeEventListener("click", newFocus);
    });
    cerrarSearch();
  }
};

const handleClick = (e) => {
  if (e.target.checked) {
    abrirSearch();
  } else {
    cerrarSearch();
  }
};

//--------gestionar busqueda

let timerSearch;

const saveInput = (e) => {
  clearTimeout(timerSearch);

  if (e.srcElement.value.length > 1) {
    timerSearch = setTimeout(() => {
      console.log("timeout");

      fetch(`service/cargar-busqueda.php?search=${e.srcElement.value}`)
        .then((response) => response.json())
        .then((data) => {
          resultContainer.innerHTML = data;
          navInput.removeEventListener("focusout", handleFocus);
          document.addEventListener("click", function newFocus(e) {
            if (
              e.target.id !== "contenedor-resultados" &&
              e.target.id !== "nav-input"
            ) {
              resultContainer.innerHTML = "";
              navInput.addEventListener("focusout", handleFocus);
              document.removeEventListener("click", newFocus);
              navInput.focus();
            }
          });
        })
        .catch((e) => console.log("error", e));
    }, 1000);
  } else {
    navInput.addEventListener("focusout", handleFocus);
    resultContainer.innerHTML = "";
  }
};

toggleSearch.addEventListener("click", handleClick);
navInput.addEventListener("focusout", handleFocus);
navInput.addEventListener("input", saveInput);

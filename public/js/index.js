$(function () {
  var owl = $(".slider .owl-carousel");
  owl.owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 500,
    navSpeed: 500,
    autoplayHoverPause: true,
    nav: true,
    dots: false,
    /* animateOut: "fadeOut", */
  });
  $(".play").on("click", function () {
    owl.trigger("play.owl.autoplay", [1000]);
  });
  $(".stop").on("click", function () {
    owl.trigger("stop.owl.autoplay");
  });
  /* owl.on("changed.owl.carousel", function (event) {}); */
});

$(function () {
  var owl2 = $(".owl-carousel.carousel-productos");
  owl2.owlCarousel({
    items: 3,
    nav: true,
    dots: false,
  });
});

$(function () {
  var owl3 = $(".owl-carousel.carousel-post");
  owl3.owlCarousel({
    items: 3,
    nav: true,
    dots: false,
  });
});

$(function () {
  var owl4 = $(".owl-carousel.pagina-producto");
  owl4.owlCarousel({
    items: 1,
    loop: true,
    URLhashListener: true,
    nav: true,
    dots: false,
  });
});

/* -----------CATEGORIA aside---------------- */

$(document).ready(function () {
  $(".nav-categorias > li > a").hover(function () {
    $(".subcategorias").css({ display: "none" });
    $item = $(this).siblings();
    $item.css({ display: "block" });
    $(".nav-categorias").mouseleave(function () {
      $(".subcategorias").css({ display: "none" });
    });
  });

  $(".filtro-item > h4").click(function () {
    $(this).parent().toggleClass("cerrar");
  });
});

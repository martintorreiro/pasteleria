$(function () {
  var owl = $(".owl-carousel");
  owl.owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 2000,
    navSpeed: 2000,
    autoplayHoverPause: true,
    nav: true,
    dots: false,
    animateOut: "fadeOut",
  });
  $(".play").on("click", function () {
    owl.trigger("play.owl.autoplay", [1000]);
  });
  $(".stop").on("click", function () {
    owl.trigger("stop.owl.autoplay");
  });
  owl.on("changed.owl.carousel", function (event) {});
});

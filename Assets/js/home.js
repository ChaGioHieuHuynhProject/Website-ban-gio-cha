var slide = $(".slides").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
});
$(".slides").on("afterChange", (e, slick, index) => {
  $(".title").css("opacity", 1);
  if (index == 0) {
    $(".title").css("opacity", 0);
  }
});

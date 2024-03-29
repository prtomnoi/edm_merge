$(".vtuber-slider").slick({
  centerMode: true,
  infinite: true,
  centerPadding: "0",
  slidesToShow: 3,
  slidesToScroll: 3,
  arrows: false,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: 0,
      },
    },
  ],
});

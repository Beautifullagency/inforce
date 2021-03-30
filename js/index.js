$("#owl1").owlCarousel({
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoplaySpeed: 1000, 
    items: 1, 
    loop: true,
    autoHeight: false,
    responsiveClass: true,
    responsive: {
      0: {
        margin: 10,
        items: 1,
        nav: true,
        dots: true,
      },
      600: {
        margin: 10,
        items: 3,
        nav: true,
        dots: false,
      },
      1024: {
        margin: 60,
        items: 5,
        nav: true,  
        loop: false,
        dots: false,
      },
    },
  });
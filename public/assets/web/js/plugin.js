$(function (){

    'use strict';

     // landing

$(".landing .owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 1,
    nav: true,
    loop: false,
    dots: false,
});

    // services

$(".blog .owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 3,
    nav: true,
    loop: true,
    dots: false,
    responsive: {
        0 : {
            items: 1
        },
        485 : {
            items: 1
        },
        728 : {
            items: 2
        },
        1200 : {
            items: 3
        }
    }
});

// team

$(".team .owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 4,
    nav: true,
    loop: true,
    dots: false,
    responsive: {
        0 : {
            items: 1
        },
        485 : {
            items: 1
        },
        728 : {
            items: 2
        },
        1200 : {
            items: 4
        }
    }
});


    // client

$(".client .owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 1,
    nav: true,
    loop: true,
    dots: false,
});

// partner

$(".menufacture .owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 5,
    nav: true,
    loop: true,
    dots: false,
    responsive: {
        0 : {
            items: 1
        },
        485 : {
            items: 2
        },
        728 : {
            items: 3
        },
        1200 : {
            items: 5
        }
    }
});

// scroll to top

$(window).scroll(function () {
    if ($(window).scrollTop() >= 1000) {
        $('.scroll-top').fadeIn(400);
    }else{
        $('.scroll-top').fadeOut(400);
    }
});
$('.scroll-top').click(function () {
    
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

//   slider project details

  $('.project-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
  });

      // team

// $(".team .owl-carousel").owlCarousel({
//     autoplay: true,
//     autoplayhoverpause: true,
//     autoplaytimeout: 100,
//     items: 4,
//     nav: true,
//     loop: true,
//     dots: false,
//     responsive: {
//         0 : {
//             items: 1
//         },
//         485 : {
//             items: 2
//         },
//         728 : {
//             items: 3
//         },
//         1200 : {
//             items: 4
//         }
//     }
// });

});
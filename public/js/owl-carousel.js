$("#owl-carousel").owlCarousel({
    slideTransition: 'linear',
    loop: true,
    margin: 0,
    autoplay: true,
    smartSpeed: 500,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    rewind: true,
    nav: true,
    dots: false,
    navText:["<div class='nav-btn prev-slide'><ion-icon name='chevron-back-outline'></ion-icon></div>","<div class='nav-btn next-slide'><ion-icon name='chevron-forward-outline'></ion-icon></div>"],
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            stagePadding: 30,
        },
        768: {
            items: 2,
            stagePadding: 40,
        },
        992: {
            items: 2,
            stagePadding: 60,
        },
        1200: {
            items: 2,
            stagePadding: 80,
        },
    }
});

$("#owl-carousel-2").owlCarousel({
    slideTransition: 'linear',
    loop: true,
    margin: 0,
    autoplay: true,
    smartSpeed: 500,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    rewind: true,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            stagePadding: 50,
        },
        768: {
            items: 2,
            stagePadding: 50,
        },
        992: {
            items: 2,
            stagePadding: 50,
        },
        1200: {
            items: 2,
            stagePadding: 80,
        },
    }
});

$("#owl-carousel-3").owlCarousel({
    slideTransition: 'linear',
    loop: true,
    margin: 0,
    autoplay: true,
    smartSpeed: 500,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    rewind: true,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            stagePadding: 50,
        },
        768: {
            items: 2,
            stagePadding: 50,
        },
        992: {
            items: 2,
            stagePadding: 75,
        },
        1200: {
            items: 3,
            stagePadding: 100,
        },
    }
});

$("#owl-carousel-4").owlCarousel({
    slideTransition: 'linear',
    loop: true,
    margin: 0,
    autoplay: true,
    smartSpeed: 500,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    rewind: true,
    nav: true,
    dots: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
        },
    }
});
var widthWindow = $(window).width();

$(document).ready(function () {

    $('.carrossel-noticias').owlCarousel({
        items: 1,
        loop: false,
        mouseDrag: false,
        margin: 0,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ['<svg><use xlink:href="#icone_anterior"></use></svg>', '<svg><use xlink:href="#icone_proximo"></use></svg>'],
        responsiveClass: true,
        responsive: {
            // breakpoint from 0 up
            1600: {
                items: 3,
                margin: 35,
            },
            1366: {
                items: 3,
                margin: 20,
            },
            1024: {
                items: 3,
                margin: 15,
            },
            580: {
                items: 2,
                margin: 15,
            },
        }
    });

});
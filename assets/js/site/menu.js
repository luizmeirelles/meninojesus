$(document).ready(function () {

    $('.js-ancora').click(function (event) {
        var posicao = $(this).data("posicao");
        var ancora = '.' + $(this).data('ancora');

        if (ancora.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $(ancora).offset().top + posicao
            }, 1000);
            $('.toggle-menu').removeClass("ativo");
            $(".nav-menu").removeClass("ativo");
            $('body').css('overflow', 'auto');
        }
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 1) {
            $('.menu').addClass('ativo');
        } else {
            $('.menu').removeClass('ativo');
        }
    });

    $(".toggle-menu").click(function () {
        toggle_menu()
    });
});

function toggle_menu() {
    if ($(".toggle-menu").hasClass("ativo")) {
        $('.toggle-menu').removeClass("ativo");
        $(".nav-menu").removeClass("ativo");
        $('body').css('overflow', 'auto');
    } else {
        $('.toggle-menu').addClass("ativo");
        $(".nav-menu").addClass("ativo");
        $('body').css('overflow', 'hidden');
    }
}



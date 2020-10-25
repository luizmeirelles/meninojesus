var base_url = $("#base_url").val();

$(document).ready(function () {

    $(".menu").addClass('ativo');

    window.localStorage.clear();

    $('.js-ancora').click(function () {
        var menu_clicado = $(this).data('ancora');
        window.localStorage.setItem('menusolicitado', menu_clicado);

        var menu_posicao = $(this).data('posicao');
        window.localStorage.setItem('menuposicao', menu_posicao);

        location.href = base_url;
    });

    $(".toggle-menu").click(function () {
        toggleMenu()
    });

});

function toggleMenu() {

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



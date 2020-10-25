var widthWindow = $(window).width();

$(document).ready(function () {

    if (widthWindow > 981) {
        $('.parallax').each(function () {
            var $obj = $(this);

            $(window).scroll(function () {
                var offset = $obj.offset();
                var yPos = -($(window).scrollTop() - offset.top) / $obj.data('speed');
                var bgpos = '50% ' + yPos + 'px';
                $obj.css('background-position', bgpos);
            });
        });
    }

    if (widthWindow < 580) {
        $(".inicio").css("height", window.innerHeight);
    }

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

    $('.carrossel-inicio').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        dots: true,
        nav: false,
    });

    $('.carrossel-formacoes').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        dots: true,
        nav: false,
    });

    buscar_videos('PLfhbd4sxRKtDti7XscfLir-PSwlvBZMW4');
});

function buscar_videos(playlist) {
    var id_playlist = playlist;

    $.getJSON("https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=10&playlistId=" + id_playlist + "&key=AIzaSyBXkcXROWvcDhYslrfkPGj9MCqw2sJPWu0",
        function (videos) {

            var array_videos = videos.items;

            for (var i = 0; i < array_videos.length; i++) {
                var id_video = array_videos[i].snippet.resourceId.videoId;

                $(".carrossel-videos").append(
                    '<a data-fancybox href="https://www.youtube.com/embed/' + id_video + '" class="item-video">' +
                    '<figure><img class="lazyload" data-src="https://i.ytimg.com/vi/' + id_video + '/hq720.jpg" alt=""></figure>' +
                    '</a>'
                );
            }

            $('.carrossel-videos').owlCarousel({
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
                        margin: 25,
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

            $('[data-fancybox]').fancybox({
                youtube: {
                    controls: 0,
                    showinfo: 0
                }
            })
        });
}
<section class="detalhe">
    <div class="container-detalhe container">
        <article class="coluna">
            <h1 class="titulo"><?= $titulo ?></h1>

            <div class="texto">
                <?= nl2br($texto) ?>
            </div>

            <div class="box">
                <p class="texto">Publicado em 03 de Outubro 2020</p>

                <div class="compartilhamento">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $meta_url ?>" target="_blank">
                        <svg>
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?= $titulo . ' ' . $meta_url ?>" target="_blank">
                        <svg>
                            <use xlink:href="#icone_whatsapp"></use>
                        </svg>
                    </a>

                    <a href="https://twitter.com/home?status=<?= $meta_url . ' ' . $titulo ?>" target="_blank">
                        <svg>
                            <use xlink:href="#twitter"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </article>

        <div class="coluna">
            <figure class="imagem-detalhe">
                <img class="lazyload" data-src="<?= $imagem ?>" alt="">
            </figure>
        </div>
    </div>
    <div class="mais-noticias container">
        <h2 class="titulo">Mais Notícias</h2>
        <div class="carrossel-noticias owl-carousel owl-theme">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <a href="<?= base_url('educacao') ?>" class="item-noticias">
                    <figure>
                        <img class="lazyload" data-src="<?= base_url('assets/imagens/noticias/educacao.jpg') ?>"
                             alt="">
                    </figure>
                    <h3 class="subtitulo">Educação</h3>
                    <p class="texto">
                        A educação tem um papel fundamental para a transformação social e desenvolvimento de nossa
                        cidade.
                    </p>
                    <span class="btn btn-sm">Saiba mais</span>
                </a>
            <?php } ?>
        </div>
    </div>
</section>
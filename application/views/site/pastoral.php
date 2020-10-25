<section class="pastoral">
    <div class="container-pastoral container">

        <h1 class="titulo">Pastorais e Movimentos</h1>

        <ul class="lista-pastoral">
            <?php for ($i = 1; $i <= 9; $i++) { ?>
                <li class="item-noticias">
                    <a href="<?= base_url('home/detalhe_pastoral_movimento') ?>">
                        <figure>
                            <img class="lazyload" data-src="<?= base_url('assets/imagens/noticias/educacao.jpg') ?>"
                                 alt="">
                        </figure>
                        <h3 class="subtitulo">Pastoral da Familía</h3>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>
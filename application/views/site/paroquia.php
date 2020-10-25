<section class="paroquia">
    <div class="container-paroquia container">
        <article class="coluna">
            <h1 class="titulo">A Paróquia</h1>

            <div class="texto">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                alteration in some form, by injected humour, or randomised words which don't look even slightly
                believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                predefined chunks as necessary, making this the first true generator on the Internet. It uses a
                dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate
                Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition,
                injected humour, or non-characteristic words etc.</p>
            </div>
        </article>

        <div class="coluna">
            <figure class="imagem-paroquia">
                <img class="lazyload" data-src="<?= base_url('assets/imagens/noticias/educacao.jpg') ?>">
            </figure>
        </div>
    </div>

    <div class="capela container">
        <h2 class="titulo">Capelas</h2>
        <div class="carrossel-capela owl-carousel owl-theme">
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="item-noticias">
                    <figure>
                        <img class="lazyload" data-src="<?= base_url('assets/imagens/noticias/educacao.jpg') ?>"
                             alt="">
                    </figure>
                    <h3 class="subtitulo">Educação</h3>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
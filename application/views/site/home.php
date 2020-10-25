<main>
    <section class="inicio">
        <div class="carrossel-inicio owl-carousel owl-theme">
            <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/bg-inicio.jpg') ?>" alt="">
            <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/bg-inicio.jpg') ?>" alt="">
            <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/bg-inicio.jpg') ?>" alt="">
        </div>
    </section>

    <section class="noticias">
        <div class="conteudo-noticias container">
            <h1 class="titulo">Notícias</h1>

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

    <section class="parallax" data-speed="2">
        <div class="conteudo container">
            <a href="" class="btn">A Paróquia</a>
        </div>
    </section>

    <section class="informacoes">
        <div class="conteudo container">
            <div class="card-informacao">
                <h1 class="titulo">Formações</h1>

                <div class="conteudo-card ">
                    <div class="carrossel-formacoes owl-carousel owl-theme">
                        <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/img-formacao.jpg') ?>" alt="">
                        <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/img-formacao.jpg') ?>" alt="">
                        <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/img-formacao.jpg') ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="card-informacao">
                <h1 class="titulo">Pastorais e Movimentos</h1>

                <a href="<?= base_url('home/pastorais_movimentos')?>" class="conteudo-card link">
                    <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/img-pastoral.jpg') ?>" alt="">
                </a>
            </div>
            <div class="card-informacao">
                <h1 class="titulo">Dizímo</h1>

                <a href="<?= base_url('home/dizimo')?>" class="conteudo-card link">
                    <img class="lazyload" data-src="<?= base_url('assets/imagens/geral/img-dizimo.jpg') ?>" alt="">
                </a>
            </div>
        </div>
    </section>

    <section class="missas">
        <div class="conteudo container">
            <h1 class="titulo">Horários de Missas</h1>

            <table>
                <thead>
                <tr>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sáb</th>
                    <th>Dom</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>08h30 | 10h00 | *12h00</td>
                </tr>
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>15h00</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>19h00</td>
                    <td>19h00</td>
                    <td>19h00</td>
                    <td>--</td>
                    <td>19h00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="contato">
        <div class="cabecalho container">
            <h1 class="titulo">CONTATO</h1>
        </div>

        <div class="conteudo-contato container">
            <div class="coluna">
                <form action="<?= base_url('home/envia_email') ?>"
                      class="form-contato formulario">

                    <div class="linha">
                        <div class="form-group wb-campos col-6">
                            <?php $campo = "nome_con"; ?>
                            <input type="text" name="<?= $campo ?>" maxlength="150"
                                   class="form-control <?= $campo ?>"
                                   required placeholder="Nome"/>
                        </div>

                        <div class="form-group wb-campos col-6">
                            <?php $campo = "telefone_con"; ?>
                            <input type="tel" name="<?= $campo ?>" maxlength="15"
                                   class="form-control telefone <?= $campo ?>"
                                   required placeholder="Telefone"/>
                        </div>
                    </div>

                    <div class="linha">
                        <div class="form-group wb-campos col-12">
                            <?php $campo = "email_con"; ?>
                            <input type="text" name="<?= $campo ?>" maxlength="150"
                                   class="form-control <?= $campo ?>"
                                   required placeholder="E-mail"/>
                        </div>
                    </div>

                    <div class="linha">
                        <div class="form-group wb-campos col-12">
                            <?php $campo = "mensagem_con"; ?>
                            <textarea name="<?= $campo; ?>" id="<?= $campo; ?>" cols="30"
                                      rows="5" placeholder="Mensagem"></textarea>
                        </div>
                    </div>

                    <div class="linha">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="coluna">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14782.39162375343!2d-51.4002082!3d-22.1413015!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x772fb409198274c1!2sPar%C3%B3quia%20Menino%20Jesus%20de%20Praga!5e0!3m2!1spt-BR!2sbr!4v1603499458834!5m2!1spt-BR!2sbr"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
</main>

<script src="https://www.google.com/recaptcha/api.js?render=6Lc9zOQUAAAAAN7-fSPkPRxtOrp7o4xWX6cFPrzv"></script>

<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lc9zOQUAAAAAN7-fSPkPRxtOrp7o4xWX6cFPrzv', {action: 'submit'}).then(function (token) {
            });
        });
    }
</script>

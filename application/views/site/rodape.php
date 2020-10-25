<footer class="rodape">
    <div class="cabecalho-rodape">
        <div class="conteudo container">
            <ul>
                <li>
                    <svg>
                        <use xlink:href="#icone_relogio"></use>
                    </svg>

                    <div class="box">
                        <p class="texto"><strong>Horário de atendimento da secretaria</strong></p>
                        <p class="texto">Seg a Sex: 08h00 as 18h00 | Sáb: 08h00 as 12h00</p>
                    </div>
                </li>

                <li>
                    <svg>
                        <use xlink:href="#icone_pin"></use>
                    </svg>

                    <div class="box">
                        <p class="texto">R. Adib Jorge Tannus, 30 - Jardim Bongiovani</p>
                        <p class="texto">Pres. Prudente - SP, 19050-470</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="conteudo-rodape container">
        <div class="coluna">
            <a class="js-ancora" data-ancora="inicio" data-posicao="0">
                <img class="logo-rodape" src="<?= base_url('assets/imagens/logo/logo.png') ?>" alt="Logo">
            </a>
        </div>

        <div class="coluna">
            <h4 class="subtitulo">Contato</h4>

            <nav class="nav-menu">
                <a href="https://web.whatsapp.com/send?1=pt_BR&phone=5518996278379" class="item-menu">
                    <svg>
                        <use xlink:href="#icone_whatsapp"></use>
                    </svg>
                    (18) 99627-8379
                </a>

                <a class="item-menu js-ancora" data-ancora="contato" data-posicao="-30">
                    <svg>
                        <use xlink:href="#icone_email"></use>
                    </svg>
                    contato@wandersonoliveira.com
                </a>
            </nav>
        </div>

        <div class="coluna">
            <h4 class="subtitulo">Mapa do Site</h4>

            <nav class="nav-menu sitemap">
                <a class="item-menu js-ancora" data-ancora="inicio" data-posicao="-1">Início</a>

                <a class="item-menu js-ancora" data-ancora="noticias" data-posicao="-30">Notícias</a>

                <a href="<?= base_url('home/paroquia')?>" class="item-menu">A Paróquia</a>

                <a href="<?= base_url('home/padre')?>"class="item-menu">O Padre</a>

                <a class="item-menu js-ancora" data-ancora="informacoes" data-posicao="-30">Formações</a>

                <a href="<?= base_url('home/pastorais_movimentos')?>"class="item-menu">Pastorais e Movimentos</a>

                <a href="<?= base_url('home/dizimo')?>"class="item-menu">Dizímo</a>

                <a class="item-menu js-ancora" data-ancora="missas" data-posicao="-30">Missas</a>

                <a class="item-menu js-ancora" data-ancora="contato" data-posicao="-30">Contato</a>
            </nav>
        </div>

        <div class="coluna">
            <h4 class="subtitulo">Redes Sociais</h4>
            <ul class="redes-sociais">
                <li>
                    <a href="https://www.facebook.com/ParMeninoJesus" target="_blank">
                        <svg>
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/parmeninojesus/" target="_blank">
                        <svg>
                            <use xlink:href="#instagram"></use>
                        </svg>
                    </a>
                </li>
                <li>
                     <a href="https://www.youtube.com/user/ParMeninoJesusPraga" target="_blank">
                         <svg>
                             <use xlink:href="#youtube"></use>
                         </svg>
                     </a>
                 </li>
            </ul>
        </div>
    </div>

    <div class="direitos container">
        <p>Copyright © <?= date('Y') . ' ' . $meta_titulo ?> - Todos os direitos reservados</p>

       <!-- <a href="http://instagram.com/luizhmeirelles" class="logo-dev" target="_blank">
            <img class="lazyload" data-src="<?= base_url('assets/imagens/logo/logoluiz.svg') ?>" alt="">
        </a>-->
    </div>
</footer>
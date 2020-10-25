<header class="menu">
    <div class="container-menu container">

        <a class="js-ancora" data-ancora="inicio" data-posicao="0">
            <img class="logo-menu" src="<?= base_url('assets/imagens/logo/logo.png') ?>" alt="Logo Wanderson">
        </a>

        <nav class="nav-menu">
            <div class="conteudo-menu">
                <a class="js-ancora logo-nav" data-ancora="inicio" data-posicao="0">
                    <img src="<?= base_url('assets/imagens/logo/logo.svg') ?>" alt="Logo Wanderson">
                </a>

                <a class="item-menu js-ancora" data-ancora="inicio" data-posicao="-1">Início</a>

                <a class="item-menu js-ancora" data-ancora="noticias" data-posicao="-30">Notícias</a>

                <a href="<?= base_url('home/paroquia')?>" class="item-menu">A Paróquia</a>

                <a href="<?= base_url('home/padre')?>"class="item-menu">O Padre</a>

                <a class="item-menu js-ancora" data-ancora="missas" data-posicao="-30">Missas</a>

                <a class="item-menu js-ancora" data-ancora="contato" data-posicao="-30">Contato</a>

                <ul class="redes-sociais">
                    <li>
                        <a href="https://www.facebook.com/wanderson.oliveira.35175" target="_blank">
                            <svg>
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/wanderson_oliveira.wo/" target="_blank">
                            <svg>
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                   <!-- <li>
                        <a href="" target="_blank">
                            <svg>
                                <use xlink:href="#youtube"></use>
                            </svg>
                        </a>
                    </li>-->
                </ul>
            </div>
        </nav>

        <a class="toggle-menu">
            <span></span>
        </a>
    </div>
</header>
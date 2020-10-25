<section class="dizimo">
    <div class="container-dizimo container">
        <article class="coluna">
            <h1 class="titulo">Seja um Dizimista</h1>

            <div class="texto">
                <p><strong>Oferecer o dízimo é agradecer a Deus!</strong></p>

                <p>Mas o que a igreja faz com a minha oferta? O seu dízimo é aplicado em três dimensões:</p>

                <p> - Religiosa: supre todas as necessidades ligadas ao culto e aos seus ministros, como as reformas, os
                    salários dos funcionários, encargos, energia elétrica, água, telefone, impressos, paramentos
                    litúrgicos, velas, vinho, hóstias, equipamentos de som e audiovisuais etc.</p>

                <p>- Missionária: o dízimo sustenta financeiramente as ações de evangelização da comunidade exercidas
                    dentro e fora do território da paróquia.</p>

                <p>- Social: supre as necessidades dos irmãos mais necessitados da comunidade, atendidos pelas pastorais
                    sociais. Só na Catedral, mensalmente, atendemos mais de 300 famílias com cestas básicas, roupas,
                    calçados, remédios, dezenas de gestantes necessitadas. Anualmente, são mais 30 toneladas de
                    alimentos distribuídos.</p>


                <p>Agradecemos a você, que é dizimista e que, com amor e fidelidade, partilha as graças de Deus e mantém
                    a nossa igreja viva, solidária e fraterna. Obrigado pela sua doação, obrigado pelo seu amor!</p>


                <p>Se você não é dizimista, torne-se um! Cadastre-se abaixo, e você receberá em sua casa a sua carteira
                    de Dizimista.</p>

                <p><strong>“Deus abençoa a quem oferece com alegria” (II Cor 9,2)</strong></p>
            </div>
        </article>

        <div class="coluna">
            <figure class="imagem-dizimo">
                <img class="lazyload" data-src="<?= base_url('assets/imagens/noticias/educacao.jpg') ?>">
            </figure>
        </div>
    </div>

    <div class="mais container">

        <h4 class="titulo">Quero me cadastrar</h4>

        <p class="texto">
            Se você já se convenceu desta importante participação na vida da comunidade, seja também um dizimista fiel.<br/> Preencha os dados e inicie a sua partilha de amor e fé na obra de Deus
        </p>

        <form action="<?= base_url('home/') ?>"
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
                    <?php $campo = "email_con"; ?>
                    <input type="text" name="<?= $campo ?>" maxlength="150"
                           class="form-control <?= $campo ?>"
                           required placeholder="E-mail"/>
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
                    <?php $campo = "email_con"; ?>
                    <input type="text" name="<?= $campo ?>" maxlength="150"
                           class="form-control <?= $campo ?>"
                           required placeholder="E-mail"/>
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

</section>
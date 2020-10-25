<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        foreach ($_POST as $key => $value) {
            $_POST[$key] = xss_clean($value);
        }
    }

    public function index()
    {

        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array();

        $topo['css_defer'] = array(
            'assets/plugins/owl-carousel/owl.carousel.min.css',
            'assets/plugins/owl-carousel/owl.theme.default.min.css',
            'assets/css/site/home.min.css',
        );

        $rodape['js'] = array(
            'assets/js/site/menu.js',
            'assets/js/site/home.js',
        );

        $rodape['js_defer'] = array(
            'assets/plugins/owl-carousel/owl.carousel.min.js',
            'assets/plugins/fancybox/jquery.fancybox.min-3-1-27.js',
            'assets/plugins/sweetalert2/sweetalert2.all.min.js',
            'assets/plugins/formvalidation/formValidation.min.js',
            'assets/plugins/formvalidation/language/pt_BR.js',
            'assets/plugins/formvalidation/framework/bootstrap.min.js',
            'assets/plugins/jquery/jquery.mask.min.js',
            'assets/plugins/lazyload/lazysizes.min.js',
            'assets/js/mascara.js',
            'assets/js/main.js');

        $rodape['js_link'] = array();

        $html = "";
        $html .= $this->load->view('estrutura/cabecalho', $topo, true);
        $html .= $this->load->view('estrutura/svg', [], true);
        $html .= $this->load->view('site/menu', [], true);
        $html .= $this->load->view('site/home', [], true);
        $html .= $this->load->view('site/rodape', [], true);
        $html .= $this->load->view('estrutura/rodape', $rodape, true);

        echo minify($html);
    }

    public function pagina_interna($code)
    {
        $dados["imagem"] = "";
        $dados["titulo"] = "";
        $dados["texto"] = "";

        switch (intval($code)) {

            case 1: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/educacao.jpg');
                $dados["titulo"] = "Educação";
                $dados["texto"] = "<p>A educação tem um papel fundamental para a transformação social e desenvolvimento de nossa cidade. Vou incentivar a comunidade a se organizar e participar das ações de construção do saber de nossas crianças. Os pais tem o direito constitucional de acompanhar e contribuir nas decisões que envolvem a forma de aprendizado de seus filhos.</p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
            case 2: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/familia.jpg');
                $dados["titulo"] = "Família";
                $dados["texto"] = "<p>A Família é a célula fundamenta da sociedade. Quero defender e proteger a família com medidas sociais que fortaleçam o vínculo familiar e favoreçam a prosperidade dos lares. Propor engajamento das pessoas para apoiar e ajudar as famílias que estão com dificuldades para desempenhar suas funções básicas. A estabilidade familiar gera vida, liberdade, segurança e fraternidade social. A vida em família é a iniciação para vida em sociedade. CIC 2207</p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
            case 3: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/tecnologia.jpg');
                $dados["titulo"] = "Tecnologia ";
                $dados["texto"] = "<p>Essencial para transformação econômica e social. Eu acompanho a evolução da tecnologia em Presidente Prudente desde 2013. Quero potencializar este trabalho representando este setor na Câmara municipal e defender a integração e fortalecimento do Ecossistema de inovação. O desenvolvimento em tecnologia e inovação é um grande potencial de nossa cidade e a valorização das universidades, empreendedores e parceiros é fundamental para melhorar a economia local.</p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
            case 4: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/familia.jpg');
                $dados["titulo"] = "Informação e Transparência";
                $dados["texto"] = "<p>As pessoas precisam de informação. Saber que em pleno século 21 as pessoas não têm acesso à informação e por isso não alcança seus direitos básicos é de grande indignação. Vou incentivar a transparência nas informações e convidar a comunidade para propor soluções que auxiliem na aproximação do poder público com as pessoas mais necessitadas. </p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
            case 5: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/familia.jpg');
                $dados["titulo"] = "Geração de Emprego ";
                $dados["texto"] = "<p>A valorização do empreendedor que tomado de sua liberdade, entende sua vocação para criação de bens e serviços que satisfazem as necessidades humanas é essencial para crescimento da produção e aumento de oportunidades de trabalho. Nossa missão é criar condições para que isso aconteça, com qualificação profissional, diminuição da burocracia, facilitação da organização de produtores locais para busca de novos mercados, dentre outras.</p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
            case 6: //ao-alcance-de-um-clique
                $dados["imagem"] = base_url('assets/imagens/noticias/acao-social.jpg');
                $dados["titulo"] = "Ação social";
                $dados["texto"] = "<p>Garantir o mínimo para uma vida digna. Precisamos de um trabalho efetivo do município na identificação dos necessitados e maior transparência nos gastos sociais. Parcerias com as associações, entidades, igrejas se unindo para suprir estas necessidades e valorização das ações já existentes desenvolvidas pela comunidade.</p>";
                $dados["publicado"] = "17 OUT 2020";
                $dados["tag"] = "";
                break;
        }

        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = strtolower($dados["titulo"]);
        $topo['meta_imagem'] = $dados['imagem'];
        $topo['meta_keywords'] = "";
        $topo['meta_descricao'] = substr($dados["texto"], 0, 100);
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/noticias.min.css',
        );

        $topo['css_defer'] = array(
            'assets/plugins/owl-carousel/owl.carousel.min.css',
            'assets/plugins/owl-carousel/owl.theme.default.min.css',
            );

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/noticias.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
            'assets/plugins/owl-carousel/owl.carousel.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu', $dados);
        $this->load->view('site/noticias', $dados);
        $this->load->view('site/rodape', $dados);
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function paroquia()
    {
        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/paroquia.min.css',
        );

        $topo['css_defer'] = array(
            'assets/plugins/owl-carousel/owl.carousel.min.css',
            'assets/plugins/owl-carousel/owl.theme.default.min.css',
        );

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/paroquia.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
            'assets/plugins/owl-carousel/owl.carousel.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu');
        $this->load->view('site/paroquia');
        $this->load->view('site/rodape');
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function padre()
    {
        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/padre.min.css',
        );

        $topo['css_defer'] = array();

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/padre.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu');
        $this->load->view('site/padre');
        $this->load->view('site/rodape');
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function dizimo()
    {
        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/dizimo.min.css',
        );

        $topo['css_defer'] = array();

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/dizimo.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu');
        $this->load->view('site/dizimo');
        $this->load->view('site/rodape');
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function pastorais_movimentos()
    {
        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/pastoral.min.css',
        );

        $topo['css_defer'] = array();

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/dizimo.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu');
        $this->load->view('site/pastoral');
        $this->load->view('site/rodape');
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function detalhe_pastoral_movimento()
    {
        $topo['meta_url'] = current_url();
        $topo['meta_titulo'] = "Paróquia Menino Jesus de Praga";
        $topo['meta_imagem'] = base_url('assets/imagens/geral/compartilhamento.jpg');
        $topo['meta_descricao'] = "";
        $topo['meta_keywords'] = "";
        $topo['favicon'] = "";

        $topo['css'] = array(
            'assets/css/site/pastoral_detalhe.min.css',
        );

        $topo['css_defer'] = array();

        $rodape['js'] = array();

        $rodape['js_defer'] = array(
            'assets/js/site/dizimo.js',
            'assets/js/site/menu_interno.js',
            'assets/plugins/lazyload/lazysizes.min.js',
        );

        $this->load->view('estrutura/cabecalho', $topo);
        $this->load->view('estrutura/svg');
        $this->load->view('site/menu');
        $this->load->view('site/pastoral_detalhe');
        $this->load->view('site/rodape');
        $this->load->view('estrutura/rodape', $rodape);
    }

    public function envia_email()
    {

        if ($this->input->post()) {
            $post = $this->input->post();

            $dados_email['nome'] = formata_string($post['nome_con'], 'sanitize');
            $dados_email['email'] = formata_string($post['email_con'], 'email');
            $dados_email['telefone'] = formata_string($post['telefone_con'], 'sanitize');
            $dados_email['mensagem'] = formata_string($post['mensagem_con'], 'sanitize');

            $mensagem_email = $this->load->view('email/template_contato', $dados_email, true);

            $email = 'luiz@l8.vc';

            mail('lmeirelles90@gmail.com', 'd', 'teste');
            //envia_email('Contato Site Wanderson', $mensagem_email, $email, $dados_email['nome'], $dados_email['email']);

            echo json_encode(['retorno' => true]);
        } else {
            echo json_encode(['retorno' => false]);
        }
    }

}
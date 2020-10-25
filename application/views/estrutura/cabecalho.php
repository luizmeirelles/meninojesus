<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?= $meta_titulo ?></title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <meta name="robots" content="<?= (!empty($meta_robots) ? $meta_robots : 'index, follow') ?>"/>
    <meta name="description" content="<?= $meta_descricao ?>"/>
    <meta name="keywords" content="<?= (!empty($meta_keywords) ? $meta_keywords : '') ?>"/>
    <meta name="author" content=""/>

    <link rel="shortcut icon" href="<?= base_url('assets/imagens/logo/favicon.png') ?>" type="image/png"/>
    <link rel="canonical" href="<?= current_url(); ?>"/>

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?= $meta_titulo ?>"/>
    <meta property="og:site_name" content="<?= $meta_titulo ?>"/>
    <meta property="og:url" content="<?= $meta_url ?>"/>
    <meta property="og:image" content="<?= $meta_imagem ?>"/>
    <meta property="og:description" content="<?= $meta_descricao ?>"/>
    <meta property='og:image:width' content='800'/>
    <meta property='og:image:height' content='450'/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="<?= current_url(); ?>"/>
    <meta name="twitter:title" content='<?= $meta_titulo ?>'/>
    <meta name="twitter:url" content="<?= $meta_url ?>"/>
    <meta name="twitter:creator" content="Luiz Meirelles"/>
    <meta name="twitter:image:src" content="<?= $meta_imagem ?>"/>
    <meta name="twitter:description" content='<?= $meta_descricao ?>'/>

    <meta itemprop="name" content='<?= $meta_titulo ?>'/>
    <meta itemprop="description" content='<?= $meta_descricao ?>'/>
    <meta itemprop="image" content="<?= $meta_imagem ?>"/>

    <style>
        <?//= include('assets/css_critico/css_critico_desk.css'); ?>
    </style>


    <link href="<?= base_url('assets/fontes/roboto/roboto.css')?>" rel="stylesheet" crossorigin="anonymous"/>

</head>
<body>


<?php

if (!empty($css)) {
    foreach ($css as $cada) {
        echo '<link href="' . base_url() . $cada . V . '" rel="stylesheet"/>';
    }
}

if (!empty($css_defer)) {
    foreach ($css_defer as $cada) {
        echo '<link defer href="' . base_url() . $cada . V . '" rel="stylesheet preload" as="style"/>';
    }
}

?>

<input type="hidden" id="base_url" value="<?= base_url(); ?>"/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'FOLLOW US CLOTHING' ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url('template_home/css/bootstrap.min.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url('template_home/css/slick.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url('template_home/css/slick-theme.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url('template_home/css/nouislider.min.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('template_home/css/font-awesome.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url('template_home/css/style.css') ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header style="border-bottom: 1px solid #B7B7B7;">
    <div id="header" style="background-color:white">
        <div class="container">
            <div class="row" style="display:flex; justify-content:center; align-items:center;">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="<?= base_url('index.php/home/') ?>" class="logo">
                            <img src="<?= base_url('template_home/img/logo-new.png') ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="<?= base_url('index.php/home/search') ?>" method="get">
                            <input type="text" name="q" class="" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px" placeholder="Cari Barang.." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row col-md-12">
                <div id="responsive-nav">
                    <ul class="main-nav nav navbar-nav">
                        <li><a href="<?= base_url('index.php/home/') ?>" style="font-size:20px; font-weight:600">PRODUK BARU</a></li>
                        <li><a href="<?= base_url('index.php/home/koleksi') ?>" style="font-size:20px; font-weight:600">KOLEKSI</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

		<title>FOLLOW US CLOTHING</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?=  base_url("template_home") ?>/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?=  base_url("template_home") ?>/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="<?=  base_url("template_home") ?>/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="<?=  base_url("template_home") ?>/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?=  base_url("template_home") ?>/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?=  base_url("template_home") ?>/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
	<body>
		<!-- HEADER -->
		<header style="border-bottom: 1px solid #B7B7B7;" >


			<!-- MAIN HEADER -->
			<div id="header" style="background-color:white">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row" style="display: flex; justify-content: center; align-items: center;" >
						                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="<?= base_url('index.php/home/') ?>" class="logo">
                                    <img src="<?= base_url('template_home/img/logo-new.png') ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form action="<?= base_url('index.php/home/search') ?>" method="get">
                                    <input type="text" name="q" class="" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px" placeholder="Cari Barang.." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <div class="col-md-3"></div>
                    </div>
                    <div class="row col-md-12"' >
						<div id="responsive-nav">
							<!-- NAV -->
							<ul class="main-nav nav navbar-nav">
								<!-- <li class="active"><a href="#">PRODUK BARU</a></li> -->
								<li><a href="<?= base_url('index.php/home/')?>" style="font-size:20px; font-weight:600" >PRODUK BARU</a></li>
				<li><a href="<?= base_url('index.php/koleksi') ?>" style="font-size:20px; font-weight:600" >KOLEKSI</a></li>
							</ul>
							<!-- /NAV -->
						</div>
					</div>					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->



		<!-- SECTION -->
<div class="container" style="padding:60px 0;">

    <h2 style="text-align:center; margin-bottom:50px; font-weight:600;">
        MY ACCOUNT
    </h2>

    <div class="row">

        <!-- LOGIN -->
        <div class="col-md-6">
            <div style="
                border:1px solid #ccc;
                padding:30px;
                max-width:400px;
                margin:auto;
                min-height:380px;
            ">
                <h3 style="margin-bottom:25px;">Masuk</h3>

                <form action="<?= base_url('index.php/auth/login') ?>" method="post">

                    <div class="form-group">
                        <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="Alamat Email *">
                    </div>

                    <div class="form-group">
                        <input type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kata Sandi *">
                    </div>

                    <div style="
                        display:flex;
                        justify-content:space-between;
                        margin-bottom:25px;
                    ">
                        <label>
                            <input type="checkbox">
                            Ingatkan saya
                        </label>

                        <a href="">
                            Lupa Password?
                        </a>
                    </div>

                    <button type="submit"
                        class="btn btn-dark"
                        style="
                        background:#333;
                        color:white;
                        width:120px;
                        border:none;
                        ">
                        MASUK
                    </button>

                </form>
            </div>
        </div>

        <!-- REGISTER -->
        <div class="col-md-6">
            <div style="
                border:1px solid #ccc;
                padding:30px;
                max-width:400px;
                margin:auto;
                min-height:380px;
            ">
                <h3 style="margin-bottom:25px;">Daftar</h3>

                <form action="<?= base_url('index.php/auth/register') ?>" method="post">

                    <div class="form-group">
                        <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="Alamat Email *">
                    </div>

                    <div class="form-group">
                        <input type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kata Sandi *">
                    </div>

                    <div class="form-group">
                        <input type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Nama Depan *">
                    </div>

                    <p style="
                        font-size:12px;
                        color:#777;
                        margin-top:20px;
                        margin-bottom:25px;
                    ">
                        
                    </p>

                    <button type="submit"
                        class="btn btn-dark"
                        style="
                        background:#333;
                        color:white;
                        width:120px;
                        border:none;
                        ">
                        DAFTAR
                    </button>

                </form>
            </div>
        </div>

    </div>

</div>
	</div>
		<hr style="border-top: 2px solid #B7B7B7;" >

		<?php $this->load->view('partials/footer'); ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="<?=  base_url("template_home") ?>/js/jquery.min.js"></script>
		<script src="<?=  base_url("template_home") ?>/js/bootstrap.min.js"></script>
		<script src="<?=  base_url("template_home") ?>/js/slick.min.js"></script>
		<script src="<?=  base_url("template_home") ?>/js/nouislider.min.js"></script>
		<script src="<?=  base_url("template_home") ?>/js/jquery.zoom.min.js"></script>
		<script src="<?=  base_url("template_home") ?>/js/main.js"></script>

	</body>
</html>



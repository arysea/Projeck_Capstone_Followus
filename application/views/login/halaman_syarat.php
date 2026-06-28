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
								<li><a href="<?= base_url('index.php/home/koleksi')?>" style="font-size:20px; font-weight:600" >KOLEKSI</a></li>
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
<div class="container" style="padding:60px 0; min-height:600px;">

    <h2 style="
        text-align:center;
        font-weight:600;
        margin-bottom:40px;
        letter-spacing:1px;
    ">
        SYARAT DAN KETENTUAN
    </h2>

    <div style="
        max-width:800px;
        margin:auto;
        text-align:center;
        font-size:15px;
        line-height:30px;
    ">

        <strong>Kebijakan order:</strong><br>

        - Silahkan memastikan ukuran produk sebelum melakukan pembayaran<br>
        - Untuk detail ukuran produk silahkan cek size chart<br>
        - Toleransi ukuran untuk setiap produk Â±1-2 cm<br><br>

        <strong>Kebijakan retur/pengembalian</strong><br>

        - Tidak menerima penukaran size, silahkan memastikan ukuran produk sebelum transaksi<br>
        - Hanya menerima penukaran produk yang terdapat kerusakan/cacat & salah pengiriman<br><br>

        <strong>Info Pengiriman</strong><br>

        - Pengiriman dilakukan setiap hari<br>
        - Order lewat pukul 17.00 akan dikirimkan hari berikutnya<br>
        - Jasa pengiriman variatif<br>

        Kenyamanan belanja Anda adalah prioritas kami, bila mengalami kendala saat
        melakukan transaksi silahkan hubungi kami melalui direct message

    </div>

</div>

<hr style="border-top:1px solid #B7B7B7;">

<div style="
    width:100%;
    max-width:1200px;
    margin:auto;
    text-align:right;
    padding:10px 0 20px 0;
">

    <a href="#top"
       style="
       color:black;
       text-decoration:none;
       font-size:14px;
       ">
        KEMBALI KE ATAS
    </a>

</div>

<hr style="border-top:1px solid #B7B7B7;">

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



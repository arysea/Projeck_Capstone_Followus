<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

		<title>PARFUM</title>

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
								<a href="#" class="logo">
									<img src="<?=  base_url("template_home") ?>/img/logo-new.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED;	 padding:10px"  placeholder="Cari Barang..">
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<div class="col-md-3">
							<label style="color:black"> <i class="fa-regular fa-user"></i>  <span style="margin-left: 10px; margin-right: 10px;" > Masuk / Daftar </span> <i class="fa-solid fa-bag-shopping"></i></label>
						</div>
					</div>
					<div class="row col-md-12" >
						<div id="responsive-nav">
							<!-- NAV -->
							<ul class="main-nav nav navbar-nav">
								<!-- <li class="active"><a href="#">PRODUK BARU</a></li> -->
								<li><a href="<?= base_url('index.php/home/')?>" style="font-size:20px; font-weight:600" >PRODUK BARU</a></li>
								<li><a href="<?= base_url('index.php/koleksi/')?>" style="font-size:20px; font-weight:600" >KOLEKSI</a></li>
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
		<div class="section">
			<!-- container -->
			<div class="container">

			<div style="text-align:center;">

            <label style="font-size:32px; font-weight:500;">
                PARFUM
            </label>
		
            </div>
					<div style=" width:350px; border:1px solid black; padding:10px; margin-left:auto;">

			<select style="
				width:100%;
				font-size:20px;
				padding:10px;
				border:none;
				outline:none;
			">
				<option>URUTKAN BERDASARKAN</option>
				<option>Berdasarkan Terbaru</option>
				<option>Berdasarkan Harga Tertinggi</option>
				<option>Berdasarkan Harga Terendah</option>
			</select>

				</div>
				<style>
					.hover-timbul img {
						transition: transform 0.3s ease, box-shadow 0.3s ease;
						border-radius: 8px; /* Sedikit melengkung agar bayangan terlihat lebih halus */
					}
					.hover-timbul:hover img {
						transform: translateY(-8px);
						box-shadow: 0 15px 30px rgba(0,0,0,0.15);
					}
				
				</style>
			

				<div class="row" style="margin-top:50px" >
					<div class="col-md-4 hover-timbul" style="cursor:pointer; ">
						<a href="<?= base_url('index.php/koleksi/halaman_kaos') ?>"style="text-decoration:none; color:black;">
						<img src="<?=  base_url("template_home") ?>/img/parfum/parfum_billy.png" style="width: 100%;" alt="">
						<div style="margin-top: 10px;">
							<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Parfum BILLY </label>
                            <br>
                            <label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Rp. 99.000</label>
						</div>
					</div>
					<div class="col-md-4 hover-timbul" style="cursor:pointer; ">
						<img src="<?=  base_url("template_home") ?>/img/parfum/parfum_flimsy.png" style="width: 100%;" alt="">
						<div style="margin-top: 10px;">
							<label for="" style="font-size:24px; font-weight:500; cursor:pointer;" >Parfum FLIMSY </label>
							<br>
							<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Rp. 99.000</label>
						</div>
					</div>
					<div class="col-md-4 hover-timbul" style="cursor:pointer; ">
						<img src="<?=  base_url("template_home") ?>/img/parfum/parfum_soft.png" style="width: 100%;" alt="">
						<div style="margin-top: 10px;">
							<label for="" style="font-size:24px; font-weight:500; cursor:pointer;" >Parfum SOFT ALANNA</label>
							<br>
							<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Rp. 99.000</label>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:15px" >
					<div class="col-md-4 hover-timbul" style="cursor:pointer; ">
						<img src="<?=  base_url("template_home") ?>/img/parfum/parfum_superior.png" style="width: 100%;" alt="">
						<div style="margin-top: 10px;">
							<label for="" style="font-size:24px; font-weight:500; cursor:pointer;" >Parfum SUPERIOR</label>
							<br>
							<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Rp. 99.000</label>
						</div>
					</div>
					<div class="col-md-4 hover-timbul" style="cursor:pointer; ">
						<img src="<?=  base_url("template_home") ?>/img/parfum/parfum_type.png" style="width: 100%;" alt="">
						<div style="margin-top: 10px;">
							<label for="" style="font-size:24px; font-weight:500; cursor:pointer;" >Parfum TYPE</label>
							<br>
							<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" >Rp. 99.000</label>
						</div>
					</div>
					

				</div>


			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	


	<hr style="border-top: 2px solid #B7B7B7;" >
			
		<div style="display:flex; justify-content:flex-end; margin-top:10px; max-width:1200px; margin-left:auto; margin-right:auto;">

    <a href="#top" style="font-size:20px; font-weight:400; text-decoration:none;">
        KEMBALI KE ATAS
    </a>

</div>
		
</div>
	</div>
		<hr style="border-top: 2px solid #B7B7B7;" >


		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section" style="background-color:#979797" >
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title" style="color:#fff" >Bantuan</h3>
								<ul class="footer-links">
									<li><a href="#" style="color:#fff">Pengiriman</a></li>
									<li><a href="#" style="color:#fff">Pengembalian</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title" style="color:#fff">Tentang Kami</h3>
								<ul class="footer-links">
									<li><a href="#" style="color:#fff">Perusahaan</a></li>
									<li><a href="#" style="color:#fff">Syarat dan ketentuan</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title" style="color:#fff">Kontak Kami</h3>
								<ul class="footer-links">
									<li><a href="#" style="color:#fff">followus@gmail.com</a></li>
									<li><a href="#" style="color:#fff">08123456789</a></li>
								</ul>
							</div>
						</div>

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
			<hr style="border-top: 2px solid black; padding:0px; margin:0px " >
			<!-- bottom footer -->
			<div id="bottom-footer" class="section" style="background-color:#979797" >
				<div class="container">
					<!-- row -->
					<div class="row">
						
						<div style="display:flex; justify-content:space-between; align-items:center; padding:15px 0;">

						<!-- ICON KIRI -->
						<div style="font-size:22px;">
    
						<a href="https://www.tiktok.com/@followus.co" target="_blank" 
						style="color:#fff; text-decoration:none; margin-right:15px;">
							<i class="fa-brands fa-tiktok"></i>
						</a>

						<a href="https://www.instagram.com/followus.co/" target="_blank" 
						style="color:#fff; text-decoration:none; margin-right:15px;">
							<i class="fa-brands fa-instagram"></i>
						</a>

						<a href="https://wa.me/0857-1912-8499" target="_blank" 
						style="color:#fff; text-decoration:none;">
							<i class="fa-brands fa-whatsapp"></i>
						</a>

				</div>

						<!-- COPYRIGHT KANAN -->
						 <div style="color:#ffff; font-size:14px;">
							 © <script>document.write(new Date().getFullYear());</script> Followco 2015 - 2026
						 </div>
						
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
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
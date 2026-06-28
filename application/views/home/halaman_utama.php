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
		<div class="section">
			<!-- container -->
			<div class="container">

			<?php if(isset($banner) && $banner): ?>
            <div style="margin-top:20px;">
                <div style="font-size:18pt; font-weight:700; line-height:1.2; margin-bottom:8px;"><?= htmlspecialchars($banner['judul_banner'] ?? '') ?></div>
                <div style="font-size:12pt; line-height:1.6; margin-top:4px;"><?= nl2br(htmlspecialchars($banner['deskripsi_banner'])) ?></div>

			<div class="row" style="margin-top:40px; justify-content: center; align-items: center;" >
				<img src="<?= base_url("assets/uploads/".$banner['gambar_banner']) ?>" style="display: block;
					margin-left: auto;
					margin-right: auto;" width="97%"  alt="gambar products">
			</div>
			<?php else: ?>
				<label style="font-size:32px; font-weight:400">Koleksi Topi</label>

				<div class="row" style="margin-top:40px; justify-content: center; align-items: center;" >
					<img src="<?= base_url("template_home/img/barang/img_collection1.png") ?>" style="display: block;
						margin-left: auto;
						margin-right: auto;" width="97%"  alt="Koleksi Topi">
				</div>
			<?php endif; ?>

			<?php if(isset($banner_second) && $banner_second): ?>
				<div style="margin-top:40px;">
					<div style="font-size:18pt; font-weight:700; line-height:1.2; margin-bottom:8px;">
						<?= htmlspecialchars($banner_second['judul_banner'] ?? '') ?>
					</div>
					<div style="font-size:12pt; line-height:1.6; margin-top:4px;">
						<?= nl2br(htmlspecialchars($banner_second['deskripsi_banner'])) ?></div>
				</div>
				<div class="row" style="margin-top:20px; justify-content: center; align-items: center;" >
					<img src="<?= base_url("assets/uploads/".$banner_second['gambar_banner']) ?>" style="display: block;
						margin-left: auto;
						margin-right: auto;" width="97%"  alt="gambar products">
				</div>
			<?php endif; ?>

			<style>
				.hover-timbul img {
					transition: transform 0.3s ease, box-shadow 0.3s ease;
					border-radius: 8px;
				}
				.hover-timbul:hover img {
					transform: translateY(-8px);
					box-shadow: 0 15px 30px rgba(0,0,0,0.15);
				}
			</style>

<!--				<div class="row" style="margin-top:40px; align-items: center;">
					<div class="col-md-12">
						<label style="font-size:20px; font-weight:400;">Barang Baru</label>
					</div>
					<div class="col-md-6" style="margin-top:20px;">
						<div class="shop-img">
							<img src="<?= base_url("template_home/img/barang/barang_baru_1.png") ?>" style="width:100%; border-radius:12px;" alt="Barang Baru 1">
						</div>
					</div>
					<div class="col-md-6" style="margin-top:20px;">
						<div class="shop-img">
							<img src="<?= base_url("template_home/img/barang/barang_baru_2.png") ?>" style="width:100%; border-radius:12px;" alt="Barang Baru 2">
						</div>
					</div>
					<div class="col-md-12" style="display:flex; justify-content:flex-end; margin-top:10px;">
						<a href="#" style="font-size:20px; font-weight:400; text-decoration:underline; color:#000;">BELI SEKARANG</a>
					</div>
				</div>
			-->
				<!-- row -->
				<label  style="font-size:20px; font-weight:400; margin-top:40px">Produk Terbaru</label>

				<div class="row" style="margin-top:25px" >
					<?php if(isset($barang) && count($barang) > 0): ?>
						<?php foreach($barang as $b): ?>
						<div class="col-md-4 hover-timbul" style="cursor:pointer; margin-bottom: 30px;">
							<?php
								// Cek apakah foto ada, jika tidak gunakan placeholder
								$foto = $b['foto_produk'] ? base_url("assets/uploads/".$b['foto_produk']) : 'https://via.placeholder.com/400x400?text=No+Image';
							?>
							<img src="<?= $foto ?>" style="width: 100%; height:300px; object-fit:cover;" alt="<?= $b['nama_produk'] ?>">
							<div style="margin-top: 15px;">
								<label for="" style="font-size:24px; font-weight:400; cursor:pointer;" ><?= $b['nama_produk'] ?></label>
								<br>
								<label for="" style="font-size:20px; font-weight:400; cursor:pointer; color:#d10024;" >Rp <?= number_format($b['harga_produk'], 0, ',', '.') ?></label>
								<br>
								<?php
								$text = "Saya ingin membeli barang {$b['nama_produk']} yang harganya " .
										number_format($b['harga_produk'], 0, ',', '.') .
										" Ribu dengan ukuran {$b['ukuran_produk']}";
								?>
								<a href="https://wa.me/6285719128499?text=<?= urlencode($text) ?>" style="color:blue">
									Beli Sekarang
								</a>
							</div>
						</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="col-md-12 text-center">
							<p>Belum ada produk yang ditambahkan.</p>
						</div>
					<?php endif; ?>
				</div>

			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<hr style="border-top: 2px solid #B7B7B7;" >
	<div class="row" style="margin-top:40px; justify-content:center; align-items:center; text-align:center;">

    <img src="<?= base_url('template_home/img/logo-new.png') ?>"
         style="display:block; margin:auto;"
         width="220">

    <p style="max-width:1000px; margin:20px auto 0; font-size:20px;">
        Follow Us adalah brand local asal Bogor dibangun sejak 2015 yang memproduksi seperti kaos,
        jaket, hoodie, topi, tas, beanie, celana, dll. Follow Us juga sudah bersertifikat merek
        yang disahkan pada tahun 2022
    </p>

	<hr style="border-top: 2px solid #B7B7B7;" >

		<div style="display:flex; justify-content:flex-end; margin-top:10px; max-width:1200px; margin-left:auto; margin-right:auto;">

    <a href="#top" style="font-size:20px; font-weight:400; text-decoration:none;">
        KEMBALI KE ATAS
    </a>

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



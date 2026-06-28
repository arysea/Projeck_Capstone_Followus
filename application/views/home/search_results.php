<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
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
                                <input type="text" name="q" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px" placeholder="Cari Barang.." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">
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

    <div class="section">
        <div class="container">
            <div style="text-align:center; margin-top: 40px; margin-bottom: 30px;">
                <h2>Hasil Pencarian "<?= htmlspecialchars($query) ?>"</h2>
            </div>

            <?php if (empty($results)): ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Tidak ada produk yang cocok dengan kata kunci pencarian.</p>
                    </div>
                </div>
            <?php else: ?>
                <div class="row" style="gap: 20px;">
                    <?php foreach ($results as $item): ?>
                        <?php
                            $isKoleksi = isset($item['type']) && $item['type'] === 'koleksi';
                            $image = $isKoleksi ? ($item['gambar_unit'] ?? null) : ($item['foto_produk'] ?? null);
                            $name = $isKoleksi ? ($item['nama_unit'] ?? 'Produk Koleksi') : ($item['nama_produk'] ?? 'Produk');
                            $price = $isKoleksi ? ($item['harga_unit'] ?? 0) : ($item['harga_produk'] ?? 0);
                            $size = $isKoleksi ? ($item['ukuran'] ?? '') : ($item['ukuran_produk'] ?? '');
                            $waText = 'Saya ingin membeli '.$name.' dengan harga Rp '.number_format($price,0,',','.');
                        ?>
                        <div class="col-md-4" style="margin-bottom: 30px;">
                            <div class="card" style="cursor:pointer; border:1px solid #ececec; border-radius: 10px; overflow:hidden;" data-toggle="modal" data-target="#productModal<?= $item['id'] ?>">
                                <?php if (!empty($image)): ?>
                                    <img src="<?= base_url('assets/uploads/'.$image) ?>" style="width:100%; height:320px; object-fit:cover;" alt="<?= htmlspecialchars($name) ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x320?text=No+Image" style="width:100%; height:320px; object-fit:cover;" alt="No Image">
                                <?php endif; ?>
                                <div style="padding: 15px;">
                                    <h4 style="font-size:22px; margin-bottom:10px;"><?= htmlspecialchars($name) ?></h4>
                                    <div style="font-size:18px; color:#d10024; font-weight:700; margin-bottom:10px;">Rp <?= number_format($price, 0, ',', '.') ?></div>
                                    <div style="font-size:16px; color:#7e7e7e; margin-bottom:12px;">Ukuran: <?= htmlspecialchars($size) ?></div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal<?= $item['id'] ?>">Lihat Detail</button>
                                </div>
                            </div>
                        </div>

                        <div id="productModal<?= $item['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= htmlspecialchars($name) ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php if (!empty($image)): ?>
                                                    <img src="<?= base_url('assets/uploads/'.$image) ?>" style="width:100%; height:100%; object-fit:cover; border-radius: 8px;" alt="<?= htmlspecialchars($name) ?>">
                                                <?php else: ?>
                                                    <img src="https://via.placeholder.com/500x500?text=No+Image" style="width:100%; height:100%; object-fit:cover; border-radius: 8px;" alt="No Image">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <p style="font-size:18px; color:#7e7e7e;">Ukuran: <?= htmlspecialchars($size) ?></p>
                                                <p style="font-size:24px; font-weight:700; color:#d10024;">Rp <?= number_format($price, 0, ',', '.') ?></p>
                                                <p style="font-size:16px; color:#444;">Produk ini dapat dipesan melalui WhatsApp dengan mengklik tombol di bawah.</p>
                                                <a href="https://wa.me/6285719128499?text=<?= urlencode($waText) ?>" class="btn btn-success">Beli Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php $this->load->view('partials/footer'); ?>

    <script src="<?= base_url('template_home/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/slick.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/nouislider.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/jquery.zoom.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/main.js') ?>"></script>
</body>
</html>

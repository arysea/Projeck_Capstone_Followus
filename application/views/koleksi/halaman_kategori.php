<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($kategori_label) ?></title>

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
                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
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
                            <li><a href="<?= base_url('index.php/koleksi/') ?>" style="font-size:20px; font-weight:600">KOLEKSI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <div style="text-align:center; margin-top: 40px;">
                <label style="font-size:32px; font-weight:500; display:block; margin-bottom:12px;"><?= htmlspecialchars($kategori_label) ?></label>
                <p style="font-size:20px; font-weight:400; text-align:justify; max-width:900px; margin:auto;">
                    Temukan koleksi <?= strtolower($kategori_label) ?> terbaru dengan desain terbaik, stok yang terkelola, dan pilihan harga yang jelas.
                </p>
            </div>

            <div style="display:flex; justify-content:flex-end; margin-top:30px;">
                <div style="width:350px; border:1px solid black; padding:10px;">
                    <select id="sortSelect" style="width:100%; font-size:20px; padding:10px; border:none; outline:none;">
                        <option value="">URUTKAN BERDASARKAN</option>
                        <option value="terbaru" <?= ($sort == 'terbaru') ? 'selected' : '' ?>>Terbaru</option>
                        <option value="harga-tinggi" <?= ($sort == 'harga-tinggi') ? 'selected' : '' ?>>Harga Tertinggi</option>
                        <option value="harga-rendah" <?= ($sort == 'harga-rendah') ? 'selected' : '' ?>>Harga Terendah</option>
                    </select>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var sortSelect = document.getElementById('sortSelect');
                    if (sortSelect) {
                        sortSelect.addEventListener('change', function() {
                            var selected = this.value;
                            var baseUrl = '<?= base_url('index.php/koleksi/'.strtolower($kategori)) ?>';
                            if (selected) {
                                window.location.href = baseUrl + '?sort=' + encodeURIComponent(selected);
                            } else {
                                window.location.href = baseUrl;
                            }
                        });
                    }
                });
            </script>

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

            <div class="row" style="margin-top:40px; gap: 20px;">
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <div class="col-md-4 hover-timbul" style="cursor:pointer; margin-bottom: 30px;">
                            <?php if ($item['gambar_unit']): ?>
                                <img src="<?= base_url('assets/uploads/'.$item['gambar_unit']) ?>" style="width: 100%; height: 320px; object-fit: cover;" alt="<?= htmlspecialchars($item['nama_unit']) ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x320?text=No+Image" style="width: 100%; height: 320px; object-fit: cover;" alt="No Image">
                            <?php endif; ?>
                            <div style="margin-top: 15px;">
                                <label style="font-size:24px; font-weight:500; display:block; cursor:pointer;"><?= htmlspecialchars($item['nama_unit']) ?></label>
                                <span style="font-size:20px; color:#7E7E7E;">Ukuran: <?= htmlspecialchars($item['ukuran']) ?></span><br>
                                <span style="font-size:20px; font-weight:700; color:#d10024;">Rp <?= number_format($item['harga_unit'], 0, ',', '.') ?></span><br>
                                <?php if ($item['stok'] > 0 && strtolower($item['status']) == 'active'): ?>
                                    <a href="https://wa.me/6285719128499?text=<?= urlencode('Saya ingin membeli '.$item['nama_unit'].' dengan harga Rp '.number_format($item['harga_unit'],0,',','.')) ?>" style="color:blue;">Beli Sekarang</a>
                                <?php else: ?>
                                    <span style="font-size:18px; color:#888;">Tidak tersedia / tidak aktif</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <p>Belum ada koleksi untuk kategori <?= htmlspecialchars($kategori_label) ?>.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <hr style="border-top: 2px solid #B7B7B7;">
    <div class="row" style="margin-top:40px; justify-content:center; align-items:center; text-align:center;">
        <img src="<?= base_url('template_home/img/logo-new.png') ?>" style="display:block; margin:auto;" width="220">
        <p style="max-width:1000px; margin:20px auto 0; font-size:20px;">
            Follow Us adalah brand local asal Bogor dibangun sejak 2015 yang memproduksi seperti kaos,
            jaket, hoodie, topi, tas, beanie, celana, dll. Follow Us juga sudah bersertifikat merek
            yang disahkan pada tahun 2022
        </p>
        <hr style="border-top: 2px solid #B7B7B7;">
        <div style="display:flex; justify-content:flex-end; margin-top:10px; max-width:1200px; margin-left:auto; margin-right:auto;">
            <a href="#top" style="font-size:20px; font-weight:400; text-decoration:none;">KEMBALI KE ATAS</a>
        </div>
    </div>

    <?php $this->load->view('partials/footer'); ?>

    <!-- jQuery Plugins -->
    <script src="<?= base_url('template_home/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/slick.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/nouislider.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/jquery.zoom.min.js') ?>"></script>
    <script src="<?= base_url('template_home/js/main.js') ?>"></script>
</body>
</html>

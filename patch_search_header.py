from pathlib import Path
import re

files = [
    Path('application/views/partials/header.php'),
    Path('application/views/home/halaman_utama.php'),
    Path('application/views/koleksi/halaman_aksesoris.php'),
    Path('application/views/koleksi/halaman_celana.php'),
    Path('application/views/koleksi/halaman_jaket.php'),
    Path('application/views/koleksi/halaman_kaos.php'),
    Path('application/views/koleksi/halaman_kategori.php'),
    Path('application/views/koleksi/halaman_kemeja.php'),
    Path('application/views/koleksi/halaman_koleksi.php'),
    Path('application/views/koleksi/halaman_parfum.php'),
    Path('application/views/koleksi/halaman_tas.php'),
    Path('application/views/koleksi/halaman_topi.php'),
    Path('application/views/login/halaman_daftar.php'),
    Path('application/views/login/halaman_followus.php'),
    Path('application/views/login/halaman_syarat.php'),
]

search_form_old = re.compile(
    r'<form>\s*<input[^>]*placeholder="Cari Barang\.\."[^>]*>\s*</form>',
    re.S,
)
search_form_new = """<form action=\"<?= base_url('index.php/home/search') ?>\" method=\"get\">\n                            <input type=\"text\" name=\"q\" class=\"\" style=\"width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px\" placeholder=\"Cari Barang..\" value=\"<?= isset($query) ? htmlspecialchars($query) : '' ?>\">\n                        </form>"""

login_block_old = re.compile(
    r'<div class="col-md-3">.*?<i class="fa-solid fa-bag-shopping"></i>\s*</label>\s*</div>',
    re.S,
)

stock_old = re.compile(
    r'<span style="font-size:18px; color:#444;">Stok: .*?</span><br>\s*<\?php if \(\$item\[\'stok\'\] > 0 && strtolower\(\$item\[\'status\'\]\) == \'active\'\): \?>\s*<a href="[^"]*" style="color:blue;">Beli Sekarang</a>\s*<\?php else: \?>\s*<span style="font-size:18px; color:#888;">Stok habis / tidak aktif</span>\s*<\?php endif; \?>',
    re.S,
)
stock_new = """<?php if ($item['stok'] > 0 && strtolower($item['status']) == 'active'): ?>\n                                    <a href=\"https://wa.me/6285719128499?text=<?= urlencode('Saya ingin membeli '.$item['nama_unit'].' dengan harga Rp '.number_format($item['harga_unit'],0,',','.')) ?>\" style=\"color:blue;\">Beli Sekarang</a>\n                                <?php else: ?>\n                                    <span style=\"font-size:18px; color:#888;\">Tidak tersedia / tidak aktif</span>\n                                <?php endif; ?>"""

for file_path in files:
    if not file_path.exists():
        print(f'MISSING {file_path}')
        continue

    text = file_path.read_text(encoding='utf-8')
    new_text = text
    new_text = search_form_old.sub(search_form_new, new_text)
    new_text = login_block_old.sub('<div class="col-md-3"></div>', new_text)
    if file_path.name == 'halaman_kategori.php':
        new_text = stock_old.sub(stock_new, new_text)

    if new_text != text:
        file_path.write_text(new_text, encoding='utf-8')
        print(f'updated {file_path}')

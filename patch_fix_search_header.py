from pathlib import Path
import re

files = [
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

search_form_replacement = '''<form action="<?= base_url('index.php/home/search') ?>" method="get">
                                    <input type="text" name="q" class="" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px" placeholder="Cari Barang.." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">
                                </form>'''

search_form_pattern = re.compile(
    r'<form>\s*<input[^>]*placeholder=["\']Cari Barang\.\.["\'][^>]*>\s*</form>',
    re.S | re.I,
)
login_block_pattern = re.compile(
    r'<div\s+class="col-md-3">.*?(?:Masuk\s*/\s*Daftar|Masuk) .*?<i\s+class="fa-solid\s+fa-bag-shopping"></i>\s*</label>\s*</div>',
    re.S | re.I,
)

replacement_login_block = '<div class="col-md-3"></div>'

for f in files:
    if not f.exists():
        print(f'MISSING {f}')
        continue

    text = f.read_text(encoding='utf-8')
    new_text = text
    new_text = search_form_pattern.sub(search_form_replacement, new_text)
    new_text = login_block_pattern.sub(replacement_login_block, new_text)

    if new_text != text:
        f.write_text(new_text, encoding='utf-8')
        print(f'UPDATED {f}')

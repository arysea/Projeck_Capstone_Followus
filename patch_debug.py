from pathlib import Path
import re

path = Path('application/views/koleksi/halaman_aksesoris.php')
text = path.read_text(encoding='utf-8')
print('len', len(text))
print('contains form', '<form>' in text)
print(text[text.find('<form>'):text.find('</form>')+7])
pattern = re.compile(r'<form>\s*<input[^>]*placeholder=["\']Cari Barang\.\.["\'][^>]*>\s*</form>', re.S | re.I)
print('pattern', pattern.pattern)
print('match', bool(pattern.search(text)))
if pattern.search(text):
    print(pattern.search(text).group(0))

login_pattern = re.compile(r'<div\s+class="col-md-3">.*?(?:Masuk\s*/\s*Daftar|Masuk).*?<i\s+class="fa-solid\s+fa-bag-shopping"></i>\s*</label>\s*</div>', re.S | re.I)
print('login match', bool(login_pattern.search(text)))

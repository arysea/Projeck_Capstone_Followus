$files = @(
    'application/views/home/halaman_utama.php',
    'application/views/koleksi/halaman_aksesoris.php',
    'application/views/koleksi/halaman_celana.php',
    'application/views/koleksi/halaman_jaket.php',
    'application/views/koleksi/halaman_kaos.php',
    'application/views/koleksi/halaman_kategori.php',
    'application/views/koleksi/halaman_kemeja.php',
    'application/views/koleksi/halaman_koleksi.php',
    'application/views/koleksi/halaman_parfum.php',
    'application/views/koleksi/halaman_tas.php',
    'application/views/koleksi/halaman_topi.php',
    'application/views/login/halaman_daftar.php',
    'application/views/login/halaman_followus.php',
    'application/views/login/halaman_syarat.php'
)

$searchFormPattern = [regex]::new('<form>\s*<input[^>]*placeholder="Cari Barang\.\."[^>]*>\s*</form>', [System.Text.RegularExpressions.RegexOptions]::Singleline)
$loginPattern = [regex]::new('<div\s+class="col-md-3">.*?<i\s+class="fa-solid\s+fa-bag-shopping"></i>\s*</label>\s*</div>', [System.Text.RegularExpressions.RegexOptions]::Singleline)

$replacementForm = '<form action="<?= base_url(''index.php/home/search'') ?>" method="get">`n                                    <input type="text" name="q" class="" style="width:100%; border-radius: 10px; border: 1px solid #E4E7ED; padding:10px" placeholder="Cari Barang.." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">`n                                </form>'
$replacementLogin = '<div class="col-md-3"></div>'

foreach ($file in $files) {
    if (-Not (Test-Path $file)) {
        Write-Host "MISSING $file"
        continue
    }
    $text = Get-Content -Raw -Path $file -ErrorAction Stop
    $newText = $searchFormPattern.Replace($text, $replacementForm)
    $newText = $loginPattern.Replace($newText, $replacementLogin)
    if ($newText -ne $text) {
        Set-Content -Path $file -Value $newText -Encoding UTF8
        Write-Host "UPDATED $file"
    }
}

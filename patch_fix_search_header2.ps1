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

$replacement = @'
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
'@

$pattern = [regex]::new('<!-- SEARCH BAR -->.*?<div class="col-md-3">.*?</div>\s*', [System.Text.RegularExpressions.RegexOptions]::Singleline)

foreach ($file in $files) {
    if (-Not (Test-Path $file)) {
        Write-Host "MISSING $file"
        continue
    }
    $text = Get-Content -Raw -Path $file
    $newText = $pattern.Replace($text, $replacement)
    if ($newText -ne $text) {
        Set-Content -Path $file -Value $newText -Encoding UTF8
        Write-Host "UPDATED $file"
    } else {
        Write-Host "NO MATCH $file"
    }
}

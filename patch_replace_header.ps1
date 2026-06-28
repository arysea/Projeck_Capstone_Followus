$files = @(
    'application/views/home/halaman_utama.php',
    'application/views/koleksi/halaman_aksesoris.php',
    'application/views/koleksi/halaman_celana.php',
    'application/views/koleksi/halaman_jaket.php',
    'application/views/koleksi/halaman_kaos.php',
    'application/views/koleksi/halaman_kemeja.php',
    'application/views/koleksi/halaman_koleksi.php',
    'application/views/koleksi/halaman_parfum.php',
    'application/views/koleksi/halaman_tas.php',
    'application/views/koleksi/halaman_topi.php',
    'application/views/login/halaman_daftar.php',
    'application/views/login/halaman_followus.php',
    'application/views/login/halaman_syarat.php'
)

$pattern = [regex]::new('<header.*?</header>', [System.Text.RegularExpressions.RegexOptions]::Singleline)
$replacement = '<?php $this->load->view(\'partials/header\'); ?>'

foreach ($file in $files) {
    if (-Not (Test-Path $file)) {
        Write-Host "MISSING $file"
        continue
    }
    $text = Get-Content -Raw -Path $file
    $count = 0
    $newText = $pattern.Replace($text, $replacement, 1)
    if ($newText -ne $text) {
        Set-Content -Path $file -Value $newText -Encoding UTF8
        Write-Host "UPDATED $file"
    } else {
        Write-Host "NO MATCH $file"
    }
}

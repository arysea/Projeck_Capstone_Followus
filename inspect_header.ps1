$files = @(
    'application/views/home/halaman_utama.php',
    'application/views/koleksi/halaman_aksesoris.php',
    'application/views/koleksi/halaman_celana.php',
    'application/views/login/halaman_daftar.php'
)
foreach ($file in $files) {
    Write-Host "--- $file ---"
    $text = Get-Content -Raw -Path $file
    $start = $text.IndexOf('<form>')
    if ($start -ge 0) {
        $end = $text.IndexOf('</form>', $start)
        if ($end -ge 0) {
            Write-Host "FORM BLOCK:"; Write-Host $text.Substring($start, $end - $start + 7)
        }
    }
    $idx = $text.IndexOf('Masuk / Daftar')
    if ($idx -ge 0) {
        Write-Host "LOGIN BLOCK:"; Write-Host $text.Substring([Math]::Max(0, $idx-60), 220)
    }
    $idx2 = $text.IndexOf('fa-bag-shopping')
    if ($idx2 -ge 0) {
        Write-Host "BAG BLOCK:"; Write-Host $text.Substring([Math]::Max(0,$idx2-60), 220)
    }
}

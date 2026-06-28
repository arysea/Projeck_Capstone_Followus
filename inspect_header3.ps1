$files = @(
    'application/views/home/halaman_utama.php',
    'application/views/koleksi/halaman_aksesoris.php',
    'application/views/login/halaman_daftar.php'
)

foreach ($file in $files) {
    Write-Host "--- $file ---"
    $text = Get-Content -Raw -Path $file
    Write-Host "Length: $($text.Length)"
    $placeholder = 'placeholder="Cari Barang.."'
    Write-Host "Contains placeholder: $($text.Contains($placeholder))"
    $regex = [regex]::new('placeholder="Cari Barang\.\."', [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    Write-Host "Regex match count: $([regex]::Matches($text, $regex).Count)"
    if ($text.Contains('<form>')) { Write-Host "startswith form index: $($text.IndexOf('<form>'))" }
    $loc = $text.IndexOf('<!-- SEARCH BAR -->')
    Write-Host "search bar index: $loc"
    if ($loc -ge 0) {
        $snippet = $text.Substring($loc, [math]::Min(250, $text.Length - $loc))
        Write-Host $snippet
    }
    Write-Host ""
}

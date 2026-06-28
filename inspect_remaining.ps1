$paths = Get-ChildItem -Path application/views -Recurse -Filter *.php | Select-Object -ExpandProperty FullName
foreach ($path in $paths) {
    $text = [System.IO.File]::ReadAllText($path)
    if ($text.Contains('Masuk / Daftar') -or $text.Contains('fa-solid fa-bag-shopping') -or $text.Contains('placeholder="Cari Barang.."')) {
        Write-Host "--- $path ---"
        $idx = $text.IndexOf('<!-- SEARCH BAR -->')
        if ($idx -ge 0) {
            $len = [Math]::Min(400, $text.Length - $idx)
            Write-Host $text.Substring($idx, $len)
        }
        $idx2 = $text.IndexOf('Masuk / Daftar')
        if ($idx2 -ge 0) {
            $len = [Math]::Min(400, $text.Length - $idx2)
            Write-Host "LOGIN SNIPPET:"
            Write-Host $text.Substring($idx2, $len)
        }
        $idx3 = $text.IndexOf('fa-solid fa-bag-shopping')
        if ($idx3 -ge 0) {
            $len = [Math]::Min(400, $text.Length - $idx3)
            Write-Host "BAG SNIPPET:"
            Write-Host $text.Substring($idx3, $len)
        }
        Write-Host ""
    }
}

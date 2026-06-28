<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Produk</h5>
        
        <!-- Form untuk mengedit barang -->
        <form action="<?= site_url('admin/proses_edit_barang') ?>" method="post" enctype="multipart/form-data">
            <!-- Input tersembunyi untuk menyimpan ID barang yang sedang diedit -->
            <input type="hidden" name="id" value="<?= $barang['id'] ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= $barang['nama_produk'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Produk</label>
                    <input type="number" name="harga_produk" class="form-control" value="<?= $barang['harga_produk'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Ukuran</label>
                    <select name="ukuran_produk" class="form-select" required>
                        <option value="">-- Pilih Ukuran --</option>
                        <!-- Menandai option yang terpilih sebelumnya menggunakan if -->
                        <option value="S" <?= ($barang['ukuran_produk'] == 'S') ? 'selected' : '' ?>>S</option>
                        <option value="M" <?= ($barang['ukuran_produk'] == 'M') ? 'selected' : '' ?>>M</option>
                        <option value="L" <?= ($barang['ukuran_produk'] == 'L') ? 'selected' : '' ?>>L</option>
                        <option value="XL" <?= ($barang['ukuran_produk'] == 'XL') ? 'selected' : '' ?>>XL</option>
                        <option value="XXL" <?= ($barang['ukuran_produk'] == 'XXL') ? 'selected' : '' ?>>XXL</option>
                        <option value="All Size" <?= ($barang['ukuran_produk'] == 'All Size') ? 'selected' : '' ?>>All Size</option>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" name="foto_produk" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                    
                    <!-- Tampilkan foto yang lama jika ada -->
                    <?php if($barang['foto_produk']): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('assets/uploads/'.$barang['foto_produk']) ?>" alt="Foto Produk" style="width: 100px; border-radius: 5px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Update Produk</button>
                <a href="<?= site_url('admin/barang') ?>" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form>
    </div>
</div>

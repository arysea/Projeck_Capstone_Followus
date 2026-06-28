<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Produk</h5>

        <!-- Form untuk menambah barang -->
        <!-- Enctype multipart/form-data wajib digunakan jika ada upload file (foto) -->
        <form action="<?= site_url('admin/proses_tambah_barang') ?>" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Produk</label>
                    <!-- Input Nama Produk -->
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Produk</label>
                    <!-- Input Harga Produk -->
                    <input type="number" name="harga_produk" class="form-control" placeholder="Contoh: 150000" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Ukuran</label>
                    <!-- Input Ukuran Produk -->
                    <select name="ukuran_produk" class="form-select" required>
                        <option value="">-- Pilih Ukuran --</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="All Size">All Size</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <!-- Input Upload Foto -->
                    <input type="file" name="foto_produk" class="form-control" accept="image/*">
                    <small class="text-muted">Pilih gambar dari komputer (jpg/png/jpeg)</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Simpan Produk</button>
                <a href="<?= site_url('admin/barang') ?>" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</div>

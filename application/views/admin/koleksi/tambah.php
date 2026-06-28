<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Koleksi</h5>

        <form action="<?= site_url('admin/proses_tambah_koleksi') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kaos">Kaos</option>
                        <option value="Parfum">Parfum</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Kemeja">Kemeja</option>
                        <option value="Jaket">Jaket</option>
                        <option value="Topi">Topi</option>
                        <option value="Celana">Celana</option>
                        <option value="Tas">Tas</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ukuran</label>
                    <input type="text" name="ukuran" class="form-control" placeholder="Contoh: S, M, L, XL, All Size">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama / Keterangan Unit</label>
                    <input type="text" name="nama_unit" class="form-control" placeholder="Contoh: Kaos Follow Us" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Unit</label>
                    <input type="number" name="harga_unit" class="form-control" placeholder="Contoh: 150000" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ketersediaan Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="Jumlah stok" value="0" min="0" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Gambar Unit</label>
                    <input type="file" name="gambar_unit" class="form-control" accept="image/*">
                    <small class="text-muted">Boleh kosong jika tidak ingin upload gambar sekarang.</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Simpan Koleksi</button>
                <a href="<?= site_url('admin/koleksi') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

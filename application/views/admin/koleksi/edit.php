<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Koleksi</h5>

        <form action="<?= site_url('admin/proses_edit_koleksi') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $koleksi['id'] ?>">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Kaos" <?= ($koleksi['kategori'] == 'Kaos') ? 'selected' : '' ?>>Kaos</option>
                        <option value="Parfum" <?= ($koleksi['kategori'] == 'Parfum') ? 'selected' : '' ?>>Parfum</option>
                        <option value="Aksesoris" <?= ($koleksi['kategori'] == 'Aksesoris') ? 'selected' : '' ?>>Aksesoris</option>
                        <option value="Kemeja" <?= ($koleksi['kategori'] == 'Kemeja') ? 'selected' : '' ?>>Kemeja</option>
                        <option value="Jaket" <?= ($koleksi['kategori'] == 'Jaket') ? 'selected' : '' ?>>Jaket</option>
                        <option value="Topi" <?= ($koleksi['kategori'] == 'Topi') ? 'selected' : '' ?>>Topi</option>
                        <option value="Celana" <?= ($koleksi['kategori'] == 'Celana') ? 'selected' : '' ?>>Celana</option>
                        <option value="Tas" <?= ($koleksi['kategori'] == 'Tas') ? 'selected' : '' ?>>Tas</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ukuran</label>
                    <input type="text" name="ukuran" class="form-control" value="<?= htmlspecialchars($koleksi['ukuran']) ?>" placeholder="Contoh: S, M, L, XL, All Size">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama / Keterangan Unit</label>
                    <input type="text" name="nama_unit" class="form-control" value="<?= htmlspecialchars($koleksi['nama_unit']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Unit</label>
                    <input type="number" name="harga_unit" class="form-control" value="<?= htmlspecialchars($koleksi['harga_unit']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ketersediaan Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= intval($koleksi['stok']) ?>" min="0" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Active" <?= ($koleksi['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                        <option value="Inactive" <?= ($koleksi['status'] != 'Active') ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Gambar Unit</label>
                    <input type="file" name="gambar_unit" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>

                    <?php if($koleksi['gambar_unit']): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('assets/uploads/'.$koleksi['gambar_unit']) ?>" alt="Gambar Koleksi" style="max-width: 300px; border-radius: 5px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Update Koleksi</button>
                <a href="<?= site_url('admin/koleksi') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

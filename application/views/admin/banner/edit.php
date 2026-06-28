<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit Banner</h5>
        
        <form action="<?= site_url('admin/proses_edit_banner') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $banner['id'] ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Banner</label>
                    <input type="text" name="judul_banner" class="form-control" value="<?= htmlspecialchars($banner['judul_banner'] ?? '') ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Deskripsi Banner</label>
                    <input type="text" name="deskripsi_banner" class="form-control" value="<?= $banner['deskripsi_banner'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Banner</label>
                    <select name="status_banner" class="form-select" required>
                        <option value="Aktif" <?= ($banner['status_banner'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                        <option value="Tidak Aktif" <?= ($banner['status_banner'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Gambar Banner</label>
                    <input type="file" name="gambar_banner" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    
                    <?php if($banner['gambar_banner']): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('assets/uploads/'.$banner['gambar_banner']) ?>" alt="Banner" style="max-width: 300px; border-radius: 5px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Update Banner</button>
                <a href="<?= site_url('admin/banner') ?>" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form>
    </div>
</div>

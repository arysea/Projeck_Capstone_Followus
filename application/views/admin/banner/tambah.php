<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah Banner</h5>
        
        <form action="<?= site_url('admin/proses_tambah_banner') ?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Banner</label>
                    <input type="text" name="judul_banner" class="form-control" placeholder="Contoh: Promo Musim Panas" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Deskripsi Banner</label>
                    <input type="text" name="deskripsi_banner" class="form-control" placeholder="Contoh: Diskon Akhir Tahun" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status Banner</label>
                    <select name="status_banner" class="form-select" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tag Banner</label>
                    <select name="tag" class="form-select" required>
                        <option value="">-- Pilih Tag --</option>
                        <option value="hu">hu (Halaman Utama)</option>
                        <option value="hk">hk (Halaman Koleksi)</option>
                    </select>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Gambar Banner</label>
                    <input type="file" name="gambar_banner" class="form-control" accept="image/*" required>
                    <small class="text-muted">Pilih gambar yang menarik untuk banner</small>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Simpan Banner</button>
                <a href="<?= site_url('admin/banner') ?>" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form>
    </div>
</div>

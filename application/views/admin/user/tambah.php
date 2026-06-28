<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Tambah User</h5>
        
        <form action="<?= site_url('admin/proses_tambah_user') ?>" method="post">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username unik" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hak Akses</label>
                    <select name="hak_akses" class="form-select" required>
                        <option value="">-- Pilih Hak Akses --</option>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">Super Admin</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Simpan User</button>
                <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form>
    </div>
</div>

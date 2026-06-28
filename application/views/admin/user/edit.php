<div class="card card-custom">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Edit User</h5>
        
        <form action="<?= site_url('admin/proses_edit_user') ?>" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Isi hanya jika ingin ganti password">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hak Akses</label>
                    <select name="hak_akses" class="form-select" required>
                        <option value="Admin" <?= ($user['hak_akses'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="Super Admin" <?= ($user['hak_akses'] == 'Super Admin') ? 'selected' : '' ?>>Super Admin</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #6366f1; border-color: #6366f1;">Update User</button>
                <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
            
        </form>
    </div>
</div>

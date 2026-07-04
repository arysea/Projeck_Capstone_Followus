<div class="card card-custom">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="m-0 fw-bold">Daftar User Admin</h5>
        <a href="<?= site_url('admin/tambah_user') ?>" class="btn btn-primary btn-sm" style="background-color: #6366f1; border-color: #6366f1;">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light text-secondary">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($users as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-bold"><?= $u['username'] ?></td>
                        <td>
                            <!-- Menampilkan badge hak akses -->
                            <?php if($u['hak_akses'] == 'Super Admin'): ?>
                                <span class="badge bg-danger"><?= $u['hak_akses'] ?></span>
                            <?php else: ?>
                                <span class="badge bg-info text-dark"><?= $u['hak_akses'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= site_url('admin/edit_user/'.$u['id']) ?>" class="btn btn-info btn-sm text-white" style="background-color: #38bdf8; border-color: #38bdf8;">
                                Ubah
                            </a>
                            <!-- Jangan tampilkan hapus jika ini adalah akun yang sedang login -->
                            <?php if($this->session->userdata('id_user') != $u['id']): ?>
                                <a href="<?= site_url('admin/hapus_user/'.$u['id']) ?>" class="btn btn-danger btn-sm confirm-action" data-confirm-title="Konfirmasi Hapus" data-confirm-message="Apakah Anda yakin ingin menghapus data ini?">
                                    Hapus
                                </a>
                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>Sedang Aktif</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($users)): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Belum ada data user.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

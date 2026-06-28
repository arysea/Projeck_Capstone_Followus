<div class="card card-custom">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="m-0 fw-bold">Daftar Banner</h5>
        <a href="<?= site_url('admin/tambah_banner') ?>" class="btn btn-primary btn-sm" style="background-color: #6366f1; border-color: #6366f1;">
            <i class="fas fa-plus"></i> Tambah Banner
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light text-secondary">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul Banner</th>
                        <th>Deskripsi Banner</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($banner as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php if($b['gambar_banner']): ?>
                                <img src="<?= base_url('assets/uploads/'.$b['gambar_banner']) ?>" alt="Banner" style="width: 100px; height: 50px; object-fit: cover; border-radius: 5px;">
                            <?php else: ?>
                                <span class="badge bg-secondary">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold"><?= htmlspecialchars($b['judul_banner'] ?? '-') ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($b['deskripsi_banner']) ?></td>
                        <td>
                            <!-- Menampilkan badge status Aktif / Tidak Aktif -->
                            <?php if($b['status_banner'] == 'Aktif'): ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= site_url('admin/edit_banner/'.$b['id']) ?>" class="btn btn-info btn-sm text-white" style="background-color: #38bdf8; border-color: #38bdf8;">
                                Ubah
                            </a>
                            <a href="<?= site_url('admin/hapus_banner/'.$b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($banner)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Belum ada data banner.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

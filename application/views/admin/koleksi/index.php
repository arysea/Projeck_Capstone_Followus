<div class="card card-custom">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="m-0 fw-bold">Daftar Koleksi</h5>
        <a href="<?= site_url('admin/tambah_koleksi') ?>" class="btn btn-primary btn-sm" style="background-color: #6366f1; border-color: #6366f1;">
            <i class="fas fa-plus"></i> Tambah Koleksi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light text-secondary">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Unit Number</th>
                        <th>Ukuran</th>
                        <th>Nama Unit</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($koleksi as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($item['kategori']) ?></td>
                        <td><?= htmlspecialchars($item['unit_number']) ?></td>
                        <td><?= htmlspecialchars($item['ukuran']) ?></td>
                        <td><?= htmlspecialchars($item['nama_unit']) ?></td>
                        <td>Rp <?= number_format($item['harga_unit'], 0, ',', '.') ?></td>
                        <td><?= intval($item['stok']) ?></td>
                        <td>
                            <?php if($item['gambar_unit']): ?>
                                <img src="<?= base_url('assets/uploads/'.$item['gambar_unit']) ?>" alt="Gambar Koleksi" style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px;">
                            <?php else: ?>
                                <span class="badge bg-secondary">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(strtolower($item['status']) == 'active'): ?>
                                <span class="badge bg-success">Active</span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?= htmlspecialchars($item['status']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= site_url('admin/edit_koleksi/'.$item['id']) ?>" class="btn btn-info btn-sm text-white" style="background-color: #38bdf8; border-color: #38bdf8;">
                                Ubah
                            </a>
                            <a href="<?= site_url('admin/hapus_koleksi/'.$item['id']) ?>" class="btn btn-danger btn-sm confirm-action" data-confirm-title="Konfirmasi Hapus" data-confirm-message="Apakah Anda yakin ingin menghapus data ini?">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if(empty($koleksi)): ?>
                    <tr>
                        <td colspan="10" class="text-center text-muted py-3">Belum ada data koleksi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

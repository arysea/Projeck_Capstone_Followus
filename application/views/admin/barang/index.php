<div class="card card-custom">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="m-0 fw-bold">Daftar Produk</h5>
        <a href="<?= site_url('admin/tambah_barang') ?>" class="btn btn-primary btn-sm" style="background-color: #6366f1; border-color: #6366f1;">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light text-secondary">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Ukuran</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Melakukan perulangan data barang dari database -->
                    <?php $no = 1; foreach($barang as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <!-- Menampilkan foto produk dari folder assets/uploads -->
                            <?php if($b['foto_produk']): ?>
                                <img src="<?= base_url('assets/uploads/'.$b['foto_produk']) ?>" alt="Foto Produk" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            <?php else: ?>
                                <span class="badge bg-secondary">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold"><?= $b['nama_produk'] ?></td>
                        <td><?= $b['ukuran_produk'] ?></td>
                        <td>Rp. <?= number_format($b['harga_produk'], 0, ',', '.') ?></td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <a href="<?= site_url('admin/edit_barang/'.$b['id']) ?>" class="btn btn-info btn-sm text-white" style="background-color: #38bdf8; border-color: #38bdf8;">
                                Ubah
                            </a>
                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('admin/hapus_barang/'.$b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- Jika data kosong -->
                    <?php if(empty($barang)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Belum ada data produk.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

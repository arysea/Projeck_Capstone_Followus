    <!-- Sidebar -->
    <div class="sidebar p-3" style="width: 250px;">
        <div class="text-center mb-4 mt-2">
            <h3 class="fw-bold text-dark">FOLLOW US<span style="font-size: 14px;">®</span></h3>
        </div>

        <ul class="list-unstyled">
            <li>
                <!-- Link Dashboard -->
                <a href="<?= site_url('admin/dashboard') ?>" class="sidebar-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <!-- Link Produk / Barang -->
                <a href="<?= site_url('admin/barang') ?>" class="sidebar-link <?= ($this->uri->segment(2) == 'barang' || $this->uri->segment(2) == 'tambah_barang' || $this->uri->segment(2) == 'edit_barang') ? 'active' : '' ?>">
                    <i class="fas fa-box me-2"></i> Produk Barang
                </a>
            </li>
            <li>
                <!-- Link Banner -->
                <a href="<?= site_url('admin/banner') ?>" class="sidebar-link <?= ($this->uri->segment(2) == 'banner' || $this->uri->segment(2) == 'tambah_banner' || $this->uri->segment(2) == 'edit_banner') ? 'active' : '' ?>">
                    <i class="fas fa-image me-2"></i> Banner
                </a>
            </li>
            <li>
                <!-- Link Koleksi -->
                <a href="<?= site_url('admin/koleksi') ?>" class="sidebar-link <?= ($this->uri->segment(2) == 'koleksi' || $this->uri->segment(2) == 'tambah_koleksi' || $this->uri->segment(2) == 'edit_koleksi') ? 'active' : '' ?>">
                    <i class="fas fa-layer-group me-2"></i> Koleksi
                </a>
            </li>
            <li>
                <!-- Link User -->
                <a href="<?= site_url('admin/user') ?>" class="sidebar-link <?= ($this->uri->segment(2) == 'user' || $this->uri->segment(2) == 'tambah_user' || $this->uri->segment(2) == 'edit_user') ? 'active' : '' ?>">
                    <i class="fas fa-users me-2"></i> User
                </a>
            </li>
            <li class="mt-4">
                <!-- Link Logout -->
                <a href="<?= site_url('admin/logout') ?>" class="sidebar-link text-danger delete-confirm" data-message="Yakin ingin keluar?">
                    <i class="fas fa-power-off me-2"></i> Keluar
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Bagian Kanan (Konten) -->
    <div class="w-100">
        <!-- Topbar -->
        <div class="topbar">
            <h5 class="m-0 fw-bold text-secondary"><?= isset($title) ? $title : '' ?></h5>
            <div class="user-info d-flex align-items-center">
                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                    <i class="fas fa-user"></i>
                </div>
                <!-- Menampilkan Username dari Session -->
                <span class="fw-bold text-secondary"><?= $this->session->userdata('username') ?></span>
                <span class="ms-1 text-muted">(<?= $this->session->userdata('hak_akses') ?>)</span>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Area Konten Utama -->
        <div class="content-area">
            <!-- Menampilkan Pesan Sukses jika ada -->
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Menampilkan Pesan Error jika ada -->
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

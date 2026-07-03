<!-- Tampilan Dashboard Admin -->
<div class="row">
    <!-- Kotak Info Total Produk -->
    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3 text-center">
            <h2 class="fw-bold text-dark"><?= $total_produk ?></h2>
            <p class="text-muted mb-0 fw-bold">Total Produk</p>
        </div>
    </div>

    <!-- Kotak Info Total Banner -->
    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3 text-center">
            <h2 class="fw-bold text-dark"><?= $total_banner ?></h2>
            <p class="text-muted mb-0 fw-bold">Banner Aktif</p>
        </div>
    </div>

    <!-- Kotak Info Total User -->
    <div class="col-md-4 mb-4">
        <div class="card card-custom p-3 text-center">
            <h2 class="fw-bold text-dark"><?= $total_user ?></h2>
            <p class="text-muted mb-0 fw-bold">Total User</p>
        </div>
    </div>
</div>

<div class="card card-custom p-4 mt-2 text-center">
    <h3 class="fw-bold">Selamat Datang di Admin Panel Toko Followus!</h3>
    <p class="text-muted">Anda bisa mengelola produk, banner, dan user melalui menu di sebelah kiri.</p>

    <div class="mt-4">
        <img src="https://img.freepik.com/free-vector/dashboard-concept-illustration_114360-4122.jpg?w=400" alt="Dashboard Illustration" style="max-width: 300px;">
    </div>
</div>

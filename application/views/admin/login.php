<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Followus</title>
    <!-- Menggunakan Bootstrap 5 untuk tampilan rapi dan responsif -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef; /* Warna latar belakang abu-abu terang */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-login {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Efek bayangan */
        }
        .bg-blue {
            background-color: #e2e8f0; /* Warna biru muda pada bingkai login */
            padding: 2rem;
            border-radius: 20px;
        }
        .btn-primary-custom {
            background-color: #6366f1; /* Warna tombol kebiruan sesuai gambar */
            border-color: #6366f1;
        }
    </style>
</head>
<body>

    <div class="bg-blue">
        <div class="card card-login border-0 p-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-secondary">FOLLOWUSCO</h4>
                    <h3 class="fw-bold text-dark">Admin Login</h3>
                    <p class="text-muted">Silahkan login untuk melanjutkan</p>
                </div>

                <!-- Pesan error jika login gagal -->
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger p-2 text-center">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Form Login -->
                <!-- Arahkan action form ke controller Admin function proses_login -->
                <form action="<?= site_url('admin/proses_login') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Username *</label>
                        <!-- Input username -->
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kata Sandi *</label>
                        <!-- Input password -->
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="d-grid mt-4">
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary text-white fw-bold" >MASUK</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // Konstruktor dijalankan pertama kali saat class ini dipanggil
    public function __construct() {
        parent::__construct();
        // Memuat model Admin_model agar bisa berinteraksi dengan database
        $this->load->model('Admin_model');
        // Memuat library dan helper yang dibutuhkan
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }

    // Fungsi pembantu untuk mengecek apakah admin sudah login
    // Jika belum login, maka akan dipaksa pindah ke halaman login
    private function _cek_login() {
        if ($this->session->userdata('status_login') != 'admin_login_ok') {
            redirect('admin/login');
        }
    }

    // Membuat nama file GUID untuk upload
    private function _generate_guid_filename($extension) {
        if (function_exists('random_bytes')) {
            $data = random_bytes(16);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $data = openssl_random_pseudo_bytes(16);
        } else {
            $data = uniqid('', true);
        }

        if (is_string($data) && strlen($data) === 16) {
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            $guid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        } else {
            $guid = bin2hex(md5(uniqid('', true)));
            $guid = substr($guid, 0, 8) . '-' . substr($guid, 8, 4) . '-' . substr($guid, 12, 4) . '-' . substr($guid, 16, 4) . '-' . substr($guid, 20, 12);
        }

        return $guid . '.' . $extension;
    }

    // ==========================================
    // BAGIAN LOGIN & LOGOUT
    // ==========================================

    public function index() {
        // Jika buka /admin, langsung cek login. Jika sudah, ke dashboard.
        if ($this->session->userdata('status_login') == 'admin_login_ok') {
            redirect('admin/dashboard');
        } else {
            redirect('admin/login');
        }
    }

    public function login() {
        // Menampilkan halaman login
        // var_dump('tes');die;
        $this->load->view('admin/login');
    }

    public function proses_login() {
        // Menangkap data inputan dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Mengecek ke database melalui model
        $cek = $this->Admin_model->cek_login($username, $password);

        if ($cek->num_rows() > 0) {
            $data_user = $cek->row(); // Ambil data 1 baris

            // Simpan data ke session agar sistem tahu kita sudah login
            $session_data = array(
                'id_user'      => $data_user->id,
                'username'     => $data_user->username,
                'hak_akses'    => $data_user->hak_akses,
                'status_login' => 'admin_login_ok'
            );
            $this->session->set_userdata($session_data);

            redirect('admin/dashboard');
        } else {
            // Jika gagal, set pesan error dan kembalikan ke halaman login
            $this->session->set_flashdata('error', 'Username atau Password tidak terdaftar!');
            redirect('admin/login');
        }
    }

    public function logout() {
        // Hapus semua data session dan kembalikan ke login
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    // ==========================================
    // BAGIAN DASHBOARD
    // ==========================================

    public function dashboard() {
        $this->_cek_login(); // Pastikan hanya admin yang bisa akses

        $data['title'] = 'Dashboard Admin';
        // Hitung total data untuk ditampilkan di dashboard
        $data['total_barang'] = count($this->Admin_model->get_all_barang());
        $data['total_banner'] = count($this->Admin_model->get_all_banner());
        $data['total_user'] = count($this->Admin_model->get_all_users());

        // Load view beserta template (Header, Sidebar, Konten, Footer)
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }

    // ==========================================
    // BAGIAN MANAGEMENT BARANG
    // ==========================================

    public function barang() {
        $this->_cek_login();
        $data['title'] = 'Management Data Barang';
        $data['barang'] = $this->Admin_model->get_all_barang(); // Ambil semua data barang

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/barang/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_barang() {
        $this->_cek_login();
        $data['title'] = 'Tambah Data Barang';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/barang/tambah');
        $this->load->view('admin/template/footer');
    }

    public function proses_tambah_barang() {
        $this->_cek_login();

        // Konfigurasi upload gambar
        $config['upload_path']   = './assets/uploads/'; // Folder tujuan
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Tipe file yang diizinkan
        $config['max_size']      = 2048; // Maksimal 2MB
        $config['encrypt_name']  = TRUE; // Ubah nama file acak agar tidak bentrok

        $this->upload->initialize($config);

        $foto_produk = '';
        // Lakukan upload file dengan nama input form 'foto_produk'
        if ($this->upload->do_upload('foto_produk')) {
            $upload_data = $this->upload->data();
            $foto_produk = $upload_data['file_name'];
        }

        // Siapkan data untuk dimasukkan ke database
        $data = array(
            'nama_produk'   => $this->input->post('nama_produk'),
            'harga_produk'  => $this->input->post('harga_produk'),
            'ukuran_produk' => $this->input->post('ukuran_produk'),
            'foto_produk'   => $foto_produk,
            'is_delete'     => 0
        );

        $this->Admin_model->insert_barang($data);
        $this->session->set_flashdata('success', 'Data barang berhasil ditambahkan!');
        redirect('admin/barang');
    }

    public function edit_barang($id) {
        $this->_cek_login();
        $data['title'] = 'Edit Data Barang';
        $data['barang'] = $this->Admin_model->get_barang_by_id($id);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/barang/edit', $data);
        $this->load->view('admin/template/footer');
    }

    public function proses_edit_barang() {
        $this->_cek_login();
        $id = $this->input->post('id');

        // Ambil data lama
        $barang_lama = $this->Admin_model->get_barang_by_id($id);
        $foto_produk = $barang_lama['foto_produk']; // Gunakan foto lama jika tidak ada upload baru

        // Cek apakah user mengupload file baru
        if (!empty($_FILES['foto_produk']['name'])) {
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_produk')) {
                $upload_data = $this->upload->data();
                $foto_produk = $upload_data['file_name'];

                // Hapus foto lama di folder jika ada
                if(file_exists('./assets/uploads/'.$barang_lama['foto_produk']) && $barang_lama['foto_produk']){
                    unlink('./assets/uploads/'.$barang_lama['foto_produk']);
                }
            }
        }

        $data = array(
            'nama_produk'   => $this->input->post('nama_produk'),
            'harga_produk'  => $this->input->post('harga_produk'),
            'ukuran_produk' => $this->input->post('ukuran_produk'),
            'foto_produk'   => $foto_produk
        );

        $this->Admin_model->update_barang($id, $data);
        $this->session->set_flashdata('success', 'Data barang berhasil diubah!');
        redirect('admin/barang');
    }

    public function hapus_barang($id) {
        $this->_cek_login();
        $this->Admin_model->delete_barang($id);
        $this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
        redirect('admin/barang');
    }

    public function koleksi() {
        $this->_cek_login();
        $data['title'] = 'Management Data Koleksi';
        $data['koleksi'] = $this->Admin_model->get_all_koleksi();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/koleksi/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_koleksi() {
        $this->_cek_login();
        $data['title'] = 'Tambah Data Koleksi';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/koleksi/tambah', $data);
        $this->load->view('admin/template/footer');
    }

    public function proses_tambah_koleksi() {
        $this->_cek_login();

        $kategori = $this->input->post('kategori');
        $unit_number = $this->Admin_model->generate_koleksi_unit_number($kategori);
        $gambar_unit = '';

        if (!empty($_FILES['gambar_unit']['name'])) {
            $extension = pathinfo($_FILES['gambar_unit']['name'], PATHINFO_EXTENSION);
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 10240;
            $config['file_name']     = $this->_generate_guid_filename($extension);
            $config['overwrite']     = FALSE;
            $config['encrypt_name']  = FALSE;

            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar_unit')) {
                $upload_data = $this->upload->data();
                $gambar_unit = $upload_data['file_name'];
            }
        }

        $data = array(
            'kategori'    => $kategori,
            'unit_number' => $unit_number,
            'ukuran'      => $this->input->post('ukuran'),
            'nama_unit'   => $this->input->post('nama_unit'),
            'harga_unit'  => $this->input->post('harga_unit'),
            'stok'        => (int) $this->input->post('stok'),
            'gambar_unit' => $gambar_unit,
            'status'      => $this->input->post('status'),
            'is_delete'   => 0,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        );

        $this->Admin_model->insert_koleksi($data);
        $this->session->set_flashdata('success', 'Data koleksi berhasil ditambahkan!');
        redirect('admin/koleksi');
    }

    public function edit_koleksi($id) {
        $this->_cek_login();
        $data['title'] = 'Edit Data Koleksi';
        $data['koleksi'] = $this->Admin_model->get_koleksi_by_id($id);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/koleksi/edit', $data);
        $this->load->view('admin/template/footer');
    }

    public function proses_edit_koleksi() {
        $this->_cek_login();
        $id = $this->input->post('id');

        $koleksi_lama = $this->Admin_model->get_koleksi_by_id($id);
        $gambar_unit = $koleksi_lama['gambar_unit'];

        if (!empty($_FILES['gambar_unit']['name'])) {
            $extension = pathinfo($_FILES['gambar_unit']['name'], PATHINFO_EXTENSION);
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 10240;
            $config['file_name']     = $this->_generate_guid_filename($extension);
            $config['overwrite']     = FALSE;
            $config['encrypt_name']  = FALSE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar_unit')) {
                $upload_data = $this->upload->data();
                $gambar_unit = $upload_data['file_name'];

                if (file_exists('./assets/uploads/'.$koleksi_lama['gambar_unit']) && $koleksi_lama['gambar_unit']) {
                    unlink('./assets/uploads/'.$koleksi_lama['gambar_unit']);
                }
            }
        }

        $data = array(
            'kategori'    => $this->input->post('kategori'),
            'ukuran'      => $this->input->post('ukuran'),
            'nama_unit'   => $this->input->post('nama_unit'),
            'harga_unit'  => $this->input->post('harga_unit'),
            'stok'        => (int) $this->input->post('stok'),
            'gambar_unit' => $gambar_unit,
            'status'      => $this->input->post('status'),
            'updated_at'  => date('Y-m-d H:i:s')
        );

        $this->Admin_model->update_koleksi($id, $data);
        $this->session->set_flashdata('success', 'Data koleksi berhasil diubah!');
        redirect('admin/koleksi');
    }

    public function hapus_koleksi($id) {
        $this->_cek_login();
        $this->Admin_model->delete_koleksi($id);
        $this->session->set_flashdata('success', 'Data koleksi berhasil dihapus!');
        redirect('admin/koleksi');
    }

    // ==========================================
    // BAGIAN MANAGEMENT BANNER
    // ==========================================

    public function banner() {
        $this->_cek_login();
        $data['title'] = 'Management Data Banner';
        $data['banner'] = $this->Admin_model->get_all_banner();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/banner/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_banner() {
        $this->_cek_login();
        $data['title'] = 'Tambah Data Banner';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/banner/tambah');
        $this->load->view('admin/template/footer');
    }

    public function proses_tambah_banner() {
        $this->_cek_login();

        $extension = pathinfo($_FILES['gambar_banner']['name'], PATHINFO_EXTENSION);
        $config['upload_path']   = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 10240; // 10 MB
        $config['file_name']     = $this->_generate_guid_filename($extension);
        $config['overwrite']     = FALSE;
        $config['encrypt_name']  = FALSE;

        $this->upload->initialize($config);

        $gambar_banner = '';
        if ($this->upload->do_upload('gambar_banner')) {
            $upload_data = $this->upload->data();
            $gambar_banner = $upload_data['file_name'];
        }

        $tag = $this->input->post('tag');
        $activeCount = $this->Admin_model->count_active_banners_by_tag($tag);
        if ($tag === 'hu' && $activeCount >= 2 && $this->input->post('status_banner') === 'Aktif') {
            $this->session->set_flashdata('error', 'Hanya diperbolehkan 2 banner aktif untuk tag hu.');
            redirect('admin/tambah_banner');
            return;
        }
        if ($tag === 'hk' && $activeCount >= 1 && $this->input->post('status_banner') === 'Aktif') {
            $this->session->set_flashdata('error', 'Hanya diperbolehkan 1 banner aktif untuk tag hk.');
            redirect('admin/tambah_banner');
            return;
        }

        $data = array(
            'judul_banner'    => $this->input->post('judul_banner'),
            'deskripsi_banner' => $this->input->post('deskripsi_banner'),
            'status_banner'    => $this->input->post('status_banner'),
            'tag'              => $tag,
            'gambar_banner'    => $gambar_banner,
            'is_delete'        => 0
        );

        $this->Admin_model->insert_banner($data);
        $this->session->set_flashdata('success', 'Data banner berhasil ditambahkan!');
        redirect('admin/banner');
    }

    public function edit_banner($id) {
        $this->_cek_login();
        $data['title'] = 'Edit Data Banner';
        $data['banner'] = $this->Admin_model->get_banner_by_id($id);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/banner/edit', $data);
        $this->load->view('admin/template/footer');
    }

    public function proses_edit_banner() {
        $this->_cek_login();
        $id = $this->input->post('id');

        $banner_lama = $this->Admin_model->get_banner_by_id($id);
        $gambar_banner = $banner_lama['gambar_banner'];

        if (!empty($_FILES['gambar_banner']['name'])) {
            $extension = pathinfo($_FILES['gambar_banner']['name'], PATHINFO_EXTENSION);
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 10240; // 10 MB
            $config['file_name']     = $this->_generate_guid_filename($extension);
            $config['overwrite']     = FALSE;
            $config['encrypt_name']  = FALSE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar_banner')) {
                $upload_data = $this->upload->data();
                $gambar_banner = $upload_data['file_name'];

                if(file_exists('./assets/uploads/'.$banner_lama['gambar_banner']) && $banner_lama['gambar_banner']){
                    unlink('./assets/uploads/'.$banner_lama['gambar_banner']);
                }
            }
        }

        $tag = $this->input->post('tag');
        $activeCount = $this->Admin_model->count_active_banners_by_tag($tag, $id);
        if ($tag === 'hu' && $activeCount >= 2 && $this->input->post('status_banner') === 'Aktif') {
            $this->session->set_flashdata('error', 'Hanya diperbolehkan 2 banner aktif untuk tag hu.');
            redirect('admin/edit_banner/'.$id);
            return;
        }
        if ($tag === 'hk' && $activeCount >= 1 && $this->input->post('status_banner') === 'Aktif') {
            $this->session->set_flashdata('error', 'Hanya diperbolehkan 1 banner aktif untuk tag hk.');
            redirect('admin/edit_banner/'.$id);
            return;
        }

        $data = array(
            'judul_banner'    => $this->input->post('judul_banner'),
            'deskripsi_banner' => $this->input->post('deskripsi_banner'),
            'status_banner'    => $this->input->post('status_banner'),
            'tag'              => $tag,
            'gambar_banner'    => $gambar_banner
        );

        $this->Admin_model->update_banner($id, $data);
        $this->session->set_flashdata('success', 'Data banner berhasil diubah!');
        redirect('admin/banner');
    }

    public function hapus_banner($id) {
        $this->_cek_login();
        $this->Admin_model->delete_banner($id);
        $this->session->set_flashdata('success', 'Data banner berhasil dihapus!');
        redirect('admin/banner');
    }

    // ==========================================
    // BAGIAN MANAGEMENT USER
    // ==========================================

    public function user() {
        $this->_cek_login();
        $data['title'] = 'Management Data User';
        $data['users'] = $this->Admin_model->get_all_users();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_user() {
        $this->_cek_login();
        $data['title'] = 'Tambah Data User';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/user/tambah');
        $this->load->view('admin/template/footer');
    }

    public function proses_tambah_user() {
        $this->_cek_login();

        $data = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')), // Enkripsi MD5
            'hak_akses' => $this->input->post('hak_akses'),
            'is_delete' => 0
        );

        $this->Admin_model->insert_user($data);
        $this->session->set_flashdata('success', 'Data user berhasil ditambahkan!');
        redirect('admin/user');
    }

    public function edit_user($id) {
        $this->_cek_login();
        $data['title'] = 'Edit Data User';
        $data['user'] = $this->Admin_model->get_user_by_id($id);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/user/edit', $data);
        $this->load->view('admin/template/footer');
    }

    public function proses_edit_user() {
        $this->_cek_login();
        $id = $this->input->post('id');

        $data = array(
            'username'  => $this->input->post('username'),
            'hak_akses' => $this->input->post('hak_akses')
        );

        // Hanya ubah password jika form password diisi
        $password_baru = $this->input->post('password');
        if (!empty($password_baru)) {
            $data['password'] = md5($password_baru);
        }

        $this->Admin_model->update_user($id, $data);
        $this->session->set_flashdata('success', 'Data user berhasil diubah!');
        redirect('admin/user');
    }

    public function hapus_user($id) {
        $this->_cek_login();
        // Cek agar tidak bisa menghapus diri sendiri
        if ($this->session->userdata('id_user') == $id) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus user yang sedang aktif digunakan!');
            redirect('admin/user');
        } else {
            $this->Admin_model->delete_user($id);
            $this->session->set_flashdata('success', 'Data user berhasil dihapus!');
            redirect('admin/user');
        }
    }
}

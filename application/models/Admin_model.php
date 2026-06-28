<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $this->create_koleksi_table();
    }

    private function create_koleksi_table() {
        if (!$this->db->table_exists('tbl_koleksi')) {
            $fields = array(
                'id' => array(
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => TRUE,
                    'auto_increment' => TRUE
                ),
                'kategori' => array(
                    'type'       => 'VARCHAR',
                    'constraint' => '50',
                    'null'       => FALSE
                ),
                'unit_number' => array(
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null'       => FALSE
                ),
                'ukuran' => array(
                    'type'       => 'VARCHAR',
                    'constraint' => '50',
                    'null'       => TRUE
                ),
                'nama_unit' => array(
                    'type' => 'TEXT',
                    'null' => FALSE
                ),
                'harga_unit' => array(
                    'type'       => 'DECIMAL',
                    'constraint' => '13,2',
                    'default'    => '0.00'
                ),
                'stok' => array(
                    'type'       => 'INT',
                    'constraint' => 11,
                    'default'    => 0
                ),
                'gambar_unit' => array(
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                    'null'       => TRUE
                ),
                'status' => array(
                    'type'       => 'VARCHAR',
                    'constraint' => '20',
                    'default'    => 'Active'
                ),
                'is_delete' => array(
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0
                ),
                'created_at' => array(
                    'type' => 'DATETIME',
                    'null' => TRUE
                ),
                'updated_at' => array(
                    'type' => 'DATETIME',
                    'null' => TRUE
                )
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('tbl_koleksi', TRUE);
        }
    }

    private function format_koleksi_unit_number($kategori) {
        $clean = strtolower(preg_replace('/[^a-z0-9]+/', '', $kategori));
        $yearMonth = date('Ym');
        $count = $this->db->like('unit_number', $clean.$yearMonth, 'after')->count_all_results('tbl_koleksi');
        return $clean . $yearMonth . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
    }

    public function generate_koleksi_unit_number($kategori) {
        return $this->format_koleksi_unit_number($kategori);
    }

    // ==========================================
    // BAGIAN 1: FUNGSI UNTUK LOGIN & USER
    // ==========================================

    // Fungsi untuk mengecek login berdasarkan username dan password
    public function cek_login($username, $password) {
        $this->db->where('username', $username);
        // Menggunakan MD5 untuk password (sebaiknya di masa depan gunakan password_hash)
        $this->db->where('password', $password);
        $this->db->where('is_delete', 0); // Hanya user yang belum dihapus
        $query = $this->db->get('tbl_user');
        return $query;
    }

    // Fungsi mengambil semua data user yang belum dihapus (is_delete = 0)
    public function get_all_users() {
        $this->db->where('is_delete', 0);
        $query = $this->db->get('tbl_user');
        return $query->result_array(); // Mengembalikan data dalam bentuk array
    }

    // Fungsi untuk menambahkan user baru ke tabel
    public function insert_user($data) {
        return $this->db->insert('tbl_user', $data);
    }

    // Fungsi untuk mengambil data user spesifik berdasarkan ID
    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_user');
        return $query->row_array(); // Mengembalikan 1 baris data dalam bentuk array
    }

    // Fungsi untuk mengubah data user berdasarkan ID
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_user', $data);
    }

    // Fungsi untuk menghapus user (Soft Delete, hanya mengubah status is_delete menjadi 1)
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_user', ['is_delete' => 1]);
    }

    // ==========================================
    // BAGIAN 2: FUNGSI UNTUK DATA BARANG
    // ==========================================

    public function get_all_barang() {
        $this->db->where('is_delete', 0);
        // Mengurutkan dari yang terbaru ditambahkan
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tbl_barang');
        return $query->result_array();
    }

    public function insert_barang($data) {
        return $this->db->insert('tbl_barang', $data);
    }

    public function get_barang_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_barang');
        return $query->row_array();
    }

    public function update_barang($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_barang', $data);
    }

    public function delete_barang($id) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_barang', ['is_delete' => 1]);
    }

    // ==========================================
    // BAGIAN 3: FUNGSI UNTUK DATA KOLEKSI
    // ==========================================

    public function get_all_koleksi() {
        $this->db->where('is_delete', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tbl_koleksi');
        return $query->result_array();
    }

    public function get_koleksi_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_koleksi');
        return $query->row_array();
    }

    public function get_koleksi_by_category($kategori, $sort = null) {
        $this->db->where('is_delete', 0);
        $this->db->where('LOWER(kategori)', strtolower($kategori));

        switch ($sort) {
            case 'harga-tinggi':
                $this->db->order_by('harga_unit', 'DESC');
                break;
            case 'harga-rendah':
                $this->db->order_by('harga_unit', 'ASC');
                break;
            case 'terbaru':
                $this->db->order_by('created_at', 'DESC');
                break;
            default:
                $this->db->order_by('id', 'DESC');
                break;
        }

        $query = $this->db->get('tbl_koleksi');
        return $query->result_array();
    }

    public function insert_koleksi($data) {
        return $this->db->insert('tbl_koleksi', $data);
    }

    public function update_koleksi($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_koleksi', $data);
    }

    public function delete_koleksi($id) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_koleksi', ['is_delete' => 1]);
    }

    // ==========================================
    // BAGIAN 4: FUNGSI UNTUK DATA BANNER
    // ==========================================

    public function get_all_banner() {
        $this->db->where('is_delete', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tbl_banner');
        return $query->result_array();
    }

    public function insert_banner($data) {
        return $this->db->insert('tbl_banner', $data);
    }

    public function get_banner_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_banner');
        return $query->row_array();
    }

    public function update_banner($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_banner', $data);
    }

    public function delete_banner($id) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_banner', ['is_delete' => 1]);
    }

}

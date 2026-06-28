<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    // Mengambil barang terbaru untuk halaman utama
    public function get_home_barang() {
        $this->db->where('is_delete', 0);
        $this->db->order_by('id', 'DESC');
        // $this->db->limit($limit); // Batasi jumlah barang yang tampil (misal 6)
        return $this->db->get('tbl_barang')->result_array();
    }

    public function search_barang($keyword) {
        if (trim($keyword) === '') {
            return [];
        }

        $keyword = trim($keyword);
        $results = [];

        $this->db->where('is_delete', 0);
        $this->db->group_start();
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('ukuran_produk', $keyword);
        $this->db->or_like('harga_produk', $keyword);
        $this->db->group_end();
        $this->db->order_by('id', 'DESC');
        $barang = $this->db->get('tbl_barang')->result_array();

        foreach ($barang as $item) {
            $item['type'] = 'barang';
            $results[] = $item;
        }

        $this->db->reset_query();
        $this->db->where('is_delete', 0);
        $this->db->group_start();
        $this->db->like('nama_unit', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('ukuran', $keyword);
        $this->db->group_end();
        $this->db->order_by('id', 'DESC');
        $koleksi = $this->db->get('tbl_koleksi')->result_array();

        foreach ($koleksi as $item) {
            $item['type'] = 'koleksi';
            $results[] = $item;
        }

        return $results;
    }

    // Mengambil banner yang aktif
    public function get_active_banners($limit = 2) {
        $this->db->where('is_delete', 0);
        $this->db->where('status_banner', 'Aktif');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('tbl_banner')->result_array();
    }

}

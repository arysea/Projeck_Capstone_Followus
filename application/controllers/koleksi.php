<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $this->load->model('Home_model');
        $banners = $this->Home_model->get_active_banners_by_tag('hk', 1);
        $data['banner'] = isset($banners[0]) ? $banners[0] : null;
        $this->load->view('koleksi/halaman_koleksi', $data);
    }

    public function kaos()
    {
        $this->render_category('Kaos', 'KAOS');
    }
    
    public function parfum()
    {
        $this->render_category('Parfum', 'PARFUM');
    }

    public function aksesoris()
    {
        $this->render_category('Aksesoris', 'AKSESORIS');
    }
    
    public function kemeja()
    {
        $this->render_category('Kemeja', 'KEMEJA');
    }
    
    public function jaket()
    {
        $this->render_category('Jaket & Hoodie', 'JAKET');
    }

    public function topi()
    {
        $this->render_category('Topi', 'TOPI');
    }

    public function celana()
    {
        $this->render_category('Celana', 'CELANA');
    }

    public function tas()
    {
        $this->render_category('Tas', 'TAS');
    }

    private function render_category($title, $kategori)
    {
        $sort = $this->input->get('sort');
        $data['title'] = 'Koleksi '.$title;
        $data['kategori_label'] = $title;
        $data['kategori'] = $kategori;
        $data['sort'] = $sort;
        $data['items'] = $this->Admin_model->get_koleksi_by_category($kategori, $sort);
        $data['active_page'] = 'koleksi';

        $this->load->view('koleksi/halaman_kategori', $data);
    }

    public function login()
    {
        $this->load->view('login/halaman_daftar');
    }
}
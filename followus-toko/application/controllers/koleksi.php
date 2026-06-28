<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

    public function index()
    {
        $this->load->view('koleksi/halaman_koleksi');
    }

    public function kaos()
    {
        $this->load->view('koleksi/halaman_kaos');
    }
    
    public function parfum()
    {
        $this->load->view('koleksi/halaman_parfum');
    }

     public function aksesoris()
    {
        $this->load->view('koleksi/halaman_aksesoris');
    }
    
    public function kemeja()
    {
        $this->load->view('koleksi/halaman_kemeja');
    }
    
    public function jaket()
    {
        $this->load->view('koleksi/halaman_jaket');
    }

    public function topi()
    {
        $this->load->view('koleksi/halaman_topi');
    }
    public function celana()
    {
        $this->load->view('koleksi/halaman_celana');
    }

    public function tas()
    {
        $this->load->view('koleksi/halaman_tas');
    }
    public function login()
	{
		$this->load->view('login/halaman_daftar');
	}
}
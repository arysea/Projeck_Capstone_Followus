<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->model('Home_model');
        $banners = $this->Home_model->get_active_banners_by_tag('hu', 2);
        $data['banner'] = isset($banners[0]) ? $banners[0] : null;
        $data['banner_second'] = isset($banners[1]) ? $banners[1] : null;
        $data['barang'] = $this->Home_model->get_home_barang();

		$this->load->view('home/halaman_utama', $data);
	}

	public function search()
	{
		$this->load->model('Home_model');
		$query = $this->input->get('q');
		$data['query'] = trim($query);
		$data['results'] = $this->Home_model->search_barang($data['query']);

		$this->load->view('home/search_results', $data);
	}

	public function koleksi()
	{
		redirect('koleksi');
	}
	public function login()
	{
		$this->load->view('login/halaman_daftar');
	}
	public function syarat()
	{
		$this->load->view('login/halaman_syarat');
	}
	public function followus()
	{
		$this->load->view('login/halaman_followus');
	}
}

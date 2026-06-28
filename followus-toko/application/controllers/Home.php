<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home/halaman_utama');
	}

	public function koleksi()
	{
		$this->load->view('koleksi/halaman_koleksi');
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

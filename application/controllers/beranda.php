<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mberanda');
		$this->session->set_userdata('menu', 'beranda');
	}
	
	public function index()
	{
		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();
		$data['data_grid1'] = $this->mberanda->get_grid1(); //Untukmu Hari Ini
		$data['data_grid2'] = $this->mberanda->get_grid2(); //Promo Hari Ini
		$data['data_grid3'] = $this->mberanda->get_grid3(); //Best Seller

		$this->load->view('tema/head');
		$this->load->view('beranda',$data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');

	}

	public function kategori()
	{
		$data['nama_kategori'] = $this->uri->segment(3);
		$data['data_perkategori'] = $this->mberanda->get_perkategori($id=$this->uri->segment(3));
		$this->load->view('tema/head');
		$this->load->view('kategori',$data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');

	}

	public function detail_produk()
	{
		$data['nama_produk'] = $this->uri->segment(3);
		$data['data_produk'] = $this->mberanda->get_perproduk($id=$this->uri->segment(3));
		$this->load->view('tema/head');
		$this->load->view('detail_produk',$data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');

	}
}

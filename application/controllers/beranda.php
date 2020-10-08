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
}

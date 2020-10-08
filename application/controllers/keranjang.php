<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mberanda');
		$this->session->set_userdata('menu', 'keranjang');
	}
	
	public function index()
	{
		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();
		$this->load->view('tema/head');
		$this->load->view('keranjang',$data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

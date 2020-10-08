<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mberanda');
		$this->session->set_userdata('menu', 'pesanan');
	}
	
	public function index()
	{
		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();
		$this->load->view('tema/head');
		$this->load->view('pesanan',$data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

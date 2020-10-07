<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mberanda');
	}

	public function index()
	{

		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();

		$this->load->view('beranda',$data);
	}

	public function kategori()
	{

		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();

		$this->load->view('beranda',$data);
	}
}

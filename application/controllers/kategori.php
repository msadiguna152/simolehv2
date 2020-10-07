<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index()
	{	
		$data['nama_kategori'] = $this->uri->segment(3);
		$this->load->view('kategori');
	}

}

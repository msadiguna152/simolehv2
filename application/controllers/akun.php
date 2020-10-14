<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mberanda');
		$this->session->set_userdata('menu', 'akun');
	}
	
	public function index()
	{
		$this->load->view('tema/head');
		$this->load->view('login');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

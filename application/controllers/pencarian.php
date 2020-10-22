<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencarian extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('page/admin/mproduk', 'mproduk');
	}

	public function index()
	{
		$data = [];
		if ($this->input->get('query')) {
			$data['results'] = $this->mproduk->find($this->input->get('query'));
		}
		$this->load->view('pencarian', $data);
		$this->load->view('tema/menu');
	}

	public function temukan()
	{
		$results = $this->mproduk->find($this->input->post('query'));
		echo json_encode(['status' => 'success', 'data' => $results]);
	}

}

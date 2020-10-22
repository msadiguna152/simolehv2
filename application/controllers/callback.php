<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callback extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('page/admin/mpesanan', 'mpesanan');
	}

	public function index()
	{
		$data['nama_kategori'] = $this->uri->segment(3);
		$this->load->view('kategori');
	}

	public function ovo()
	{
		$data = json_decode(file_get_contents('php://input'), 1);
		if (isset($data['external_id'])) {
			if ($this->mpesanan->update_status_pesanan($data['status'], $data['external_id'])) {
				echo json_encode(['status' => $data['status']]);
			} else {
				echo json_encode(['status' => 'Error in local server']);
			}
		}
	}
	public function linkaja(){
		$data = json_decode(file_get_contents('php://input'), 1);
		if (isset($data['external_id'])) {
			if ($this->mpesanan->update_status_pesanan($data['status'], $data['external_id'])) {
				echo json_encode(['status' => $data['status']]);
			} else {
				echo json_encode(['status' => 'Error in local server']);
			}
		}
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mberanda');
		$this->load->model('page/admin/malamat', 'malamat');
		$this->load->model('page/admin/mproduk', 'mproduk');
		$this->session->set_userdata('menu', 'keranjang');
	}

	public function index()
	{
		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();
		$this->load->view('tema/head');
		$this->load->view('keranjang', $data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function items()
	{
		if ($this->input->post('ids')) {
			$ids = $this->input->post('ids');
			$produk = $this->mproduk->get_produk_where_id($ids);
			return response(['status' => 'success', 'data' => $produk->result()], 'json');
		} else {
			return response(['status' => 'error', 'message' => 'Id tidak tersedia', 'data' => []], 'json');
		}
	}

	public function checkout()
	{
		$data['alamat'] = $this->malamat->get_alamat_pembeli(3);//@TODO;masih statis. ambil dari session;
		$this->load->view('tema/head');
		$this->load->view('alamat_pemesanan', $data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function alamatpeta()
	{
		$this->load->view('tema/head');
		$this->load->view('alamat_peta');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function savealamat()
	{
		if ($this->input->post('alamat_lengkap') && $this->input->post('lat') && $this->input->post('long')) {
			if($this->malamat->insert_alamat()){
				redirect('keranjang/checkout');
			}
		}
	}
}

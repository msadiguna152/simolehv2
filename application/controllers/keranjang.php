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

	private function MyShuffle(&$arr)
	{
		for ($i = 0; $i < sizeof($arr); ++$i) {
			$r = rand(0, $i);
			$tmp = $arr[$i];
			$arr[$i] = $arr[$r];
			$arr[$r] = $tmp;
		}
	}

	public function checkout()
	{
		if ($this->input->post('alamat')) {
			$this->session->set_userdata('alamat', $this->input->post('alamat'));
		}
		var_dump($this->session->userdata());
		$data['alamat'] = $this->malamat->get_alamat_by_id($this->session->userdata('alamat'));//@TODO;masih statis. ambil dari session;
		$this->load->view('tema/head');
		$this->load->view('konfirmasi_pembelian', $data);
//		$this->load->view('/menu');
		$this->load->view('tema/footer');
	}

	public function alamat()
	{
		if (!$this->session->userdata('id_pengguna')) {
			$id_alamat = $this->session->userdata('alamat');
			$data['alamat'] = $this->malamat->get_alamat_by_id($id_alamat);
		} else {
			$data['alamat'] = $this->malamat->get_alamat_pembeli($this->session->userdata('id_pengguna'));//@TODO;masih statis. ambil dari session;
		}
		$this->load->view('tema/head');
		$this->load->view('alamat_pemesanan', $data);
//		$this->load->view('tema/menu');
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
			$last_insert_id = $this->malamat->insert_alamat();
			if ($last_insert_id) {
				$this->session->set_userdata('alamat', $last_insert_id);
				redirect('keranjang/alamat');
			}
		}
	}

	public function pembayaran()
	{
		$this->load->view('tema/head');
		$this->load->view('pembayaran');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function konfirmasi_pembelian()
	{
		$this->load->view('tema/head');
		$this->load->view('konfirmasi_pembelian');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

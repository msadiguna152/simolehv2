<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mberanda');
		$this->load->model('page/admin/mproduk', 'mproduk');
		$this->load->model('page/admin/mpesanan', 'mpesanan');
		$this->load->model('page/admin/mpembeli', 'mpembeli');
		$this->session->set_userdata('menu', 'pesanan');
	}

	public function index()
	{
		$data['data_kategori'] = $this->mberanda->get_kategori();
		$data['data_promosi'] = $this->mberanda->get_promosi();
		$this->load->view('tema/head');
		$this->load->view('pesanan', $data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function save_user()
	{
		if ($this->mpembeli->insert_pembeli()) {
			$this->session->set_userdata('namalengkap', $this->input->post('nama'));
			$this->session->set_userdata('nohp', $this->input->post('nohp'));
			return response(['status' => 'success'], 'json');
		}
		return response(['status' => 'error'], 'json');
	}

	public function proses()
	{
		if (!$this->session->userdata('qty')) {
			$this->session->set_flashdata('message', 'Ulangi beberapa saat lagi');
			redirect('/keranjang/checkout');
		}
		if (!$this->session->userdata('namalengkap') || !$this->session->userdata('nohp')) {
			$this->session->set_flashdata('message', 'Nama dan nomor hp tidak boleh kosong');
			redirect('/keranjang/checkout');
		}
		$qty = $this->session->userdata('qty');
		$ids = array_keys($qty);
		$produks = $this->mproduk->get_produk_where_id($ids);
		$total = 0;
		$status = false;
		foreach ($produks->result() as $produk) {
			$harga = $produk->harga_promosi == '0' ? $produk->harga : $produk->harga_promosi;
			$total = $total + ($harga * $qty[$produk->id_produk]['count']);
		}
		//@TODO:Belum termasuk ongkos kirim;
		if ($this->session->userdata('ewallet')) {
			$nohp = $this->session->userdata('nohpwallet');
			$status = $this->pembayaran_ewallet($total, str_replace('-', '', $nohp));//@TODO:linkaja punya callback, buat langsung update status di database;
			if ($status) {
				$this->session->set_flashdata('message', 'Pemesanan berhasil');
			} else {
				$this->session->set_flashdata('message', 'Pemesanan gagal di laksanakan');
			}
		}
		if ($this->session->userdata('cod')) {
			$this->pembayaran_cod();//@TODO:manual. konfirmasi dari kurir pembeli
		}
		if ($this->session->userdata('bank')) {
			$this->pembayaran_bank(); //@TODO:return kode pembayaran untuk transfer.
		}
		$this->load->view('tema/head');
		$this->load->view('pembayaran_detail');
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	private function pembayaran_ewallet($total, $nohp)
	{
		$tipe_ewallet = $this->session->userdata('ewallet');
		if ($tipe_ewallet === 'OVO') {
			$ovoParams = [
				'external_id' => 'ovo-ewallet-' . time() . '-' . mt_rand(),
				'amount' => $total,
				'phone' => $nohp,
				'ewallet_type' => 'OVO'
			];
			$success = generate_pembayaran_ovo($ovoParams);
			if ($success) {
				return $this->simpan_rincian_pesanan($success);
			}
		}
		if ($tipe_ewallet === 'LINKAJA') {

		}
	}

	public function simpan_rincian_pesanan($success)
	{
		$dataForm = [
			'id_alamat' => $this->session->userdata('alamat'),
			'cara_pembayaran' => $success['ewallet_type'],
			'total_pembayaran' => $success['amount'],
			'tanggal_pesanan' => date('Y-m-d H:i:s', strtotime($success['created'])),
			'status' => $success['status'],
			'ongkir' => 0,//@TODO:ongkir
			'voucher' => 0,//@TODO:voucher,
			'kode_pembayaran' => $success['external_id']
		];
		$inserted_id = $this->mpesanan->insert_pesanan($dataForm);
		$qty = $this->session->userdata('qty');
		$ids = array_keys($qty);
		$produks = $this->mproduk->get_produk_where_id($ids);
		$dataRincian = [];
		foreach ($produks->result() as $produk) {
			$harga = $produk->harga_promosi == '0' ? $produk->harga : $produk->harga_promosi;
			$sub_total = ($harga * $qty[$produk->id_produk]['count']);
			array_push($dataRincian, [
				'id_pesanan' => $inserted_id,
				'id_produk' => $produk->id_produk,
				'banyak' => $qty[$produk->id_produk]['count'],
				'sub_total' => $sub_total
			]);
		}
		return $this->mpesanan->insert_rincian_pesanan($dataRincian) ? true : false;
	}

	private function pembayaran_bank()
	{

	}

	private function pembayaran_cod()
	{

	}

	public function success()
	{
		$this->load->view('tema/head');
		$this->load->view('pesanan_berhasil_dibuat');
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
//	public function status()
//	{
//		$this->load->view('tema/head');
//		$this->load->view('pembayaran_detail');
//		$this->load->view('tema/menu');
//		$this->load->view('tema/footer');
//	}
	public function detail()
	{
		$this->load->view('tema/head');
		$this->load->view('pembayaran_detail');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

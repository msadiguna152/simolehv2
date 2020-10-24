<?php
defined('BASEPATH') or exit('No direct script access allowed');

// update
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
		$data = [];
		if ($this->session->userdata('id_pembeli')) {
			$data['pesanan'] = $this->mpesanan->get_pesanan_customer($this->session->userdata('id_pembeli'));
		}
		$this->load->view('tema/head');
		$this->load->view('pesanan', $data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function save_user()
	{
		if ($this->session->userdata('username')) {
			$this->mpembeli->set_pembeli();
			return response(['status' => 'success', 'message' => 'Buyer is Member'], 'json');
		}
		if ($this->session->userdata('id_pembeli')) {
			return response(['status' => 'success', 'message' => 'Buyer already registered'], 'json');
		}
		if ($this->mpembeli->insert_pembeli()) {
			$this->session->set_userdata('namalengkap', $this->input->post('nama_pembeli'));
			$this->session->set_userdata('nohp', $this->input->post('no_telpon'));
			return response(['status' => 'success'], 'json');
		}
		return response(['status' => 'error'], 'json');
	}

	public function save_catatan()
	{
		$this->session->set_userdata('catatan', $this->input->post('catatan'));
	}

	public function ongkir()
	{
		if ($this->input->post('ongkir')) {
			$this->session->set_userdata('ongkir', $this->input->post('ongkir'));
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
		if (!$this->session->userdata('ongkir')) {
			$this->session->set_flashdata('message', 'Terjadi kesalahan saat mengambil data. Silahkan ulangi beberapa saat lagi.');
			redirect('/keranjang/checkout');
		}
		$qty = $this->session->userdata('qty');
		$ids = array_keys($qty);
		$produks = $this->mproduk->get_produk_where_id($ids);
		$total = 0;
		$status = false;
		$items = [];
		foreach ($produks->result() as $produk) {
			$items[] = ['id' => $produk->id_produk,
				'name' => $produk->nama_produk,
				'price' => ($produk->harga_promosi != 0 ? $produk->harga_promosi : $produk->harga),
				'quantity' => $qty[$produk->id_produk]['count']];
			$harga = $produk->harga_promosi == '0' ? $produk->harga : $produk->harga_promosi;
			$total = $total + ($harga * $qty[$produk->id_produk]['count']);
		}
		$total = $total + (int)$this->session->userdata('ongkir');
		$data['pembayaran'] = [];
		if ($this->session->userdata('ewallet')) {
			$nohp = $this->session->userdata('nohpwallet');
			$status = $this->pembayaran_ewallet($total, str_replace('-', '', $nohp), $items);
			if ($status) {
				$data['pembayaran'] = $this->mpesanan->get_pembayaran($this->session->userdata('id_pembayaran'));
				$this->session->set_userdata('metode_pembayaran', 'ewallet');
				$this->session->set_flashdata('message', 'Pemesanan berhasil');
				$this->clear_session('ewallet');
			} else {
				$this->session->set_flashdata('message', 'Pemesanan gagal di laksanakan');
			}
		}
		if ($this->session->userdata('bank')) {
			$status = $this->pembayaran_bank($total);
			if ($status) {
				$data['pembayaran'] = $this->mpesanan->get_pembayaran($this->session->userdata('id_pembayaran'));
				$this->session->set_userdata('metode_pembayaran', 'bank');
				$this->session->set_flashdata('message', 'Pemesanan berhasil');
				$this->clear_session('bank');
			}
		}
		if ($this->session->userdata('cod')) {
			$status = $this->pembayaran_cod($total);
			if ($status) {
				$this->session->set_userdata('metode_pembayaran', 'cod');
				$data['pembayaran'] = $this->mpesanan->get_pembayaran($this->session->userdata('id_pembayaran'));
			}
			$this->clear_session('cod');
		}
		//jika user sudah melakukan pembayaran
		if ($this->session->userdata('id_pembayaran')) {
			$data['pembayaran'] = $this->mpesanan->get_pembayaran($this->session->userdata('id_pembayaran'));
		}
		$this->load->view('tema/head');
		$this->load->view('pembayaran_detail', $data);
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	private function clear_session($payment)
	{
		if ($payment == 'ewallet') {
			$this->session->unset_userdata('ewallet');
			$this->session->unset_userdata('nohpwallet');
//			TODO: Perlu di tambahi lagi apa yang di unset
		} elseif ($payment == 'bank') {
			$this->session->unset_userdata('bank');
		} else {
			$this->session->unset_userdata('cod');
		}
		$this->session->unset_userdata('catatan');
		$this->session->unset_userdata('alamat');
	}

	private function pembayaran_ewallet($total, $nohp, $items = [])
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
			$linkajaParams = [
				'external_id' => 'linkaja-ewallet-' . time() . '-' . mt_rand(),
				'amount' => $total,
				'phone' => $nohp,
				'items' => $items,
				'callback_url' => 'https://6161b770f269.ngrok.io/callback/linkaja',
				'redirect_url' => 'https://6161b770f269.ngrok.io/pesanan',
				'ewallet_type' => 'LINKAJA'
			];
			/*@TODO: Ganti callback redirect*/
			$success = generate_pembayaran_linkaja($linkajaParams);
			if ($success) {
				return $this->simpan_rincian_pesanan($success);
			}
		}
	}

	private function pembayaran_bank($total)
	{
		$kode_bank = $this->session->userdata('bank');
		$paramsVA = [
			"external_id" => "$kode_bank-bank" . time() . '-' . mt_rand(),
			"bank_code" => $kode_bank,
			"name" => $this->session->userdata('namalengkap'),
			"is_closed" => true,
			"expected_amount" => $total,
			"is_single_use" => true
//			"expiration_date"=>//seting 24 jam
		];
		$success = generate_pembayaran_banks($paramsVA);
		if ($success) {
			$success['amount'] = $total;
			return $this->simpan_rincian_pesanan($success);
		}
		return false;
	}

	private function pembayaran_cod($total)
	{
		$data['amount'] = $total;
		$data['cod'] = true;
		return $this->simpan_rincian_pesanan($data);
	}

	public function simpan_rincian_pesanan($success)
	{
		//mulai transaksi
		$this->db->trans_start();
		$dataFormPesanan = [
			'id_alamat' => $this->session->userdata('alamat'),
			'total_pembayaran' => $success['amount'],
			'tanggal_pesanan' => date('Y-m-d H:i:s'),
			'status' => 1,
			'ongkir' => $this->session->userdata('ongkir'),//@TODO:ongkir
			'voucher' => 0,//@TODO:voucher,
			'catatan' => $this->session->userdata('catatan'),
		];
		$inserted_id = $this->mpesanan->insert_pesanan($dataFormPesanan);
		//jika pembayaran ewallet
		if (isset($success['ewallet_type'])) {
			$dataFormPembayaran = [
				'jenis_pembayaran' => $success['ewallet_type'],
				'kode_pembayaran' => $success['external_id'],
				'status_pembayaran' => $success['status'] ?? 'PENDING',
				'id_pesanan' => $inserted_id,
				'tanggal_pembayaran' => date('Y-m-d H:i:s'),
				'checkout_url' => $success['checkout_url'] ?? 'NULL'
			];
		}
		if (isset($success['bank_code'])) {
			$dataFormPembayaran = [
				'jenis_pembayaran' => $success['bank_code'],
				'kode_pembayaran' => $success['external_id'],
				'status_pembayaran' => $success['status'] ?? 'PENDING',
				'id_pesanan' => $inserted_id,
				'tanggal_pembayaran' => date('Y-m-d H:i:s'),
				'account_number' => $success['account_number'] ?? 'NULL',
				'expired_pembayaran' => $success['expiration_date'] ?? 'NULL'
			];
		}
		if (isset($success['cod'])) {
			$dataFormPembayaran = [
				'jenis_pembayaran' => 'COD',
				'kode_pembayaran' => 'COD-' . time() . '-' . mt_rand(),
				'status_pembayaran' => 'PENDING',
				'id_pesanan' => $inserted_id,
				'tanggal_pembayaran' => date('Y-m-d H:i:s'),
				'account_number' => $success['account_number'] ?? 'NULL',
				'expired_pembayaran' => $success['expiration_date'] ?? 'NULL'
			];
		}
		$status_insert_pembayaran = $this->mpesanan->insert_pembayaran($dataFormPembayaran);
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
		$this->mpesanan->insert_rincian_pesanan($dataRincian);

		$this->db->trans_complete();

		$trans_status = $this->db->trans_status();

		if ($trans_status == FALSE) {
			//jika transaksi gagal, rollback
			$this->db->trans_rollback();
			return false;
		} else {
			//jika transaksi sukses, commit dan set id pembayaran;
			$this->db->trans_commit();
			$this->session->set_userdata('id_pembayaran', $status_insert_pembayaran);
			return true;
		}
	}

	public function success()
	{
		$this->load->view('tema/head');
		$this->load->view('pesanan_berhasil_dibuat');
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function detail($id)
	{
		$data = [];
		if ($id != '') {
			$data['transaksi'] = $this->mpesanan->get_detail_transaksi($id);
		}
		$this->load->view('tema/head');
		$this->load->view('pemesanan_detail', $data);
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

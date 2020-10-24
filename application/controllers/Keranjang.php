<?php
defined('BASEPATH') or exit('No direct script access allowed');

// update
class Keranjang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mberanda');
		$this->load->model('page/admin/malamat', 'malamat');
		$this->load->model('page/admin/mproduk', 'mproduk');
		$this->load->model('page/admin/mpengaturan', 'mpengaturan');
		$this->load->model('page/admin/mpembeli', 'mpembeli');
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
		if ($this->input->post('qty')) {
			$this->session->set_userdata('qty', $this->input->post('qty'));
		}
		if ($this->input->post('ids')) {
			$response = [];
			$ids = $this->input->post('ids');
			$produk = $this->mproduk->get_produk_where_id($ids);
			$data_ongkir = $this->mpengaturan->getOngkir();
			//tipe flat === 1

			if ($data_ongkir->tipe_ongkir == 1) {
				$ongkir = $data_ongkir->harga_ongkir_flat;
			} //tipe perkm === 2
			else {
				$ongkir = $data_ongkir->harga_ongkir_perkm;
				$koordinat = $this->mpengaturan->getLokasi();
				$response['lokasi_toko'] = $koordinat;
			}
			$response['ongkir'] = $ongkir;
			$response['status'] = 'success';
			$response['data'] = $produk->result();
			return response($response, 'json');
		} else {
			return response(['status' => 'error', 'message' => 'Id tidak tersedia', 'data' => []], 'json');
		}
	}

	public function checkout()
	{
//		Jika pengguna login
		if ($this->session->userdata('id_pengguna')) {
			$this->mpembeli->set_pembeli();
		}

		if ($this->input->post('alamat')) {
			$this->session->set_userdata('alamat', $this->input->post('alamat'));
		}

		if ($this->input->post('ewallet')) {
			if (!$this->input->post('nomorhp')) {
				$this->session->set_flashdata('message', 'Nomor HP tidak boleh kosong jika menggunakan metode pembayaran E-Wallet.');
				redirect('keranjang/pembayaran');
			}
			$this->session->set_userdata('ewallet', $this->input->post('ewallet'));
			$this->session->set_userdata('nohpwallet', $this->input->post('nomorhp'));
			$this->session->unset_userdata('bank');
			$this->session->unset_userdata('cod');
		}
		if ($this->input->post('bank')) {
			$this->session->set_userdata('bank', $this->input->post('bank'));
			$this->session->unset_userdata('ewallet');
			$this->session->unset_userdata('nohpwallet');
			$this->session->unset_userdata('cod');
		}
		if ($this->input->post('cod')) {
			$this->session->set_userdata('cod', $this->input->post('cod'));
			$this->session->unset_userdata('ewallet');
			$this->session->unset_userdata('nohpwallet');
			$this->session->unset_userdata('bank');
		}
		$data['alamat'] = $this->malamat->get_alamat_by_id($this->session->userdata('alamat'));//@TODO;masih statis. ambil dari session;
		$this->load->view('tema/head');
		$this->load->view('konfirmasi_pembelian', $data);
		$this->load->view('tema/footer');
	}

	public function alamat()
	{
		if (!$this->session->userdata('id_pembeli')) {
			$id_alamat = $this->session->userdata('alamat');
			$data['alamat'] = $this->malamat->get_alamat_by_id($id_alamat);
		} else {
			$data['alamat'] = $this->malamat->get_alamat_pembeli($this->session->userdata('id_pembeli'));//@TODO;masih statis. ambil dari session;
		}
		$this->load->view('tema/head');
		$this->load->view('alamat_pemesanan', $data);
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function hapus_alamat($id)
	{
		$this->malamat->delete_alamat($id);
		redirect('keranjang/alamat');
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
		$data['fabanks'] = get_vabanks();
		$this->load->view('tema/head');
		$this->load->view('pembayaran', $data);
//		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function proses_pembayaran()
	{

	}

	public function konfirmasi_pembelian()
	{
		$this->load->view('tema/head');
		$this->load->view('konfirmasi_pembelian');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}
}

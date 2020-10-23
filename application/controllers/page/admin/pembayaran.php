<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Pembayaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mpembayaran');
		$this->session->set_userdata('menu', 'pembayaran');
		$this->session->set_userdata('menu2', 'pesanan');

	}

	//fungsi halaman awal pembayaran
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_pembayaran'] = $this->mpembayaran->get_pembayaran();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembayaran/halaman');
		$this->load->view('page/admin/tema/footer');
	}


	public function edit()
	{
		$id_pembayaran = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_pembayaran'] = $this->mpembayaran->get_edit_pembayaran($id_pembayaran);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembayaran/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mpembayaran->update_pembayaran();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembayaran').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembayaran').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_pembayaran = $this->input->get('id_pembayaran');
		$query = $this->mpembayaran->delete_pembayaran($id_pembayaran);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembayaran').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembayaran').'";</script>';
		}
	}

	public function lihat()
	{
		$id_pembayaran = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_pembeli'] = $this->mpembayaran->get_detail_pembayaran($id_pembayaran);
		$data['data_produk'] = $this->mpembayaran->get_detail_produk($id_pembayaran);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembayaran/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

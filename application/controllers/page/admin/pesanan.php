<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mpesanan');
		$this->session->set_userdata('menu', 'pesanan');
		$this->session->set_userdata('menu2', 'pesanan');

	}

	//fungsi halaman awal pesanan
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_pesanan'] = $this->mpesanan->get_pesanan();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pesanan/halaman');
		$this->load->view('page/admin/tema/footer');
	}


	public function edit()
	{
		$id_pesanan = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_pesanan'] = $this->mpesanan->get_edit_pesanan($id_pesanan);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pesanan/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mpesanan->update_pesanan();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pesanan/lihat').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pesanan').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_pesanan = $this->input->get('id_pesanan');
		$query = $this->mpesanan->delete_pesanan($id_pesanan);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pesanan').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pesanan').'";</script>';
		}
	}

	public function lihat()
	{
		$id_pesanan = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_pembeli'] = $this->mpesanan->get_detail_pesanan($id_pesanan);
		$data['data_produk'] = $this->mpesanan->get_detail_produk($id_pesanan);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pesanan/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

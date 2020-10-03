<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mproduk');
		$this->load->model('page/admin/mkategori');

		$this->session->set_userdata('menu2', 'produk');
		$this->session->set_userdata('menu', 'produk');
	}

	//fungsi halaman awal produk
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_produk'] = $this->mproduk->get_produk();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/produk/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');
		$data['data_kategori'] = $this->mkategori->get_kategori();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/produk/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->mproduk->insert_produk();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		}
	}

	public function edit()
	{
		$id_produk = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_produk'] = $this->mproduk->get_edit_produk($id_produk);
		$data['data_kategori'] = $this->mkategori->get_kategori();

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/produk/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mproduk->update_produk();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_produk = $this->input->get('id_produk');
		$query = $this->mproduk->delete_produk($id_produk);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/produk').'";</script>';
		}
	}

	public function lihat()
	{
		$id_produk = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_produk'] = $this->mproduk->get_detail_produk($id_produk);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/produk/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

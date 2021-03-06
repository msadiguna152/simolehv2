<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Pengguna extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mpengguna');
		$this->load->model('page/admin/mkategori');

		$this->session->set_userdata('menu2', 'pengguna');
		$this->session->set_userdata('menu', 'pengguna');
	}

	//fungsi halaman awal pengguna
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_pengguna'] = $this->mpengguna->get_pengguna();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pengguna/halaman');
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
		$this->load->view('page/admin/pengguna/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->mpengguna->insert_pengguna();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		}
	}

	public function edit()
	{
		$id_pengguna = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_pengguna'] = $this->mpengguna->get_edit_pengguna($id_pengguna);
		$data['data_kategori'] = $this->mkategori->get_kategori();

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pengguna/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mpengguna->update_pengguna();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_pengguna = $this->input->get('id_pengguna');
		$query = $this->mpengguna->delete_pengguna($id_pengguna);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengguna').'";</script>';
		}
	}

}

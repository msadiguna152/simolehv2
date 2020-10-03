<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('login').'";</script>';
		}		
		$this->load->model('page/admin/Mpendaftar');
		$this->session->set_userdata('menu', 'pendaftar');
	}

	//fungsi halaman awal pendaftar
	public function index()
	{
		$data['level'] = $this->session->userdata('level');

		//$data['kode_otomatis'] = $this->Mpendaftar->kode_pendaftar();
		$data['data_pendaftar'] = $this->Mpendaftar->get_pendaftar();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pendaftar/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pendaftar/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->Mpendaftar->insert_pendaftar();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		}
	}

	public function edit()
	{
		$kode_pendaftar = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		$data['data_pendaftar'] = $this->Mpendaftar->get_edit_pendaftar($kode_pendaftar);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pendaftar/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->Mpendaftar->update_pendaftar();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$kode_pendaftar = $this->input->get('kode_pendaftar');
		
		$query = $this->Mpendaftar->delete_pendaftar($kode_pendaftar);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Pendaftar').'";</script>';
		}
	}

	public function download_dokumen()
	{
		$nama_file = $this->input->get('file');;
		force_download('dokumen/'.$nama_file,NULL);
	}

}

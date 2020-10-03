<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/malamat');
		$this->session->set_userdata('menu', 'alamat');
		$this->session->set_userdata('menu2', 'pembeli');

	}

	//fungsi halaman awal alamat
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_alamat'] = $this->malamat->get_alamat();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/alamat/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/alamat/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->malamat->insert_alamat();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		}
	}

	public function edit()
	{
		$id_alamat = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_alamat'] = $this->malamat->get_edit_alamat($id_alamat);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/alamat/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->malamat->update_alamat();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_alamat = $this->input->get('id_alamat');
		$query = $this->malamat->delete_alamat($id_alamat);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/alamat').'";</script>';
		}
	}

	public function download()
	{
		$nama_file = $this->input->get('file');;
		force_download('file/'.$nama_file,NULL);
	}

	public function lihat_alamat()
	{
		$id_alamat = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_alamat'] = $this->malamat->get_edit_alamat($id_alamat);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/alamat/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

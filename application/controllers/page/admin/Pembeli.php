<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Pembeli extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mpembeli');
		$this->session->set_userdata('menu', 'pembeli');
		$this->session->set_userdata('menu2', 'pembeli');
	}

	//fungsi halaman awal pembeli
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_pembeli'] = $this->mpembeli->get_pembeli();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembeli/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembeli/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->mpembeli->insert_pembeli();
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		}
	}

	public function edit()
	{
		$id_pembeli = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_pembeli'] = $this->mpembeli->get_edit_pembeli($id_pembeli);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembeli/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mpembeli->update_pembeli();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_pembeli = $this->input->get('id_pembeli');
		$query = $this->mpembeli->delete_pembeli($id_pembeli);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pembeli').'";</script>';
		}
	}

	public function lihat()
	{
		$id_pembeli = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_alamat'] = $this->mpembeli->get_detail_pembeli($id_pembeli);
		$data['data_pembeli'] = $this->mpembeli->get_edit_pembeli($id_pembeli);
		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pembeli/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

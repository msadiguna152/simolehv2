<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Medsos extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mmedsos');

		$this->session->set_userdata('menu2', 'medsos');
		$this->session->set_userdata('menu', 'medsos');
	}

	//fungsi halaman awal medsos
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_medsos'] = $this->mmedsos->get_medsos();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/medsos/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/medsos/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->mmedsos->insert_medsos();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		}
	}

	public function edit()
	{
		$id_medsos = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_medsos'] = $this->mmedsos->get_edit_medsos($id_medsos);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/medsos/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->mmedsos->update_medsos();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_medsos = $this->input->get('id_medsos');
		$query = $this->mmedsos->delete_medsos($id_medsos);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/medsos').'";</script>';
		}
	}

	public function lihat()
	{
		$id_medsos = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_medsos'] = $this->mmedsos->get_detail_medsos($id_medsos);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/medsos/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

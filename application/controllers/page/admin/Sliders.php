<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Sliders extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/msliders');

		$this->session->set_userdata('menu2', 'sliders');
		$this->session->set_userdata('menu', 'sliders');
	}

	//fungsi halaman awal sliders
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		$data['data_sliders'] = $this->msliders->get_sliders();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sliders/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sliders/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->msliders->insert_sliders();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		}
	}

	public function edit()
	{
		$id_sliders = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_sliders'] = $this->msliders->get_edit_sliders($id_sliders);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sliders/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->msliders->update_sliders();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_sliders = $this->input->get('id_sliders');
		$query = $this->msliders->delete_sliders($id_sliders);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/sliders').'";</script>';
		}
	}

	public function lihat()
	{
		$id_sliders = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_sliders'] = $this->msliders->get_detail_sliders($id_sliders);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sliders/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

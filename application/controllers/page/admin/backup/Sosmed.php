<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('login').'";</script>';
		}		
		$this->load->model('page/admin/Msosmed');
		$this->session->set_userdata('menu', 'sosmed');
	}

	//fungsi halaman awal sosmed
	public function index()
	{
		$data['level'] = $this->session->userdata('level');
		//$data['kode_otomatis'] = $this->Msosmed->id_sosmed();
		$data['data_sosmed'] = $this->Msosmed->get_sosmed();
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sosmed/halaman');
		$this->load->view('page/admin/tema/footer');
	}
	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sosmed/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->Msosmed->insert_sosmed();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		}
	}

	public function edit()
	{
		$id_sosmed = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		$data['data_sosmed'] = $this->Msosmed->get_edit_sosmed($id_sosmed);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/sosmed/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->Msosmed->update_sosmed();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_sosmed = $this->input->get('id_sosmed');
		$query = $this->Msosmed->delete_sosmed($id_sosmed);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Sosmed').'";</script>';
		}
	}

}

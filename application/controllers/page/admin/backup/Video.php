<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('login').'";</script>';
		}		
		$this->load->model('page/admin/Mvideo');
		$this->session->set_userdata('menu', 'video');
	}

	//fungsi halaman awal video
	public function index()
	{
		$data['level'] = $this->session->userdata('level');

		//$data['kode_otomatis'] = $this->Mvideo->id_video();
		$data['data_video'] = $this->Mvideo->get_video();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/video/halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memanggil data yang akan di edit
	public function tambah()
	{
		$this->session->set_userdata('aksi', 'tambah');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/video/tambah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function insert()
	{
		$query = $this->Mvideo->insert_video();

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalsimpan');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		}
	}

	public function edit()
	{
		$id_video = $this->input->get('id');
		$this->session->set_userdata('aksi', 'edit');
		
		$data['data_video'] = $this->Mvideo->get_edit_video($id_video);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/video/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	//fungsi memperbaharui data
	public function update()
	{
		$query = $this->Mvideo->update_video();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		}
	}

	//fungsi hapus data
	public function delete()
	{
		$id_video = $this->input->get('id_video');
		$query = $this->Mvideo->delete_video($id_video);

		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalhapus');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Video').'";</script>';
		}
	}

	public function download()
	{
		$nama_file = $this->input->get('file');;
		force_download('file/'.$nama_file,NULL);
	}

	public function lihat_video()
	{
		$id_video = $this->input->get('id');
		$this->session->set_userdata('aksi', 'lihat');
		
		$data['data_video'] = $this->Mvideo->get_edit_video($id_video);

		$this->session->set_flashdata('token', $this->input->get('token'));
		$data['get_token2'] = $this->input->get('id');

		$data['level'] = $this->session->userdata('level');
		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/video/lihat_halaman');
		$this->load->view('page/admin/tema/footer');
	}

}

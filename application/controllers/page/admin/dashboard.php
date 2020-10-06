<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('Auth').'";</script>';
		}		
		//$this->load->model('page/admin/Madmin');
		$this->session->set_userdata('menu', 'dashboard');
		$this->session->set_userdata('menu2', 'dashboard');

	}
	//index atau halaman login
	public function index()
	{
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/dashboard/dashboard');
		$this->load->view('page/admin/tema/footer');
	}

	public function edit()
	{
		$this->session->set_userdata('menu', 'profil');
		$data['data_pengguna'] = $this->Madmin->get_pengguna();
		$data['data_sosmed'] = $this->Madmin->get_sosmed();
		$data['data_pendaftar'] = $this->Madmin->get_pendaftar();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/ubah_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function update()
	{
		$query = $this->Madmin->update_pengguna();
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Admin/edit').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/Admin/edit').'";</script>';
		}
	}
	
}

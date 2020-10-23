<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Pengaturan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Admin"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/admin/mpengaturan');
		$this->session->set_userdata('menu', 'pengaturan');
		$this->session->set_userdata('menu2', 'pengaturan');

	}

	public function index()
	{
		$this->session->set_userdata('menu', 'pengaturan');
		$data['data_pengaturan'] = $this->mpengaturan->get_pengaturan();

		$this->load->view('page/admin/tema/head',$data);
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pengaturan/edit_halaman');
		$this->load->view('page/admin/tema/footer');
	}

	public function update()
	{
		$query = $this->mpengaturan->update_pengaturan();
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengaturan').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/admin/pengaturan').'";</script>';
		}
	}

	public function pinmap(){
		$this->session->set_userdata('menu', 'pengaturan');
		$this->load->view('page/admin/tema/head');
		$this->load->view('page/admin/tema/menu');
		$this->load->view('page/admin/pengaturan/pinmap');
		$this->load->view('page/admin/tema/footer');
	}
	
}

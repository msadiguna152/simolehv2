<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// update
class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Kurir"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('Auth').'";</script>';
		}		
		$this->load->model('page/kurir/mdashboard');
		$this->session->set_userdata('menu', 'dashboard');
		$this->session->set_userdata('menu2', 'dashboard');

	}
	//index atau halaman login
	public function index()
	{
		$data['level'] = $this->session->userdata('level');

		$this->load->view('page/kurir/tema/head',$data);
		$this->load->view('page/kurir/tema/menu');
		$this->load->view('page/kurir/dashboard/dashboard');
		$this->load->view('page/kurir/tema/footer');
	}

	public function profil()
	{
		$this->session->set_userdata('menu', 'profil');
		$data['data_pengguna'] = $this->mdashboard->get_pengguna();

		$this->load->view('page/kurir/tema/head',$data);
		$this->load->view('page/kurir/tema/menu');
		$this->load->view('page/kurir/dashboard/edit_halaman');
		$this->load->view('page/kurir/tema/footer');
	}

	public function update()
	{
		$query = $this->mdashboard->update_pengguna();
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/kurir/Admin/edit').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/kurir/Admin/edit').'";</script>';
		}
	}
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('level') != "Kurir"){
			$this->session->sess_destroy();
			echo '<script language="javascript">alert("Akses Di Tolak!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}		
		$this->load->model('page/kurir/mpengguna');

		$this->session->set_userdata('menu2', 'pengguna');
		$this->session->set_userdata('menu', 'pengguna');
	}

	public function update()
	{
		$query = $this->mpengguna->update_pengguna();
		
		if ($query==true) {
			$this->session->set_flashdata('hasil', 'swalberhasilubah');
			echo '<script language="javascript">document.location="'.site_url('page/kurir/dashboard').'";</script>';
		} elseif ($query==false) {
			$this->session->set_flashdata('hasil', 'swalgagalubah');
			echo '<script language="javascript">document.location="'.site_url('page/kurir/dashboard').'";</script>';
		}
	}

}

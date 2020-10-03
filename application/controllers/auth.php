<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Mauth');
	}

	//index atau halaman login
	public function index()
	{
		$this->load->view('tema/head');
		$this->load->view('tema/menu');
		$this->load->view('login');
		$this->load->view('tema/footer');
	}

	//memeriksa hasil inputan di halaman login
	public function proses_login(){

		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$cek = $this->Mauth->cek($username, $password);

		//jika username dan password ada didalam database maka proses pengecekan level akan dijalankan
		if($cek->num_rows() == 1)
		{
			$get_pengguna = $this->Mauth->cek($username, $password);
			foreach($get_pengguna->result() as $data){
				$sess_data['username'] = $data->username;
				$sess_data['password'] = $data->password;
				$sess_data['level'] = $data->level;
				$sess_data['nama_pengguna'] = $data->nama_pengguna;
				$sess_data['id_pengguna'] = $data->id_pengguna;
				$sess_data['no_telpon'] = $data->no_telpon;
				$sess_data['email'] = $data->email;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('level') == 'Admin')
			{
				$this->session->set_flashdata('hasil', 'berhasillogin');
				echo '<script language="javascript">document.location="'.site_url('page/admin/dashboard').'";</script>';
			}
			else {
				echo '<script language="javascript">alert("Username dan Password Tidak Valid!");';
				echo 'document.location="'.site_url('auth').'";</script>';
			}
		}
		//jika username dan password tidak terdapat didalam database
		else
		{
			echo '<script language="javascript">alert("Username dan Password Tidak Valid!");';
			echo 'document.location="'.site_url('auth').'";</script>';
		}

	}

 	//fungsi logout dan unsession login
	public function logout(){
		$this->session->sess_destroy();
		echo '<script language="javascript">alert("Anda Berhasil Logout!");';
		echo 'document.location="'.site_url('Lusiapw').'";</script>';
	}
}

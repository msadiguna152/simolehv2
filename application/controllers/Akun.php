<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('makun');		
		$this->load->model('mberanda');
		$this->session->set_userdata('menu', 'akun');
	}
	
	public function index()
	{
		$this->load->view('tema/head');
		if($this->session->userdata('id_pengguna') == NULL){
			$this->load->view('login');
		}else{
			$this->load->view('berhasil_login');
		}
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function edit()
	{
		$this->load->view('tema/head');
		if($this->session->userdata('id_pengguna') == NULL){
			$this->load->view('login');
		}else{
			$this->load->view('edit_profil');
		}
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function registrasi()
	{
		$this->load->view('tema/head');
		$this->load->view('regis');
		$this->load->view('tema/menu');
		$this->load->view('tema/footer');
	}

	public function insert()
	{
		$query = $this->makun->regis();
		if ($query==true) {
			echo '<script language="javascript">alert("Silahakan Login!");';
			echo 'document.location="'.site_url('akun').'";</script>';
		} elseif ($query==false) {
			echo '<script language="javascript">alert("Gagal Mendaftar Akun!");';
			echo 'document.location="'.site_url('akun/registrasi').'";</script>';
		}
	}

	public function update()
	{
		$query = $this->makun->update_regis();
		if ($query==true) {
			echo '<script language="javascript">alert("Silahakan Logout, Lalu Login Kembali!");';
			echo 'document.location="'.site_url('akun').'";</script>';
		} elseif ($query==false) {
			echo '<script language="javascript">alert("Silahakan Logout, Lalu Login Kembali!");';
			echo 'document.location="'.site_url('akun').'";</script>';
		}
	}

		//memeriksa hasil inputan di halaman login
	public function proses_login(){

		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars(md5($this->input->post('password')));

		$cek = $this->makun->cek($username, $password);

		if($cek->num_rows() == 1)
		{
			$get_pengguna = $this->makun->cek($username, $password);
			foreach($get_pengguna->result() as $data){
				$sess_data['username'] = $data->username;
				$sess_data['level'] = $data->level;
				$sess_data['nama_pengguna'] = $data->nama_pengguna;
				$sess_data['foto_pengguna'] = $data->foto_pengguna;
				$sess_data['id_pengguna'] = $data->id_pengguna;
				$sess_data['no_telpon'] = $data->no_telpon;
				$sess_data['email'] = $data->email;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('level') == 'Pembeli')
			{
				$this->session->set_flashdata('hasil', 'berhasillogin');
				echo '<script language="javascript">document.location="'.site_url('akun').'";</script>';
			}
			else {
				echo '<script language="javascript">alert("Username dan Password Tidak Valid!");';
				echo 'document.location="'.site_url('akun').'";</script>';
			}
		}
		else {
			echo '<script language="javascript">alert("Username dan Password Tidak Valid!");';
			echo 'document.location="'.site_url('akun').'";</script>';
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		echo '<script language="javascript">alert("Anda Berhasil Logout!");';
		echo 'document.location="'.site_url('beranda').'";</script>';
	}
}

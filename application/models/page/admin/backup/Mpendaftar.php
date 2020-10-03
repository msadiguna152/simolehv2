<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpendaftar extends CI_Model {

public function insert_pendaftar()
	{
		$kode_pendaftar = $this->input->post('kode_pendaftar');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$email = $this->input->post('email');
		$nomor_hp = '+62'.$this->input->post('nomor_hp');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$alasan_mendaftar = $this->input->post('alasan_mendaftar');

		$dokumen = $_FILES['dokumen']['name'];
		$config['upload_path']          = './dokumen/';
		$config['allowed_types']        = '*';
		$config['file_name']            = $dokumen;
		$this->load->library('upload', $config);
		$this->upload->do_upload('dokumen');
		$this->upload->data("file_name");

		$tanggal_pendaftar = date("Y-m-d H:i:s");

		$query = $this->db->query("INSERT INTO `pendaftar` (`id_pendaftar`, `kode_pendaftar`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `nomor_hp`, `alamat`, `pekerjaan`, `pendidikan_terakhir`, `dokumen`, `alasan_mendaftar`, `tanggal_pendaftar`, `status_pendaftar`) VALUES (NULL, '$kode_pendaftar', '$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$email', '$nomor_hp', '$alamat', '$pekerjaan', '$pendidikan_terakhir', '$dokumen', '$alasan_mendaftar', '$tanggal_pendaftar', 'Konfirmasi');");

		$query2 = $this->db->query("INSERT INTO `pengguna` (`id_pengguna`, `kode_pendaftar`, `username`, `password`, `level`, `nama_pengguna`, `foto_pengguna`, `terakhir_login`, `status_login`) VALUES (NULL, '$kode_pendaftar', '$kode_pendaftar', '$kode_pendaftar', 'User', '$nama_lengkap', 'user.png', NULL, NULL);");

		return $query;
	}

public function get_pendaftar()
	{
		$query = $this->db->query("SELECT * FROM pendaftar  ORDER BY `pendaftar`.`id_pendaftar` DESC");
		return $query;
	}

public function get_edit_pendaftar($kode_pendaftar)
	{
		$query = $this->db->query("SELECT * FROM pendaftar WHERE pendaftar.kode_pendaftar = '$kode_pendaftar'");
		return $query;
	}

function update_pendaftar()
	{
		$id_pendaftar = $this->input->post('id_pendaftar');
		$kode_pendaftar = $this->input->post('kode_pendaftar');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$email = $this->input->post('email');
		$nomor_hp = $this->input->post('nomor_hp');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$alasan_mendaftar = $this->input->post('alasan_mendaftar');
		$status_pendaftar = $this->input->post('status_pendaftar');

		if (empty($dokumen)) {
			$query = $this->db->query("UPDATE `pendaftar` SET `kode_pendaftar` = '$kode_pendaftar', `nama_lengkap` = '$nama_lengkap', `jenis_kelamin` = '$jenis_kelamin', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `email` = '$email', `nomor_hp` = '$nomor_hp', `alamat` = '$alamat', `pekerjaan` = '$pekerjaan', `pendidikan_terakhir` = '$pendidikan_terakhir', `alasan_mendaftar` = '$alasan_mendaftar', `status_pendaftar` = '$status_pendaftar' WHERE `pendaftar`.`id_pendaftar` = '$id_pendaftar';");
		} else {
			$dokumen = $_FILES['dokumen']['name'];
			$config['upload_path']          = './dokumen/';
			$config['allowed_types']        = '*';
			$config['file_name']            = $dokumen;
		    //$config['overwrite']			= true;
		   	//$config['max_size']             = 2048; // 1MB
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen');
			$this->upload->data("file_name");

			$query = $this->db->query("UPDATE `pendaftar` SET `kode_pendaftar` = '$kode_pendaftar', `nama_lengkap` = '$nama_lengkap', `jenis_kelamin` = '$jenis_kelamin', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `email` = '$email', `nomor_hp` = '$nomor_hp', `alamat` = '$alamat', `pekerjaan` = '$pekerjaan', `pendidikan_terakhir` = '$pendidikan_terakhir', `dokumen` = '$dokumen', `alasan_mendaftar` = '$alasan_mendaftar', `status_pendaftar` = '$status_pendaftar' WHERE `pendaftar`.`id_pendaftar` = '$id_pendaftar';");
		}
		
		return $query;

	}

function delete_pendaftar($kode_pendaftar)
	{
		$query = $this->db->query("DELETE FROM `pendaftar` WHERE `pendaftar`.`kode_pendaftar` = '$kode_pendaftar'");
		$query2 = $this->db->query("DELETE FROM `pengguna` WHERE `pengguna`.`kode_pendaftar` = '$kode_pendaftar'");

		return $query;
	}
}
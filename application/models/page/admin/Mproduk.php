<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// update
class Mproduk extends CI_Model
{

	public function get_produk()
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` JOIN tb_kategori ON tb_kategori.id_kategori=tb_produk.id_kategori ORDER BY `tb_produk`.`id_produk` DESC");
		return $query;
	}

	public function get_produk_where_id($ids)
	{
		$query = $this->db->select("*")->where_in('id_produk', $ids)->get('tb_produk');
		return $query;
	}

	public function get_detail_produk($id_produk)
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` JOIN tb_kategori ON tb_kategori.id_kategori=tb_produk.id_kategori WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}

	public function get_edit_produk($id_produk)
	{
		$query = $this->db->query("SELECT * FROM `tb_produk` WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}

	public function insert_produk()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_produk = ucwords($this->input->post('nama_produk'));
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');

		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$shuffle  = substr(str_shuffle($karakter), 0, 5);

		$slug = str_replace(" ", "-",strtolower($nama_produk)).'-'.$shuffle;

		if ($this->input->post('promosi') == 1) {
			$promosi = 1;
			$harga_promosi = $this->input->post('harga_promosi');
		} else {
			$promosi = 0;
			$harga_promosi = 0;
		}
		if ($this->input->post('terlaris') == 1) {
			$terlaris = 1;
		} else {
			$terlaris = 0;
		}

		$get_gambar = $_FILES['gambar']['name'];
		$gambar = str_replace(" ", "_", "$get_gambar");

		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');
		$this->upload->data();

		$query = $this->db->query("INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `harga_promosi`, `deskripsi`, `gambar`, `promosi`, `terlaris`, `slug_p`) VALUES (NULL, '$id_kategori', '$nama_produk', '$harga', '$harga_promosi', '$deskripsi', '$gambar', '$promosi', '$terlaris', '$slug');");
		return $query;
	}

	public function update_produk()
	{
		$id_produk = $this->input->post('id_produk');
		$id_kategori = $this->input->post('id_kategori');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['gambar']['name'];

		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$shuffle  = substr(str_shuffle($karakter), 0, 5);

		$slug = str_replace(" ", "-",strtolower($nama_produk)).'-'.$shuffle;

		if ($this->input->post('promosi') == 1) {
			$promosi = 1;
			$harga_promosi = $this->input->post('harga_promosi');
		} else {
			$promosi = 0;
			$harga_promosi = 0;
		};
		if ($this->input->post('terlaris') == 1) {
			$terlaris = 1;
		} else {
			$terlaris = 0;
		}

		$config['upload_path'] = './file/';
		$config['allowed_types'] = '*';
		//$config['file_name'] = $gambar;
		//$config['max_size'] = 2048; // 1MB
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

		if (!empty($gambar)) {
			$this->upload->do_upload('gambar');
			$this->upload->data();
			$get_gambar = $_FILES['gambar']['name'];
			$gambar2 = str_replace(" ", "_", "$get_gambar");

			$query = $this->db->query("UPDATE `tb_produk` SET `id_kategori` = '$id_kategori', `nama_produk` = '$nama_produk', `harga` = '$harga', `harga_promosi` = '$harga_promosi', `deskripsi` = '$deskripsi', `gambar` = '$gambar2', `promosi` = '$promosi', `terlaris` = '$terlaris', `slug_p` = '$slug' WHERE `tb_produk`.`id_produk` = '$id_produk';");
		} else {
			$query = $this->db->query("UPDATE `tb_produk` SET `id_kategori` = '$id_kategori', `nama_produk` = '$nama_produk', `harga` = '$harga', `harga_promosi` = '$harga_promosi', `deskripsi` = '$deskripsi', `promosi` = '$promosi', `terlaris` = '$terlaris', `slug_p` = '$slug' WHERE `tb_produk`.`id_produk` = '$id_produk';");
		};

		return $query;
	}

	function delete_produk($id_produk)
	{
		$query = $this->db->query("DELETE FROM `tb_produk` WHERE `tb_produk`.`id_produk` = '$id_produk'");
		return $query;
	}

	function find($query)
	{
		if ($query) {
			return $this->db->select(['nama_produk', 'harga', 'gambar', 'deskripsi','slug_p'])
				->like('nama_produk', $query)
				->or_like('harga', $query)
				->or_like('deskripsi', $query)
				->get('tb_produk')->result();
		}
		return [];
	}
}

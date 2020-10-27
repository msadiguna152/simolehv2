<?php
	$pengaturan = $query = $this->db->get('tb_pengaturan');
	foreach ($pengaturan->result() as $data){
		$nama_bisnis = $data->nama_bisnis;

		$getNoHp = str_replace("-", "", $data->no_wa);
       	$getNoHp2 = str_replace("0", "62", substr($getNoHp, 0,4));
        $getNoHp3 = substr($getNoHp, 4,10);
        $no_wa = htmlspecialchars($getNoHp2.$getNoHp3);
	}
?>
<div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
	<div class="row m-0">
		<a href="<?= base_url() ?>beranda"
		   class="text-muted col small text-decoration-none p-2 <?php if ($this->session->userdata('menu') == 'beranda') {
			   echo "selected";
		   } ?>">
			<p class="h5 m-0"><i class="<?php if ($this->session->userdata('menu') == 'beranda') {
					echo "text-success";
				} ?> icofont-grocery"></i></p>
			Beranda
		</a>
		<a style="position: relative" href="<?= base_url() ?>keranjang"
		   class="text-muted col small text-decoration-none p-2 <?php if ($this->session->userdata('menu') == 'keranjang') {
			   echo "selected";
		   } ?>">
			<p class="h5 m-0"><i class="icofont-cart"></i></p>
			Keranjang
			<div style="position: absolute;top:10px;right: 15px" class="badge badge-danger p-1 ml-1 small"
				 id="cart-item-count">0
			</div>
		</a>
		
		<a href="<?= base_url() ?>akun"
		   class="text-muted col small text-decoration-none p-2 <?php if ($this->session->userdata('menu') == 'akun') {
			   echo "selected";
		   } ?>">
			<p class="h5 m-0"><i class="icofont-user"></i></p>
			Akun
		</a>

		<a target="_BALNK" href="https://wa.me/<?= $no_wa; ?>"
		   class="text-muted col small text-decoration-none p-2">
			<p class="h5 m-0"><i class="icofont-chat"></i></p>
			Bantuan
		</a>
	</div>
</div>
